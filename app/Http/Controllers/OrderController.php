<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lan_orders;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = lan_orders::find($id);
        return view('serve.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = lan_orders::find($id);
        return view('serve.edit', compact('order'));
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
        if( $order->save() == true)
        {
            return redirect(route('serve.index'))->with('message', '更新訂單成功');
        } else {
            return redirect(route('serve.index'))->with('error','更新訂單失敗');
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
        $order = lan_orders::findOrFail($id);
        if( $order->delete() == true)
        {
            return redirect(route('serve.index'))->with('message', '刪除成功');
        } else {
            return redirect(route('serve.index'))->with('error', '刪除失敗');
        }
    }


    public function finish($id)
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
