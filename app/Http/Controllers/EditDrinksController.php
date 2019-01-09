<?php

namespace App\Http\Controllers;
use App\lan_drinks;
use App\Http\Requests\EditDrinkRequest;
class EditDrinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //管理飲料主頁面
    public function index()
    {
        $drinks = lan_drinks::all();
        return view('orders.drinks', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //新增飲料頁面
    public function create()
    {
        return view('orders.create-drinks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //新增飲料送出後讀進資料庫
    public function store(EditDrinkRequest $request)
    {
        $drink = new lan_drinks();
        $drink->type_id = $request['type_id'];
        $drink->drink = $request['drink'];
        $drink->drink_price = $request['drink_price'];
        if ($drink->save() == true)
        {
            return redirect(route('edit-drinks.index'))->with('message', '新增飲料成功');
        } else {
            return redirect('edit-drinks.index')->with('error','新增飲料失敗');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改飲料名稱.價格.所屬種類
    public function edit($id)
    {
        $drinks = lan_drinks::find($id);
        return view('orders.edit-drinks', compact('drinks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //該筆修改送出後送至資料庫更新
    public function update(EditDrinkRequest $request, $id)
    {
        $drink = lan_drinks::find($id);
        $drink->type_id = $request['type_id'];
        $drink->drink = $request['drink'];
        $drink->drink_price = $request['drink_price'];
        if( $drink->save() == true)
        {
            return redirect(route('edit-drinks.index'))->with('message', '更新成功');
        } else {
            return redirect(route('edit-drinks.index'))->with('error','更新失敗');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //刪除該筆飲料
    public function destroy($id)
    {
        $drink = lan_drinks::findOrFail($id);
        if( $drink->delete() == true)
        {
            return redirect(route('edit-drinks.index'))->with('message', '刪除成功');
        } else {
            return redirect(route('edit-drinks.index'))->with('error','刪除失敗');
        }
    }
}
