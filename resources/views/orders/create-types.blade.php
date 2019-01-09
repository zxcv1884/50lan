@extends('app')

@section('contents')
    @auth
    <div class="main">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container logintop">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="head-title2 card-header card-header-color ">新增種類</div>
                        <div class="card-body card-body-color ">
                            {!! Form::open(['url' => 'edit-types']) !!}
                            <div class="order-clone col-sm-7 infov2 fontstyle   bottom">
                                <div class="form-group row form-text">
                                    {!! Form::label('type', '種類名稱：'),   Form::text('type',null,['class'=>'form-control','required' => 'required']); !!}
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
