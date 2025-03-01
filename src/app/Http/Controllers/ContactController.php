<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\AuthRepuest;

class ContactController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function confirm(AuthRepuest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'email', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        return view('confirm', compact('contact'));
        // 'category',あとでリレーションする
    }


    public function store(AuthRepuest $request)
    {
        if ($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }

        $contact = $request->only(['first_name', 'last_name', 'email', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        // 'category',あとでリレーションする
        Contact::create($contact);
        return view('thanks');
    }
}
