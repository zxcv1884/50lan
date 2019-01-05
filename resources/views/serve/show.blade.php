@extends('app')

@section('contents')
    <div class="container">
        <div class="content">
            <div class="info col-md-4">
            <table border="1" align="center"  style="display: inline-table;  word-spacing: -6px; margin-left: -5px;">
                <tr>
                    <th>編號</th>
                </tr>
    @foreach($order_drinks as $order_drink)
                <tr> <td>{{ $order_drink->id }}</td></tr>
            @endforeach
            </table>

            <table border="1" align="center" style="display: inline-table;  word-spacing: -6px;margin-left: -5px">
                <tr>
                    <th>飲料</th>
                </tr>
            @foreach($drink_names as $drink_name)
                    <tr>  <td>{{$drink_name[0]->drink}}</td></tr>
            @endforeach
            </table>
            <table border="1" align="center" style="display: inline-table;  word-spacing: -6px;margin-left: -5px">
                <tr>
                    <th>冰塊</th>
                    <th>甜度</th>
                </tr>
            @foreach($order_drinks as $order_drink)
                    <tr>  <td>{{ $order_drink->drink_ice }}</td>
            <td>{{$order_drink->drink_sugar}}</td>
                    </tr>
            @endforeach
            </table>
</table>
            </div>
        </div>
    </div>
</div>
@endsection