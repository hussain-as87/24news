<?php

namespace App\Http\Controllers;


use App\Http\Resources\Classification as ClassificationResources;
use App\Models\Classification;
use Illuminate\Http\Request;

class ApiClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classification = Classification::paginate(15);
        return ClassificationResources::collection($classification);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classification = $request->isMethod('put') ? Classification::findOrFail($request->id) : new Classification;
        $classification->id = $request->input('id');
        $classification->name = $request->input('name');
        $classification->user_id = $request->input('user_id');
        if ($classification->save()) {
            return new ClassificationResources($classification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classification = Classification::findOrFail($id);
        return new ClassificationResources($classification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classification = Classification::findOrFail($id);
        if ($classification->delete()) {
            return new ClassificationResources($classification);

        }
    }
}
