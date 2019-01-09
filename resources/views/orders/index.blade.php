@extends('app')

@section('contents')
    @auth
    <div class="info">
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
            @if(!isset($order->order_finish_at) )
            <tr>
                <td>{{ $order->id }}</td>
 .
                <td>{{ $order->order_address }}</td>
                <td>
                    {{ $order->order_at }}
                </td>
                <td>
                    {!! Form::open(['route' => ['orders.show', $order->id], 'method' => 'get']) !!}
                    {!! Form::submit('詳細',array('class'=>'btn btn-outline-dark')) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['orders.edit', $order->id], 'method' => 'get']) !!}
                    {!! Form::submit('修改',array('class'=>'btn btn-outline-dark')) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    {!! Form::submit('刪除',array('class'=>'btn btn-outline-dark')) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['route' => ['orders.finish', $order->id], 'method' => 'get']) !!}
                    {!! Form::submit('訂單完成',array('class'=>'btn btn-outline-dark')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
               @endif
        @endforeach
    </table>
    </div>
    @endauth
@endsection