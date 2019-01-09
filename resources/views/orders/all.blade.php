@extends('app')

@section('contents')
    @auth
    <div class="info">
        <table border="1" align="center">
            <tr>
                <th>訂單編號</th>
                <th>訂單地址</th>
                <th>建立訂單時間</th>
                <th>完成訂單時間</th>
                <th>訂單內容</th>
            </tr>
            @foreach($orders as $order)
                <?php $finish = $order->order_finish_at?>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_address }}</td>
                        <td>{{ $order->order_at }}</td>
                        <td>{{$order->order_finish_at}}</td>
                        <td>
                            {!! Form::open(['route' => ['orders.show', $order->id], 'method' => 'get']) !!}
                            {!! Form::submit('詳細',array('class'=>'btn btn-outline-dark')) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
            @endforeach
        </table>
    </div>
    @endauth
@endsection