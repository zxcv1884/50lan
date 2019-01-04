@extends('app')

@section('contents')
    <h2>飲料表 </h2>
    <table border="1" align="center">

        <tr>
            @foreach($types as $type)
            <th>{{$type->type}}</th>
                <th>價格</th>
            @endforeach
        </tr>
        <?php $finish =array("zero")?>
        <?php $current=1;?>
        @for($z=1;$z<=count($types);$z++)
        <tr>
            <?php $j=1;$y=0;$count=0 ?>
                @for($i=1;$i<=count($drinks);$i++)
                    @if($j>count($types))
                        <?php $j=1; ?>
                    @endif
                        @if($y!==$j)
                            <?php $y = $j;$count= 0;?>
                        @elseif($y===$j)
                            <?php $count++?>
                                @if($count===count($types))
                                    <?php $j++?>
                                    <td></td>
                                    <td></td>
                                @endif
                        @endif
                        @foreach($drinks as $drink)
                                @if($drink->id === $i && $drink->type_id ===$j&&!isset($finish[$drink->id]) )
                                    <td>{{$drink->drink}}</td>
                                    <td>{{$drink->drink_price}}</td>
                                    <?php $finish[$drink->id] = $drink->drink?>
                                    <?php $j++;?>
                                @break
                                @endif
                        @endforeach
                @endfor
        </tr>
        @endfor
    </table>
@endsection
