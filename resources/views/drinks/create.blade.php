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
                                <div class="order-clone col-sm-9 infov2 fontstyle bottom">

                                        <div class="form-group row">
                                            {!! Form::label('drink_many', '飲料杯數：') !!}
                                            {!! Form::select('drink_many',array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),null,array('class' => 'form-control drink_many'))!!}
                                        </div>
                                    <hr>
                                    <div class="form-group row clone">
                                        {!! Form::label('drink', '飲料名稱：') !!}
                                        {!! Form::select('drink_select[]',($drinks_select),null,array('class' => 'form-control'))!!}
                                    </div>
                                    <div class="form-group row clone">
                                            {!! Form::label('drink_sugar', '甜度：'),Form::select('drink_sugar[]', array( '微糖' => '微糖', '半糖' => '半糖','少糖' => '少糖','無糖' => '無糖', '正常' => '正常'),null,array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group row clone">
                                        {!! Form::label('drink_ice', '冰塊：'),Form::select('drink_ice[]', array( '微冰' => '微冰', '少冰' => '少冰','正常' => '正常','溫' => '溫', '熱' => '熱'),null,array('class' => 'form-control'))  !!}
                                    </div>
                                    <div class="form-group clone">
                                        <hr style="border:1px solid gray"> <br>
                                    </div>
                                    <div class="create">
                                    </div>
                                    <div class="form-group row form-text">
                                    {!! Form::label('type', '外送地點：'),   Form::text('address',null,['placeholder'=>'滿兩百才有外送','class'=>'form-control']); !!}
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
    <script>

        $.fn.duplicate = function(count, cloneEvents) {
            var tmp = [];
            for ( var i = 0; i < count; i++ ) {
                $.merge( tmp, this.clone( cloneEvents ).get() );
            }
            return this.pushStack( tmp );
        };
        $('.drink_many').on('change', function() {
            $('.create').html("");
        $( ".clone" ).duplicate(this.value).appendTo( ".create" )
        });
    </script>
@endsection
