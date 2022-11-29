<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $images = Image::orderBy('id', 'desc')->get();
        return view('dashboard', [
            'images' => $images
        ]);
    }

}
