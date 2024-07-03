<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function AllContact()
    {
        return view('Backend.contact.contact');
    }
}