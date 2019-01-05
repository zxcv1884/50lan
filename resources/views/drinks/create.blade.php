@extends('app')

@section('contents')
    <div class="main">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container logintop">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="head-title2 card-header card-header-color ">飲料訂單</div>
                            <div class="card-body card-body-color ">
        {!! Form::open(['url' => 'drinks']) !!}
                                <div class="order-clone">
        <div class="form-group row ">
            {!! Form::label('drink', '飲料名稱：') !!}
            {!! Form::select('drink_select',($drinks_new))!!}
        </div>
            <div class="form-group row">
                {!! Form::label('drink_sugar', '甜度：'),Form::select('drink_sugar', array( '微糖' => '微糖', '半糖' => '半糖','少糖' => '少糖','無糖' => '無糖', '正常' => '正常')) !!}
            </div>
                                <div class="form-group row">
                                    {!! Form::label('drink_ice', '冰塊：'),Form::select('drink_ice', array( '微冰' => '微冰', '少冰' => '少冰','正常' => '正常','溫' => '溫', '熱' => '熱'))  !!}
                                </div>
                                    <div class="form-group row">
                                    {!! Form::label('type', '外送地點：'),   Form::text('address',null,['placeholder'=>'滿兩百才有外送']); !!}
                                    </div>
                                <div class="form-group row">
                                    {!! Form::reset('重新輸入') !!}
                                    {!! Form::Submit('確認送出') !!}
                                </div>
                                <hr>

                                </div>

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