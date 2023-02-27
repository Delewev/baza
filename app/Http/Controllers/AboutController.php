<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Support\Facades\Request;

class AboutController extends Controller
{
    public function index(){

        return view('about',);
    }

}
