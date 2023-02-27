<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Support\Facades\Request;

class MainController extends Controller
{
    public function index(){

        return view('main');
    }


}
