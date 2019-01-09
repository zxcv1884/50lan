@extends('app')

@section('contents')
    @auth
    <div class="main">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container logintop">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="head-title2 card-header card-header-color ">新增飲料</div>
                        <div class="card-body card-body-color ">
                            {!! Form::open(['url' => 'edit-drinks']) !!}
                            <div class="order-clone col-sm-7 infov2 fontstyle">
                                <div class="form-group row form-text">
                                    {!! Form::label('type_id', '種類編號(數字)：'),   Form::text('type_id',null,['class'=>'form-control','required' => 'required']); !!}
                                </div>
                                <div class="form-group row form-text">
                                    {!! Form::label('drink', '飲料名稱：'),   Form::text('drink',null,['class'=>'form-control','required' => 'required']); !!}
                                </div>
                                <div class="form-group row form-text">
                                    {!! Form::label('drink_price', '飲料價格：'),   Form::text('drink_price',null,['class'=>'form-control','required' => 'required']); !!}
                                </div>
                                <div class="form-group row">
                                    {!! Form::reset('重新輸入' ,['class'=>'btn btn-outline-dark form-control'])!!}
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
    @endauth
@endsection
