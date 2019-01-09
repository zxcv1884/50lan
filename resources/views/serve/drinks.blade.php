@extends('app')

@section('contents')
    <div class="container">
        <div class="content">
            <div class="info col-md-7">
                <table border="1" align="center" >
                    <tr>
                        <th>飲料編號</th>
                        <th>飲料名稱</th>
                        <th>飲料價格</th>
                        <th>種類名稱</th>
                        <th>修改</th>
                        <th>刪除</th>
                    </tr>
                    @foreach($drinks as $drink)
                        <tr>
                            <td>{{ $drink->id }}</td>
                            <td>{{ $drink->drink }}</td>
                            <td>{{ $drink->drink_price }}</td>
                            <td>{{ $drink->type->type }}</td>
                            <td>
                                {!! Form::open(['route' => ['edit-drinks.edit', $drink->id], 'method' => 'get']) !!}
                                {!! Form::submit('修改',array('class'=>'btn btn-outline-dark')) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open(['route' => ['edit-drinks.destroy', $drink->id], 'method' => 'delete']) !!}
                                {!! Form::submit('刪除',array('class'=>'btn btn-outline-dark')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="info">
                    <a href="{{ URL::route('edit-drinks.create') }}" class="btn btn-outline-dark form-control">新增 </a>
                </div>
            </div>
        </div>
    </div>
@endsection