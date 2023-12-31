<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Auth::user()->stations;
        foreach ($locations as $value) {
            $users = Station::where('stations.id', $value->id)->join('station_user', 'station_user.station_id', '=', 'stations.id')
                ->join('users', 'users.id', '=', 'station_user.user_id')
                ->where('users.fighter', '!=', null)
                ->where('users.id', '!=', 1)
                ->where('users.id', '!=', 2)
                ->whereNull('users.deleted_at')
                ->get();
        }
        $stations = Station::get();

        return view('locations.index', compact('locations', 'users', 'stations'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $locations = Auth::user()->stations;
        $users = Station::where('stations.id', $request->station)->join('station_user', 'station_user.station_id', '=', 'stations.id')
            ->join('users', 'users.id', '=', 'station_user.user_id')
            ->where('users.fighter', '!=', null)
            ->where('users.id', '!=', 1)
            ->where('users.id', '!=', 2)
            ->whereNull('users.deleted_at')
            ->get();
        $stations = Station::get();

        return view('locations.index', compact('locations', 'users', 'stations'));
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
}
