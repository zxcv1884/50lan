<?php

namespace App\Http\Controllers;
use App\lan_orders;
use App\lan_order_drinks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\lan_types;
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
        $drinks= lan_drinks::all();
        return view('drinks.index', compact('types','drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drinks= lan_drinks::all();
        $drinks_new = $drinks->pluck('drink','id');
        return view('drinks.create', compact('drinks_new'));
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
        $order = new lan_orders();
        $address = $request['address'];
        if(isset($address)) {
            $order->order_address = $request['address'];
        }else{
            $order->order_address = null;
        }
        $order->order_at = now();
        if ($order->save() == true){
        $max_order_id = DB::table('lan_orders')->max('id');
        for($i=0;$i<=$request['drink_many'];$i++){
        $order_drink= new lan_order_drinks();
        $drink_select[] =$request['drink_select'];
        $drink_ice[]=$request['drink_ice'];
        $drink_sugar[]=$request['drink_sugar'];
        $order_drink->drink_id = $drink_select[0][$i];
        $order_drink->drink_ice = $drink_ice[0][$i];
        $order_drink->drink_sugar = $drink_sugar[0][$i];
        $order_drink->order_id = ($max_order_id);
        $order_drink->save();
        }
         if($order_drink->save() == true)
        {
            return redirect(route('drinks.index'))->with('message', '下訂成功');
        } else {
             return redirect('drinks.index')->with('error','下訂失敗');
        }
        }
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
