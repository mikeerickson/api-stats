<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ContactController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $data = Contact::where('created_at', '<>', null)
            ->orderBy('created_at', 'DESC')
            ->get();
//        dd($data);
        return view('admin.contacts', [
            'data' => $data
        ]);
    }


    public function store()
    {
        $data = Contact::create($this->request->all());
        flash("Contact request has been submitted.", 'success');
        Log::info("Contact Request From: " .$data['email']);
        return redirect('contact');
    }
}
