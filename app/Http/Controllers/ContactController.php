<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Support\Facades\Request;

class ContactController extends Controller
{
    public function index(){

        return view('contact' );
    }

}
