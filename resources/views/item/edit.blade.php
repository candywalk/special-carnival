@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST"action="{{ route('item.update',$item) }}">
                @csrf
                @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
                        </div>

                        <div class="form-group">
                            <label for="type_id">種別</label>
                            <select class="form-control" id="type" name="type" value="{{$item->type}}">
                                @foreach($types as $type)
                                    <option value="{{$type->type_id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{$item->detail}}">
                        </div>

                        <div class="form-group">
                            <label for="detail">個数</label>
                            <input type="text" class="form-control" id="stock" name="stock" value="{{$item->stock}}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
