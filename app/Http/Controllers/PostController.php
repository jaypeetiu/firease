<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use App\Events\NewPostAdded;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Fire;
use App\Models\Post;
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
            $post->vehicle_id = 1;
            $post->station_id = 1;
            $post->save();
            event(new NewPostAdded($post));
            if (isset($post)) {
                $fire = new Fire();
                $fire->user_id = $request->user_id;
                $fire->time = now();
                $fire->type = $request->fire_type;
                $fire->address = $request->address;
                $fire->save();
            }


            //Send Push Notification

            $SERVER_API_KEY = env('SERVER_API_KEY');
            $userkeys = User::where('Device_key', '!=', '')->get();
            foreach ($userkeys as $value) {
                $data = [
                    "registration_ids" => [$value->device_key],
                    "notification" => [
                        "title" => "New alerts",
                        "body" => "New alerts from " . Auth::user()->name,
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
        $stations = Auth::user()->stations;
        foreach ($stations as $station) {
            $post = Post::where('id', $request->id)->first();
            $post->fire_type = $request->fire_type;
            $post->station_id = $station->id;
            $post->save();
        }
        event(new NewPostAdded($post));
        //Send Push Notification

        $SERVER_API_KEY = env('SERVER_API_KEY');
        $userkeys = User::where('Device_key', '!=', '')->get();
        foreach ($userkeys as $value) {
            $data = [
                "registration_ids" => [$value->device_key],
                "notification" => [
                    "title" => "Alert Update",
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


        return redirect()->back()->with('success', 'Updated Successfully');
        // return response()->json([
        //     'success' => 'Updated!'
        // ], 200);
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
        $exist = VehicleHistory::where('id', $id)->first();
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
}
