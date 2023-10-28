<?php

namespace App\Http\Controllers;

use App\Events\NewPostAdded;
use App\Models\Post;
use App\Models\Station;
use App\Models\StationUser;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_unless(Gate::allows('admin_access'), 403);
        $latests = Post::with('user')->get();

        $latestsender = Post::with('user')->latest()->first();
        $image = "https://unsplash.it/640/425?image=30";
        $vehicles = Vehicle::all();
        $histories = VehicleHistory::all();
        $stations = Station::all();
        $firetypes = [
            'Residential',
            'Warehouse',
            'Rubbish Fire',
            'Electric Post Fire',
            'Structural',
            'Grass Fire',
            'Forest Fire'
        ];

        return view('dashboard', compact('latests', 'latestsender', 'image', 'vehicles', 'histories', 'stations', 'firetypes'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $latests = Post::with('user')->get();

        $latestsender = Post::where('id', $id)->with('user')->latest()->first();
        $image = "https://unsplash.it/640/425?image=30";
        $vehicles = Vehicle::all();
        $histories = VehicleHistory::all();
        $stations = Station::all();
        $firetypes = [
            'Residential',
            'Warehouse',
            'Rubbish Fire',
            'Electric Post Fire',
            'Structural',
            'Grass Fire',
            'Forest Fire'
        ];

        return view('dashboard', compact('latests', 'latestsender', 'image', 'vehicles', 'histories', 'stations', 'firetypes'));
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
    public function update(Request $request, $id)
    {
        //
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

    public function notifyStations($id)
    {
        //Send Push Notification

        $SERVER_API_KEY = env('SERVER_API_KEY');
        $userkeys = StationUser::where('station_id', $id)
            ->join('users', 'users.id', '=', 'station_user.user_id')
            ->where('device_key', '!=', '')
            ->first();
        if (isset($userkeys->device_key)) {
            $data = [
                "registration_ids" => [$userkeys->device_key],
                "notification" => [
                    "title" => "New Alerts",
                    "body" => "New Alerts",
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


            return redirect()->back()->with('success', 'Station Alarmed!');
        } else {
            return redirect()->back()->with('success', 'Station is not active');
        }
    }
}
