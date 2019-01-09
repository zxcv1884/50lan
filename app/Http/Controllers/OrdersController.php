<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lan_orders;
use App\lan_drinks;
use App\lan_order_drinks;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //管理訂單主頁面
    public function index()
    {
        $orders = lan_orders::all();
        return view('orders.index', compact('orders'));
    }

    public function all()
    {
        $orders = lan_orders::all();
        return view('orders.all', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    //每筆訂單有哪些飲料
    public function show($id)
    {
        $order = lan_orders::find($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改該筆訂單地址的form & 選擇修改訂單飲料
    public function edit($id)
    {
        $order = lan_orders::find($id);
        return view('orders.edit-order', compact('order'));
    }


    //修改該筆訂單飲料
    public function edit_order_drinks($id)
    {
        $drinks= lan_drinks::all();
        $drinks_new = $drinks->pluck('drink','id');
        $order_drink = lan_order_drinks::find($id);
        return view('orders.edit-order-drinks', compact('order_drink','drinks_new'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //管理員送出訂單地址修改後寫進資料庫更新
    public function update(Request $request, $id)
    {
        $order = lan_orders::find($id);
        $order->order_address = $request->address;
        if( $order->save() == true)
        {
            return redirect(route('orders.index'))->with('message', '更新訂單成功');
        } else {
            return redirect(route('orders.index'))->with('error','更新訂單失敗');
        }
    }

    //管理員送出訂單飲料修改後寫進資料庫更新
    public function update_order_drinks(Request $request, $id)
    {
        $order_drink = lan_order_drinks::find($id);
        $order_drink->drink_id = $request['drink_select'];
        $order_drink->drink_ice = $request['drink_ice'];
        $order_drink->drink_sugar = $request['drink_sugar'];
        if( $order_drink->save() == true)
        {
            return redirect(route('orders.index'))->with('message', '訂單修改成功');
        } else {
            return redirect(route('orders.index'))->with('error','訂單修改失敗');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //刪除該筆訂單
    public function destroy($id)
    {
        $order = lan_orders::findOrFail($id);
        if( $order->delete() == true)
        {
            return redirect(route('orders.index'))->with('message', '刪除成功');
        } else {
            return redirect(route('orders.index'))->with('error', '刪除失敗');
        }
    }

    //選擇完成該筆訂單後為該筆訂單更新完成時間
    public function finish($id)
    {
        $order = lan_orders::find($id);
        $order->order_finish_at = now();
        if( $order->save() == true)
        {
            return redirect(route('orders.index'))->with('message', '訂單完成');
        } else {
            return redirect(route('orders.index'))->with('error','訂單失敗');
        }
    }
}
