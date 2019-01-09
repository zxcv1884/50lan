@extends('app')

@section('contents')
    <div class="main">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container logintop">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="head-title2 card-header card-header-color ">修改訂單</div>
                            <div class="card-body card-body-color ">
                                <div class="col-md-9 infov2 fontstyle">
                                        {!! Form::open(array('method'=>'PUT','route' => ['orders.update', $order->id])) !!}
                                        <div class="form-group row">

                                            {!! Form::label('type', '外送地點：'),   Form::text('address',$order->order_address,['placeholder'=>$order->order_address,'class'=>' form-control']); !!}
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::reset('重新輸入',['class'=>'btn btn-outline-dark form-control']) !!}
                                            {!! Form::Submit('確認送出',['class'=>'btn btn-outline-dark form-control']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                        <hr>
                                </div>
                                <div class="col-sm-8 infov2 fontstyle">

                                    <table border="1" align="center">
                                        <tr>
                                            <th>編號</th>
                                            <th>飲料</th>
                                            <th>冰塊</th>
                                            <th>甜度</th>
                                            <th>修改飲料</th>
                                        </tr>
                                        @foreach($order->order_drinks as $order_drink)
                                            <tr>
                                                <td>{{$order_drink->id}}</td>
                                                <td>{{$order_drink->drink->drink}}</td>
                                                <td>{{$order_drink->drink_ice}}</td>
                                                <td>{{$order_drink->drink_sugar}}</td>
                                                <td>
                                                    {!! Form::open(['route' => ['orders.edit-order-drinks', $order_drink->id], 'method' => 'get']) !!}
                                                    {!! Form::submit('修改',array('class'=>'btn btn-outline-dark')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
