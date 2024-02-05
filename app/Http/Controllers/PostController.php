<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use App\Events\NewPostAdded;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Fire;
use App\Models\Post;
use App\Models\StationUser;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        if ($request->validated()) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/fire'), $imageName);

                // return response()->json(['success' => true, 'image' => $imageName, 'selfieImage' => $imageNameSelfie]);
            } else {
                return response()->json(['success' => false, 'message' => 'Image not found.']);
            }
            // $post = Post::create($request->all());
            $post = new Post();
            $post->user_id = $request->user_id;
            $post->image = env('APP_URL') . '/uploads/fire/' . $imageName;
            $post->vehicle_id = null;
            $post->station_id = $request->station_id;
            $post->save();
            event(new NewPostAdded($post));
            if (isset($post)) {
                $fire = new Fire();
                $fire->user_id = $request->user_id;
                $fire->time = now();
                $fire->type = $request->fire_type;
                $fire->address = $request->address;
                $fire->post_id = $post->id;
                $fire->save();
            }


            //Send Push Notification
            $SERVER_API_KEY = "AAAARQtY8YQ:APA91bHtaTTvc4HeRWKrC_nD_9SQSd5uwXLSFEczWGowG2OpApGYDmC7otLMlG6dnDoNtl8DOJTzT2VIrYjzTxbFe59XmJtQmz6qcxs7Of1SAsdr24n2vkEe8VPquLyMPnN5uGkArb6G";
            $userkeys = User::where('Device_key', '!=', '')->get();
            $stationAssign = StationUser::where('station_id', $post->station_id)->get();
            foreach ($stationAssign as $value) {
                $adminStation = User::where('id', $value->user_id)->get();
                foreach ($adminStation as $v) {
                    if ($v->device_key != '') {
                        $data = [
                            "registration_ids" => [$v->device_key],
                            "notification" => [
                                "title" => "New reports from " . $request->address,
                                "body" => "Post",
                            ]
                        ];
                        $dataString = json_encode($data);

                        $headers = [
                            'Authorization: key=' . $SERVER_API_KEY,
                            'Content-Type: application/json',
                        ];

                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                        curl_exec($ch);
                    } else {
                        foreach ($userkeys as $value) {
                            $data = [
                                "registration_ids" => [$value->device_key],
                                "notification" => [
                                    "title" => "New reports from " . $request->address,
                                    "body" => "",
                                ]
                            ];
                            $dataString = json_encode($data);

                            $headers = [
                                'Authorization: key=' . $SERVER_API_KEY,
                                'Content-Type: application/json',
                            ];

                            $ch = curl_init();

                            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                            curl_exec($ch);
                        }
                    }
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $SERVER_API_KEY = "AAAARQtY8YQ:APA91bHtaTTvc4HeRWKrC_nD_9SQSd5uwXLSFEczWGowG2OpApGYDmC7otLMlG6dnDoNtl8DOJTzT2VIrYjzTxbFe59XmJtQmz6qcxs7Of1SAsdr24n2vkEe8VPquLyMPnN5uGkArb6G";
        $stations = StationUser::where('user_id', Auth::user()->id)->first();

        $post = Post::where('id', $request->id)->first();

        if ($stations->station_id == $post->station_id) {
            $post->fire_type = $request->fire_type;
            $post->save();
            $fire = Fire::where('post_id', $post->id)->first();
            $fire->type = $request->fire_type;
            $fire->save();

            $user = User::where('id', $post->user_id)->first();

            $data = [
                "registration_ids" => [$user->device_token], // after registering on mobile automatic save device token
                "notification" => [
                    "title" => "Firease Notification",
                    "body" => 'Hello, we received a notification that you need us, they are on their way now.',
                    // "sound" => 'alarm.mp3',
                    "color" => 'red',
                    "android_channel_id" => 'default',
                ],
                "data" => [
                    "url" => "https://firease.page.link/home"
                ],
            ];
            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            curl_exec($ch);
            event(new NewPostAdded($post));

            //Send Push Notification
            $data = [
                "registration_ids" => [Auth::user()->device_key],
                "notification" => [
                    "title" => "New reports from " . $fire->address,
                    "body" => "Update",
                ]
            ];
            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            curl_exec($ch);


            return redirect()->back()->with('success', 'Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Station assigned to' . $post->station_id);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateVehicle(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $post->vehicle_id = $request->vehicle_type;
        $post->save();
        $exist = VehicleHistory::where('post_id', $id)->first();
        if (isset($exist)) {
            $exist->vehicle = $post->vehicle_id;
            $exist->post_id = $post->id;
            $exist->save();
        } else {
            $history = new VehicleHistory();
            $history->vehicle = $post->vehicle_id;
            $history->post_id = $post->id;
            $history->save();
        }

        return redirect()->back()->with('success', 'Updated Successfully');
    }

    public function deleteVehicle(Request $request, $id)
    {
        $exist = VehicleHistory::where('post_id', $id)->first();
        $exist->delete();

        if (isset($exist)) {
            $post = Post::where('id', $exist->post_id)->first();
            $post->vehicle_id = null;
            $post->save();
        }

        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function userBadge()
    {
        $post = Post::where('user_id', Auth::user()->id)->count();

        return response()->json([
            'badge' => $post > 2 ? 'Good Samaritan' : 'Beginner',
        ], 200);
    }
    public function alarmStations()
    {
        //Send Push Notification

        $SERVER_API_KEY = "AAAARQtY8YQ:APA91bHtaTTvc4HeRWKrC_nD_9SQSd5uwXLSFEczWGowG2OpApGYDmC7otLMlG6dnDoNtl8DOJTzT2VIrYjzTxbFe59XmJtQmz6qcxs7Of1SAsdr24n2vkEe8VPquLyMPnN5uGkArb6G";
        $userkeys = User::where('Device_key', '!=', '')->get();
        foreach ($userkeys as $value) {
            $data = [
                "registration_ids" => [$value->device_key],
                "notification" => [
                    "title" => "New alerts",
                    "body" => "Update",
                ]
            ];
            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            curl_exec($ch);
        }

        return redirect()->back()->with('success', 'Successfully Alarmed');
    }

    public function userHistory()
    {
        $posts = Post::with('fire')->where('user_id', Auth::user()->id)->get();

        return response()->json([
            'histories' => $posts,
        ], 200);
    }
}
