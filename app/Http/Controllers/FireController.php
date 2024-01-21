<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFireRequest;
use App\Models\Fire;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $today = Carbon::today();
        $fires = Fire::with('users','post.vehicle')->where('created_at', 'LIKE', "%" . $request->search . "%")->orderBy("created_at", "desc")->get();
        $totals = Fire::whereDate('created_at', $today)->count();
        $vehicles = Vehicle::all();

        return view('fires.index', compact('fires', 'totals', 'vehicles'));
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
    public function update(UpdateFireRequest $request, $id)
    {
        $fire = Fire::where('id', $id)->first();

        if(isset($fire)){
            $fire->arrival = $request->arrival;
            $fire->fire_end = $request->fire_end;
            $fire->update();

            return redirect()->back()->with('success', 'Updated Successfully');
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

    public function exportUsers()
    {
        $fires = Fire::with('users','post.vehicle')->get();

        $csvFileName = now().'users.csv';

        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$csvFileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        );

        $handle = fopen('php://output', 'w');

        // Add CSV headers
        fputcsv($handle, ['ID', 'Name', 'Time Sent', 'Type', 'Address', 'Arrival', 'Time Fire End', 'Vehicle Used']);

        // Add user data
        foreach ($fires as $fire) {
            fputcsv($handle, [$fire->id, $fire->users->name, $fire->time, $fire->type, $fire->address, $fire->arrival, $fire->fire_end, $fire->post->vehicle?$fire->post->vehicle->name:'']);
        }

        fclose($handle);

        return Response::make(null, 200, $headers);
    }
}
