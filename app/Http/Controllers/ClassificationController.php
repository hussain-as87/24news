<?php

namespace App\Http\Controllers;

use App\Models\Classification;

class ClassificationController extends Controller
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
     * @param Classification $classification
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Classification $classification)
    {
        return view('control.classification.create', compact('classification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->getValidationFactory();
        $classification = auth()->user()->classifications()->create($data);
        return redirect(route('class.create'))->with('message', '');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show()
    {
        $classification = Classification::all();
        return view('control.classification.show', compact('classification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Classification $classification
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Classification $classification)
    {
        return view('control.classification.edit', compact('classification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Classification $classification
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Classification $classification)
    {
        $data = $this->getValidationFactory();
        $classification->update($data);
        return redirect(route('class.show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Classification $classification
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Classification $classification)
    {
        $classification->delete();
        return redirect(route('class.show'));
    }

    protected function getValidationFactory()
    {
        return \request()->validate([
            'name.*' => 'required'
        ]);
    }
}
