@extends('adminlte::page')

@section('title', '在庫')

@section('content_header')
    <center><h1>在庫一覧</h1></center>
@stop

@section('content')
<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>種別</th>
            <th>詳細</th>
            <th>個数</th>
        </tr>
    </thead>
        @foreach ($items as $item)
        @if($item->stock ===0)
        @else
        <tbody>
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->detail }}</td>
                <td>{{$item->stock}}</td>
            </tr>
        @endif
        @endforeach
        </tbody>
</table>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

