@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('item.index')}}"method="GET">
                @csrf
                <input type="search" name="keyword"class="form-control"value="{{ $keyword }}"placeholder="キーワード無しは一覧へ">
                <input type="submit" value="PUSH" class="btn btn-primary" >
            </form>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('items/add') }}" class="btn btn-primary">商品登録</a>
                    </div>
                    <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>ID</th>
                                    <th>名前</th>
                                    <th>種別</th>
                                    <th>詳細</th>
                                    <th>個数</th>
                                </tr>
                        </thead>
                            @foreach ($items as $item)
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="{{ route('item.edit',$item) }}" class="btn btn-outline-success mb-3 {{ $item->user->id === \Auth::user()->id ?'' : 'd-none' }}">編集</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('item.delete',$item)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger mb-3 {{ $item->user->id === \Auth::user()->id ?'' : 'd-none' }}"
                                            onclick='return confirm("削除しますか？")'>削除
                                        </button>
                                    </td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                        @if($item->stock ===0)在庫なし
                                        @else{{$item->stock}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div><h6>表示件数：{{ count($items) }}件</h6>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
