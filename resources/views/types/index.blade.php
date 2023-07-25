@extends('adminlte::page')

@section('title', '種別一覧')

@section('content_header')
    <h1>種別一覧</h1>
@stop

@section('content')
    登録
    <form action="/type/create" method="post" class="form-container">
        @csrf
        <input type="text" class="form-control" name="name">
        <button class="btn btn-primary" type="submit">登録</button>
    </form>
<table>
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($types as $type)
     <tr>
        <td>{{ $type->id }}</td>
        <td><h3>{{ $type->name }}</h3></td>
        <td>
            <a href="{{ route('type.edit', $type) }}"><button type="submit"class="btn btn-outline-success">編集</button></a>
        </td>
        <td>
            <form method="POST" action="{{route('type.delete',$type)}}"><button type="submit" class="btn btn-outline-danger">削除</button>
            @csrf
            @method('DELETE')
            </form>
        </td>
    </tr>
    @endforeach
</table>
@stop

@section('css')
@stop

@section('js')
@stop
