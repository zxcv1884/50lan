@extends('app')

@section('contents')
    @auth
    <div class="container">
        <div class="content">
            <div class="info col-md-5">
                <table border="1" align="center" >
                    <tr>
                        <th>種類編號</th>
                        <th>種類名稱</th>
                        <th>修改</th>
                        <th>刪除</th>
                    </tr>
                    @foreach($types as $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->type }}</td>
                                <td>
                                    {!! Form::open(['route' => ['edit-types.edit', $type->id], 'method' => 'get']) !!}
                                    {!! Form::submit('修改',array('class'=>'btn btn-outline-dark')) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['edit-types.destroy', $type->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('刪除',array('class'=>'btn btn-outline-dark' )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                    @endforeach
                </table>
                <div class="info">
                    <a href="{{ URL::route('edit-types.create') }}" class="btn btn-outline-dark form-control">新增 </a>
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection