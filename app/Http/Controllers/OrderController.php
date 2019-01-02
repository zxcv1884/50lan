<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Order_drink;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('lan_orders.index', compact('orders'));
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
            $order = new Order;
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
            $order_drink = new Order_drink;
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
        $order_id = $id;
        $order_drink = Order_drink::find($order_id);
        return view('lan_orders.show', compact('order_drink'));
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
        $order = Order::find($id);
        $order->order_finish_at = now();
        $order->save();
        return view('lan_orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('order_drinks')->where('order_id', '=', $id)->delete();
        $order = Order::find($id);
        $order->delete();
        return view('lan_orders.index');
    }
    public function finish($id)
    {

    }
}
