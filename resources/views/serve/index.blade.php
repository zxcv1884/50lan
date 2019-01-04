@extends('app')

@section('contents')
    <h2>50嵐訂單：</h2>
    <hr>
    <table border="1" align="center">
        <tr>
            <th>訂單編號</th>
            <th>訂單地址</th>
            <th>建立訂單時間</th>
            <th>訂單內容</th>
            <th>修改</th>
            <th>刪除</th>
            <th>訂單完成</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_address }}</td>
                <td>
                    {{ $order->order_at }}
                </td>
                <td>
                    {!! Form::open(['route' => ['lan_orders.show', $order->id], 'method' => 'get']) !!}
                    {!! Form::submit('詳細') !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['lan_orders.edit', $order->id], 'method' => 'get']) !!}
                    {!! Form::submit('修改') !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['lan_orders.destroy', $order->id], 'method' => 'delete']) !!}
                    {!! Form::submit('刪除') !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['lan_orders.update', $order->id], 'method' => 'update']) !!}
                    {!! Form::submit('訂單完成') !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection