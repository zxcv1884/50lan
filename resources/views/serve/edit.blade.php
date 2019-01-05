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
                            @foreach($orders as $order)
                            {!! Form::open(array('method'=>'PUT','route' => ['serve.update', $order->id])) !!}
                            <div class="order-clone">
                                <div class="form-group row">

                                    {!! Form::label('type', '外送地點：'),   Form::text('address',null,['placeholder'=>$order->order_address,'class'=>' form-control']); !!}
                                        @endforeach
                                </div>
                                <div class="form-group row">
                                    {!! Form::reset('重新輸入',['class'=>'btn btn-outline-dark form-control']) !!}
                                    {!! Form::Submit('確認送出',['class'=>'btn btn-outline-dark form-control']) !!}
                                </div>
                                <hr>

                            </div>
                        {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
