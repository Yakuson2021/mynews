@extends('layouts.admin')
@section('title', '登録情報')

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
//　そのため、「admin/news/index.php」の体裁で上記のリンクを実装しないと実装しないと　その方法を次回に