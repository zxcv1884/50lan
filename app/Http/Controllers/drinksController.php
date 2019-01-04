<?php

namespace App\Http\Controllers;

use App\lan_types;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\lan_drinks;
class drinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = lan_types::all();
        $teas = DB::table('lan_drinks')->where('type_id', '=', 1)->get();
        $milkteas = DB::table('lan_drinks')->where('type_id', '=', 2)->get();
        $freshs = DB::table('lan_drinks')->where('type_id', '=', 3)->get();
        $milks= DB::table('lan_drinks')->where('type_id', '=', 4)->get();
        $drinks= lan_drinks::all();
        return view('drinks.index', compact('types','drinks','teas','milkteas','freshs','milks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drinks.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('drinks.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
