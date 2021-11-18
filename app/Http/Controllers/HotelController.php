<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\hoteluser;

class HotelController extends Controller{

    // ホーム画面
    public function index(){

        // セッションの削除
        session()->flush();

        return view('home.index');
    }


    // 新規ユーザー登録画面を返す
    public function user_create(){
        return view('create.user_create', ['msg' => '登録に必要なお客様情報を入力してください']);
    }



    // 登録データ確認画面を返す
    public function confirm_data(HotelEditRequest $request){
        //$requestには送信された入力情報が入っている。
        // $request->○○で取り出し、$user_data配列のキーと結ぶ
        $user_data=[
            'name' => $request->name,
            'mail' => $request->mail,
            'tel' => $request->tel,
        ];
        return view('create.user_confirm', $user_data);
    }



    //ユーザー登録をデータベースへ行う
    public function create_db(Request $request){

        //hoteluserモデルにあるバリデートを使いチェック
        // （入力時に行っているので不必要だと思うが、教科書にならい一応記述）
        $this->validate($request, hoteluser::$rules);
        //hoteluserモデルのインスタンス作成
        $new_hoteluser = new hoteluser;
        //送信されたデータの配列から全て(all() )を取り出し変数へ
        $data = $request->all();
        //['_token']はフィールドに無い項目で、かつCSRF用フィールドなので
        //あらかじめ削除
        unset($data['_token']);
        //入力データの入った$dataを引数にfillメソッドの呼び出し。
        //saveを呼び出し、インスタンスを保存
        $new_hoteluser->fill($data)->save();

        return view('create.finish_create');


        // モデルを使わないバージョン
        // $param = [
        //     'name' => $request->confirm_name,
        //     'mail' => $request->confirm_mail,
        //     'tel' => $request->confirm_tel,
        // ];
        // DB::table('hotelusers')->insert($param);
        //とりあえずログイン画面へリダイレクト

    }


    //登録処理からリダイレクトされて初期の登録画面へ
    //とりあえず飛ばす。 見分けが付くようにmsgを変更
    public function next_create(){
        return view('create.user_create', ['msg' => '登録完了しました']);
    }
}
