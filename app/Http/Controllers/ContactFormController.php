<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
class ContactFormController extends Controller
{
    //
    public function create() {
        return view('contact.create');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'email|required',
            'message' => 'required'
        ]);
        //send email
        // dd($data);
        Mail::to($data['email'])->send(new ContactFormMail($data));
        // return 'thanks';
        // session()->flash('message', 'Sent to '. $data['email']);
        return redirect('/contact')->with('message', 'Thank you for reaching us  '. $data['name'] . ' !');
    }
}
