@extends('layouts.admin')
@section('title', '登録情報')
@section('content')
    <div class="container">
        <div class="row">
            <h2>ニュース一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ProfileController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ str_limit($profile->title, 100) }}</td>
                                    <td>{{ str_limit($profile->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\ProfileController@delete', ['id' => $profile->id]) }}">削除</a>
                                        </div>
                                        
                                        
                                        
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

//2021 12/15課題　
//ここのページは　Routing→「Route::get('profile', 'Admin\ProfileController@index'); 」
//　　　　　　　　コントローラー→「Admin/Profile/Controller.php」の、「admin.profile.index」
//              　に対応する、ログイン後のプロフィール画面を出したい

//　　　　　　　　プロフィール画面のモデルは「admin/profile/create.blade.php」を参考にプロフィール画面を体裁よく出したい
//　　　　　　　　ただし、Controllerのアクションとして「deleteアクション」と「editアクション」を表示しないといけない

//<div>
//                                            <a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}">編集</a>
//                                       </div>
//                                       <div>
//                                           <a href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">削除</a>
//                                       </div>
//
//　とりあえず、「admin/news/index.php」の体裁で上記のリンクを実装、その次に上記の「編集」「削除」の実装を