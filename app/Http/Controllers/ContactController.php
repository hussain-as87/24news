<?php

namespace App\Http\Controllers;

use App\Mail\Welcome_userMail;
use App\Mail\WelcomeUserMail;
use App\Models\Classification;
use App\Models\Contact;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Contact $contacts, News $news, Request $request)
    {
        // $contacts=Contact::all();
        $news1 = News::where('case', $request->query('case', 1))->get();
        $classifications = Classification::all();
        return view('static\Contact_us', compact('contacts', 'news', 'classifications', 'news1'));
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
    public function store(Request $request, Contact $contact)
    {
        $data = $this->getValidationFactory();
        $contact->create($data);
        Mail::to('example@examole.com')->send(new WelcomeUserMail());
        return redirect(route('contact'))->with('message', '');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $contacts = Contact::all();
        return view('control.contact.show', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contacts)
    {
        return view('control.contact.edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contacts)
    {
        $date = $this->getValidationFactory();
        $contacts->update($date);
        return redirect(route('contact.show'))->with('message', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect(route('contact.show'));
    }

    protected function getValidationFactory()
    {
        return \request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|max:300',
        ]);
    }
}
