<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>プロフィールページです</title>
    </head>
    <body>
        <h1>プロフィールページ</h1>
    </body>
</html>


@extends('layouts.admin')
@section('title', 'ニュースの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
<div class="form-group row">
                        <label class="col-md-2">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    
 <div class="form-group row">
                        <label class="col-md-2">性別(gender)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->gender }}">
                        </div>
                    </div>
                    
<div class="form-group row">
                        <label class="col-md-2">趣味(hobby)</label>
                        <div class="col-md-10">
                           <input type="text" class="form-control" name="name" value="{{ $profile_form->hobby }}">
                        </div>
                    </div>

 <div class="form-group row">
                        <label class="col-md-2">自己紹介欄(introduction)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" value="{{ $profile_form->introduction }}">
                        </div>
                            
                        </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection