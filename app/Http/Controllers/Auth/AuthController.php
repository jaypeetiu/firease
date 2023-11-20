<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Token;
use Laravel\Passport\Passport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
// use Laravel\Passport\Passport;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{


    /**
     * gets the users details
     * @group Authentication
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        $user = User::with("company")->where('id', Auth::user()->id)->first();
        return response()->json($user, 200);
    }


    /**
     * logs the user in
     * @group Authentication
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'remember_me' => 'required',
        ]);


        if ($validate) {
            $user = User::where('email', $request->email)->first();
            if (isset($user->email_verified_at) && $user->email_verified_at) { //change it here kay walay is_active
                $credentials = request(['email', 'password']);

                if (!Auth::guard('web')->attempt($credentials)) {
                    return response()->json(['message' => 'Wrong username or password'], 401);
                }
            } else {
                return response()->json(['message' => 'Email not verified'], 401);
            }

        }
        $user = User::where('email', $request->email)->first();
        if (!$request->remember_me) {
            Passport::personalAccessTokensExpireIn(Carbon::now()->addDays(1));
        }
        $token = $user->createToken(config('app.name'))->accessToken;
        return response()->json([
            "user" => Auth::user(),
            "token" => $token,
            'remember' => $request->remember_me
        ], 200);
    }

    /**
     * registers the user
     * @group Authentication
     * @group User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255|confirmed',
            'selfie' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            DB::beginTransaction();
            if (!User::where('email', $request->email)->first()) {
                $user = new User([
                    'name' => $request->name,
                    'email' => $validatedData['email'],
                    'password' => bcrypt($validatedData['password']),
                ]);
                $user->save();
                $user->roles()->sync(3);
                $token = $user->createToken('MyApp')->accessToken;
                $link = env("APP_URL") . "/verify?email=$user->email&token=$token";
                // Mail::to($user->email)->send(new VerifyEmail($user, $link));
                // DB::commit();
                // return response()->json([
                //     'message' => "Email verification sent to your email."
                // ], 200);

                /* This code block checks if the request contains a file with the key 'id_image'. If it
                does, it retrieves the file using `->file('id_image')` and generates a
                unique image name using the current timestamp and the original file extension. It
                then moves the file to the 'uploads' directory using the `move()` method. */
                if ($request->hasFile('id_image')) {
                    $image = $request->file('id_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $imageName);

                    $imageNameSelfie = time() . '.' . $request->selfie->getClientOriginalExtension();
                    $request->selfie->move(public_path('uploads/selfies'), $imageNameSelfie);

                    // return response()->json(['success' => true, 'image' => $imageName, 'selfieImage' => $imageNameSelfie]);
                } else {
                    return response()->json(['success' => false, 'message' => 'Image not found.']);
                }
                DB::commit();
                return response()->json([
                    'message' => "Email verification sent to your email."
                ], 200);
            } else {
                return response()->json([
                    'message' => "Email already registered."
                ], 200);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

    }


    /**
     * logs the user out
     * @group Authentication
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        if (isset(Auth::user()->id)) {
            Token::where('user_id', Auth::user()->id)
                ->update(['revoked' => true]);
            return response()->json([
                'status' => true
            ], 200);
        } else {
            return response()->json([
                'status' => false
            ], 401);
        }
    }

    /**
     * verify token
     * @group Authentication
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyToken(Request $request)
    {
        if (isset(Auth::user()->id)) {
            return response()->json([
                'status' => true
            ], 200);
        } else {
            return response()->json([
                'status' => false
            ], 401);
        }
    }


    /**
     * resets the user password
     * @group Authentication
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string|email|max:255',
        ]);
        try {
            DB::beginTransaction();
            if ($validate) {
                $user = User::where('email', $request->email)->first();
                if ($user) {
                    // Passport::personalAccessTokensExpireIn(now()->addMinutes(30));
                    $token = $user->createToken("MyApp")->accessToken;
                    $link = env("APP_URL") . "/reset-password?token=$token";
                    Mail::to($user->email)->send(new ResetPassword($user, $link));
                    DB::commit();
                    return response()->json([
                        'status' => true
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false
                    ], 401);
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function resetPasswordTest($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            // Passport::personalAccessTokensExpireIn(now()->addMinutes(30));
            $token = $user->createToken("MyApp")->accessToken;
            $link = env("APP_URL") . "/reset-password?token=$token";
            $mail = Mail::to($user->email)->send(new ResetPassword($user, $link));
            return response()->json([
                'status' => true,
                'mail' => $mail
            ], 200);
        } else {
            return response()->json([
                'status' => false
            ], 401);
        }
    }


    /**
     * resets the user password
     * @group Authentication
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPasswordConfirm(Request $request)
    {
        $validate = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validate) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                $user->password = bcrypt($request->password);
                $user->save();
                Token::where('user_id', Auth::user()->id)
                    ->update(['revoked' => true]);
                return response()->json([
                    'status' => true
                ], 200);
            } else {
                return response()->json([
                    'status' => false
                ], 401);
            }
        }
    }

    /**
     * verify email
     * @group Authentication
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyEmail(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
        ]);
        if ($validate && Auth::user()->email === $request->email) {
            $user = User::where('email', Auth::user()->email)->first();
            Token::where('user_id', Auth::user()->id)
                ->update(['revoked' => true]);
            if ($user) {
                $user->is_active = true;
                $user->save();
                return response()->json([
                    'message' => "Email verified"
                ], 200);
            } else {
                return response()->json([
                    'message' => "Email not found"
                ], 404);
            }
        } else {
            return response()->json([
                'message' => "Email dont match"
            ], 404);
        }
    }

}
