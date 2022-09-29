<?php

namespace App\Http\Controllers;

use App\Models\FormSurvey;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $forms = FormSurvey::all();
        return view('home', ['forms' => $forms]);
    }
}
