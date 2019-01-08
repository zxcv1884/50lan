<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lan_types;
use Illuminate\Support\Facades\DB;
class EditTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = lan_types::all();
        return view('serve.types', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serve.create-types');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function edit($id)
    {
        $types = lan_types::find($id);
        return view('serve.edit-types', compact('types'));
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
    public function destroy($id)
    {
        DB::table('lan_drinks')->where('type_id', '=', $id)->delete();
        $type = lan_types::find($id);
        if( $type->delete() == true)
        {
            return redirect(route('edit-types.index'))->with('message', '刪除成功');
        } else {
            return redirect(route('edit-types.index'))->with('error','刪除失敗');
        }
    }
}
