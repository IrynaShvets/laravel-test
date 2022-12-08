<?php

namespace App\Http\Controllers;

use App\Http\Filters\ContactFilter;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\FilterRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $req)
    {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'The message has been added.');
    }

    public function allData(FilterRequest $request)
    {

        // return view('messages', ['data' => Contact::all()]);
        // $contact->orderBy('id', 'asc')->skip(1)->take(1)->get()
        // $contact->where('subject', '=', 'Hello test')->get()
        // $contact->get()
       /*  $contact = new Contact;
        return view('messages', ['data' => $contact->all()]); */

        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(ContactFilter::class, ['queryParams' => array_filter($data)]);
        
        $contacts = Contact::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        return view('messages', compact('contacts'));

    }

    public function showOneMessage($id)
    {
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id)
    {
        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req)
    {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'The message has been updated.');
    }

    public function deleteMessage($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success', 'The message has been deleted.');
    }

}
