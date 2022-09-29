<?php

namespace App\Http\Controllers;

use App\Models\FormSurvey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(!auth()->user()->is_admin) return view('home', ['forms' => $forms]);
        $user = User::all()->except(Auth::id());
        return view('admin', ['users' => $user, 'forms' => $forms]);
    }
}
