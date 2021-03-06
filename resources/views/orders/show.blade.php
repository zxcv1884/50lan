@extends('app')

@section('contents')
    @auth
        <div class="container">
            <div class="content">
                <div class="info col-md-4 bottom">
                    <table border="1" align="center" >
                        <tr>
                            <th>編號</th>
                            <th>飲料</th>
                            <th>冰塊</th>
                            <th>甜度</th>
                        </tr>
                        @foreach($order->order_drinks as $order_drink)
                            <tr>
                                <td>{{ $order_drink->id }}</td>
                                <td>{{$order_drink->drink->drink}}</td>
                                <td>{{ $order_drink->drink_ice }}</td>
                                <td>{{$order_drink->drink_sugar}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endauth
@endsection