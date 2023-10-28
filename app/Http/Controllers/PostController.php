<?php

namespace App\Http\Controllers;

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
            $post = Post::create($request->all());
            $post->save();
            event(new NewPostAdded($post));
            if(isset($post)){
                $fire = new Fire();
                $fire->user_id = $request->user_id;
                $fire->time = now();
                $fire->type = $request->fire_type;
                $fire->address = 'test';
                $fire->save();
            }

            //Send Push Notification

            $SERVER_API_KEY = env('SERVER_API_KEY');
            $userkeys = User::where('Device_key', '!=', '')->get();
            foreach ($userkeys as $value) {
                $data = [
                    "registration_ids" => [$value->device_key],
                    "notification" => [
                        "title" => "New Alerts",
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
        $post = Post::where('id', $request->id)->first();
        $post->fire_type = $request->fire_type;
        $post->save();
        event(new NewPostAdded($post));
        //Send Push Notification

        $SERVER_API_KEY = env('SERVER_API_KEY');
        $userkeys = User::where('Device_key', '!=', '')->get();
        foreach ($userkeys as $value) {
            $data = [
                "registration_ids" => [$value->device_key],
                "notification" => [
                    "title" => "New Alerts",
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
        $post->vehicle = $request->vehicle_type;
        $post->save();
        $exist = VehicleHistory::where('post_id', $id)->first();
        if (isset($exist)) {
            $exist->vehicle = $post->vehicle;
            $exist->post_id = $post->id;
            $exist->save();
        } else {
            $history = new VehicleHistory();
            $history->vehicle = $post->vehicle;
            $history->post_id = $post->id;
            $history->save();
        }

        return redirect()->back()->with('success', 'Updated Successfully');
    }
}
