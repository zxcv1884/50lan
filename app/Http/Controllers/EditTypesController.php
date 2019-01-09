<?php

namespace App\Http\Controllers;
use App\Http\Requests\EditTypeRequest;
use App\lan_types;
class EditTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //管理飲料種類主頁面
    public function index()
    {
        $types = lan_types::all();
        return view('orders.types', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //新增飲料種類頁面
    public function create()
    {
        return view('orders.create-types');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //新增飲料種類送出後讀進資料庫
    public function store(EditTypeRequest $request)
    {
        $type = new lan_types;
        $type->type = $request['type'];

        if ($type->save() == true)
        {
            return redirect(route('edit-types.index'))->with('message', '新增種類成功');
        } else {
            return redirect('edit-types.index')->with('error','新增種類失敗');
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
    //修改飲料種類名稱
    public function edit($id)
    {
        $types = lan_types::find($id);
        return view('orders.edit-types', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //該筆修改送出後送至資料庫更新
    public function update(EditTypeRequest $request, $id)
    {
        $types = lan_types::find($id);
        $types->type = $request->type;
        if( $types->save() == true)
        {
            return redirect(route('edit-types.index'))->with('message', '更新成功');
        } else {
            return redirect(route('edit-types.index'))->with('error','更新失敗');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //刪除該筆飲料種類
    public function destroy($id)
    {
        $type = lan_types::findOrFail($id);
        if( $type->delete() == true)
        {
            return redirect(route('edit-types.index'))->with('message', '刪除成功');
        } else {
            return redirect(route('edit-types.index'))->with('error','刪除失敗');
        }
    }
}
