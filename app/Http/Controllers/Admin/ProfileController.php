<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 以下を追記することでNews Modelが扱えるようになる
use App\Profile;

// 冒頭に以下を追記
use App\History;
use Carbon\Carbon;


//  2021/12/17　URL開けれるかの確認結果
//  /admin/news/create→OK
//  /admin/profile/create→OK
//  /admin/profile/edit→NG  ★
//  /admin/profile→NG   ★
//  /admin/news→OK
//  /admin/news/edit→OK
//  /admin/new/delete→OK
//  /profile→OK
//  /→OK

class ProfileController extends Controller
{
  public function add()
  {
      return view('admin.profile.create');
  }
  
  public function create(Request $request)
  {
    
      // 以下を追記
      // Varidationを行う
      $this->validate($request, Profile::$rules);
      
      $profile = new Profile;
      $form = $request->all();
      
   
 
// フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
      
      return redirect('admin/profile/create');
  }

  // 以下を追記
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
 public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $profile = Profile::find($request->id);

      return view('admin.profile.edit', ['profile_form' => $profile]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // News Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);
      // 20211215課題FB無効化
      // unset($profile_form['image']);
      // unset($profile_form['remove']);

      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
      
                      // 以下を追記
        $history = new ProfileHistory();
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();

      return redirect('admin/profile/');
  }

  // 以下を追記　　
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
  } 
}