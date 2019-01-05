<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\lan_orders;
use App\lan_order_drinks;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = lan_orders::all();
        return view('serve.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lan_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(in_array('order_address',$request)){
            $order = new lan_orders;
            $order->order_address = $request['order_address'];
            $order->order_at = $request['order_at'];
            $order->order_finish_at = $request['order_finish_at'];

            if ($order->save() == true)
            {
                return redirect(route('lan_orders.index'));
            } else {
                return "新增資料失敗";
            }
        }else{
            $order_drink = new lan_order_drinks;
            $order_drink->drink_id = $request['drink_id'];
            $order_drink->drink_ice = $request['drink_ice'];
            $order_drink->drink_sugar = $request['drink_sugar'];
            $order_drink->drink_sugar = $request['order_id'];
            if ($order_drink->save() == true)
            {
                return redirect(route('lan_orders.index'));
            } else {
                return "新增資料失敗";
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_drinks= DB::table('lan_order_drinks')->where('order_id',$id)->get();
        foreach ($order_drinks as $order_drink){
        $drink_names[] = DB::table('lan_drinks')->where('id',$order_drink->drink_id)->get();
        }
        return view('serve.show', compact('order_drinks','drink_names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = DB::table('lan_orders')->where('id',$id)->get();
        return view('serve.edit', compact('orders'));
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
        $order = lan_orders::find($id);
        $order->order_address = $request->address;
        $order->save();
        $orders = lan_orders::all();
        return view('serve.index', compact('orders'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('lan_order_drinks')->where('order_id', '=', $id)->delete();
        $order = lan_orders::find($id);
        $order->delete();
        $orders = lan_orders::all();
        return view('serve.index', compact('orders'));
    }
    public function finish($id)
    {

    }
}
