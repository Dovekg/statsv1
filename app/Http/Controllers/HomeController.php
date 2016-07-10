<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'services', 'faq', 'contact']);
    }

    /**
     * Show the application index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the application service page.
     *
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        return view('services');
    }

    /**
     * Show the application frequent ask questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
        return view('faq');
    }

    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('contact');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }
}
