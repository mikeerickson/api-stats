<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $data = Contact::where('replied', '=', null)->orderBy('created_at', 'DESC')->get();
        return view('admin.contacts', ['data' => $data]);
    }


    public function store()
    {
        $data = Contact::create($this->request->all());
        flash("Contact request has been submitted.", 'success');
        Log::info("Contact Request From: " .$data['email']);
        return redirect('contact');
    }
}
