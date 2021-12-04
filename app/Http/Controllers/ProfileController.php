<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{


//↓2021年12月4日（土）22：23　NewsControllerから引用。
//カリキュラム19の内容になぞらえるため。
public function index(Request $request)
{
    $posts = Profile::all()->sortByDesc('updated_at');
    if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
    // profile/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
    return view('profile.index', ['headline' =>
    //
    $headline, 'posts' => $posts]);
    
    //カリキュラム16の課題で実施した、Controllerファイルの
    //「Admin/ProfileController.php」の、「Profile モデルから取得したデータを渡す」
    //ということで以下を持ってきた。
    $profile = Profile::find($request->id);

}
}