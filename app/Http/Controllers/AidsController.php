<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAidRequest;
use App\Models\Aids;
use App\Models\News;
use Illuminate\Http\Request;

class AidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy("created_at","desc")->paginate(10);
        $aids = Aids::all();
        return view("aid.index", compact("news", "aids"));
    }
    public function indexJson()
    {
        $aids = Aids::orderBy("created_at", "desc")->paginate(10);

        return response()->json([
            'aids' => $aids,
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("aid.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAidRequest $request)
    {
        if($request->validated()){
            $aids = Aids::create($request->all());
            $aids->save();

            return redirect(route("aid.index"))->with('success', 'Created Successfully');
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
        $aid = Aids::where('id', $id)->first();
        $aid->delete();
    }
}
