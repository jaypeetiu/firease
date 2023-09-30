<?php

namespace App\Http\Controllers;

use App\Events\NewPostAdded;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
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
            // return redirect()->back()->with('success', 'Added Successfully');

            //Send Push Notification

            $SERVER_API_KEY = 'AAAARQtY8YQ:APA91bHtaTTvc4HeRWKrC_nD_9SQSd5uwXLSFEczWGowG2OpApGYDmC7otLMlG6dnDoNtl8DOJTzT2VIrYjzTxbFe59XmJtQmz6qcxs7Of1SAsdr24n2vkEe8VPquLyMPnN5uGkArb6G';

            $data = [
                "registration_ids" => 'cpl8dpiRTSzm4Wbl9YNBjc:APA91bH9WO0FYSblUDP27_m0rVUinT8ORIMknYwAMcXrJ3ySEiqyw_2T0YuIffCCJ3FyGq7_fiWFY0mQM0RJKdipmekMnZFeVuQwQ40T3HnkLFuUvFC1-jrqx9dP8LvrOI-29ad0MEVE',
                "notification" => [
                    "title" => "You have a new chat message",
                    "body" => " ",
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

            $response = curl_exec($ch);
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
        // event(new NewPostAdded($post));
        //Send Push Notification

        $SERVER_API_KEY = 'AAAARQtY8YQ:APA91bHtaTTvc4HeRWKrC_nD_9SQSd5uwXLSFEczWGowG2OpApGYDmC7otLMlG6dnDoNtl8DOJTzT2VIrYjzTxbFe59XmJtQmz6qcxs7Of1SAsdr24n2vkEe8VPquLyMPnN5uGkArb6G';

        $data = [
            "registration_ids" => ['cpl8dpiRTSzm4Wbl9YNBjc:APA91bH9WO0FYSblUDP27_m0rVUinT8ORIMknYwAMcXrJ3ySEiqyw_2T0YuIffCCJ3FyGq7_fiWFY0mQM0RJKdipmekMnZFeVuQwQ40T3HnkLFuUvFC1-jrqx9dP8LvrOI-29ad0MEVE'],
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
}
