<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $recentAlbums = Album::latest()->take(5)->get();

        return view('admin.dashboard',['title' => 'Home Page'] , compact('recentAlbums'));
    }
}
