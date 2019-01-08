<?php

namespace App\Http\Controllers;
use App\lan_order_drinks;
use App\lan_orders;
use Illuminate\Http\Request;
use App\lan_drinks;
use Illuminate\Support\Facades\DB;
class AllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = lan_orders::all();
        return view('serve.all', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $drinks= lan_drinks::all();
        $drinks_new = $drinks->pluck('drink','id');
        $order_drinks = DB::table('lan_order_drinks')->where('id',$id)->get();
        return view('serve.edit-detail', compact('order_drinks','drinks_new'));
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
        $order_drink = lan_order_drinks::find($id);
        $order_drink->drink_id = $request['drink_select'];
        $order_drink->drink_ice = $request['drink_ice'];
        $order_drink->drink_sugar = $request['drink_sugar'];
        if( $order_drink->save() == true)
        {
            return redirect(route('serve.index'))->with('message', '訂單修改成功');
        } else {
            return redirect(route('serve.index'))->with('error','訂單修改失敗');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = lan_orders::find($id);
        $order->order_finish_at = now();
        if( $order->save() == true)
        {
            return redirect(route('serve.index'))->with('message', '訂單完成');
        } else {
            return redirect(route('serve.index'))->with('error','訂單失敗');
        }
    }
}
