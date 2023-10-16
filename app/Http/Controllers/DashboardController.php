<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

        return view('dashboard', compact('latests', 'latestsender', 'image', 'vehicles', 'histories'));
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

        return view('dashboard', compact('latests', 'latestsender', 'image', 'vehicles', 'histories'));
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
