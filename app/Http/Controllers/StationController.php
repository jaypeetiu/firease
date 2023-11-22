<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;
use App\Models\StationUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        foreach ($stations as $value) {
            $users = Station::where('stations.id', $value->id)->join('station_user', 'station_user.station_id', '=', 'stations.id')
                ->join('users', 'users.id', '=', 'station_user.user_id')
                // ->where('users.id', '!=', 1)
                // ->where('users.id', '!=', 2)
                ->whereNull('users.deleted_at')
                ->get();
            return view('stations.index', compact('stations', 'users'));
        }
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
    public function store(CreateStationRequest $request)
    {
        $station = Station::create($request->all());
        $station->save();

        return redirect()->back()->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $station = 1;

        return view('locations.index', compact('station'));
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
    public function update(UpdateStationRequest $request, $id)
    {
        $station = Station::findOrFail($id);
        $station->update($request->all());

        return redirect()->back()->with('success', 'Updated Successfully');
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

    public function addUser(Request $request)
    {
        $add = User::create($request->all());
        $add->save();
        User::findOrFail($add->id)->stations()->sync(1);

        return redirect()->back()->with('success', 'User Added Successfully');
    }

    public function listStation()
    {
        // abort_unless(Gate::allows('user_access'), 403);
        $stations = Station::all();

        return response()->json([
            'stations' => $stations,
        ], 200);
    }
}
