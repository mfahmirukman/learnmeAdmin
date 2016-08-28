<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function viewprofile() 
    {
        return view('viewprofile');
    }

    public function viewforum() {

        return view('forum');
    }


    public function changepw() {
        return view('changepw');
    }

    public function editprofile() {
        return view('editprofile');
    }


}
