<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSafetyRequest;
use App\Models\News;
use App\Models\Safety;
use Illuminate\Http\Request;

class SafetyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy("created_at","desc")->paginate(10);
        $tips = Safety::all();
        return view("safety.index", compact("news", "tips"));
    }

    public function indexJson()
    {
        $safety = Safety::orderBy("created_at", "desc")->paginate(10);

        return response()->json([
            'safety' => $safety,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("safety.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSafetyRequest $request)
    {
        if($request->validated()){
            $safety = Safety::create($request->all());
            $safety->save();

            return redirect(route("safety.index"))->with('success', 'Created Successfully');
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
        $safety = Safety::where('id', $id)->first();
        $safety->delete();
    }
}
