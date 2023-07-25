@extends('adminlte::page')

@section('title', '種別一覧')

@section('content_header')
    <h1>種別編集</h1>
@stop

@section('content')
    <form method="POST"action="{{ route('type.update',$type) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">種別</label>
            <input type="name" class="form-control" id="name" name="name" value="{{$type->name}}">
            <button type="submit" class="btn btn-primary">編集</button>
        </div>
    </form>
@stop

@section('css')
@stop

@section('js')
@stop