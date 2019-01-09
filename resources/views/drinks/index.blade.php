@extends('app')

@section('contents')
    <div class="container">
        <div class="content">
            <div class="head-title1 m-b-md">
                <h2>飲料表</h2>
            </div>
            <div class="info col-md-9 bottom">
                @foreach($types as $type)
                    <table border="1" align="center" width="179" style="display: inline-table; margin-left: 2%">
                        <tr>
                            <th>{{$type->type}}</th>
                            <th>價格</th>
                        </tr>
                        @foreach($drinks as $drink)
                            @if($drink->type_id===$type->id)
                                <tr>
                                    <td>{{$drink->drink}}</td>
                                    <td>{{$drink->drink_price}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection
