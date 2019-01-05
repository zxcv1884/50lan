<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lan_drinks;
use App\lan_types;
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
        $types = lan_types::all();
        $drinks= lan_drinks::all();
        return view('drinks.index', compact('types','drinks'));
    }
}
