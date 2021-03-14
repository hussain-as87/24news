<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classification = Classification::Paginate(8);
        return $classification;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classification = Classification::create($request->all());
        if ($classification) {
            return $classification;
        } else {
            return abort(500, 'You Have Problem');
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
        if ($classification) {
            return $classification;
        } else {
            return abort(404, 'Not Found');
        }
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
        $classification = Classification::findOrFail($id);
        $classification->update($request->all());
        if ($classification) {
            return $classification;
        } else {
            return abort(500, 'You Have Problem');
        }
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
        $classification->delete();
        if ($classification) {
            return 'Deleted Successfully!';
        } else {
            return abort(500, 'You Have Problem');
        }
    }
}
