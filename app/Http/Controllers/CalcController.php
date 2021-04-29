<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sens;

class CalcController extends Controller
{
    //
    public function getCalc(Request $request)
    {
        $user = \Auth::user();
        
        $data['games'] = $request->input('games');
        $data['dpi'] = $request->input('dpi');
        $data['useSens'] = $request->input('useSens');

        if($data['dpi']||$data['useSens']||$data['games'])
        {
            $data['gameSens'] = (180/($data['dpi']*$data['useSens']*$data['games']))*2.54;
        }else{
            $data['gameSens'] = "0";
        }

        return view('num', $data,compact('user'));
    }

    public function store(Request $request)
    {  
        // ユーザ情報を取得
        $user = \Auth::user();
        
        // POSTされたデータを取得
        $data = $request->all();

        // DB上のセンシを取得
        $settings = Sens::where('user_id',$user['id'])->where('status',1)->first();

        if($settings != $data['storeSens']){

            //前データを削除
            $settings = Sens::where('user_id',$user['id'])->delete();

            //新しいデータを挿入
            $sens_id=Sens::insertGetId([
                'user_sens' => $data['storeSens'],
                'user_id' => $data['user_id'],
                'user_dpi' => $data['dpi'],
                'games_sens' => $data['useSens'], 
                'status' => 1
            ]);
        }

        // リダイレクト処理
        return redirect()->route('setting');
    }

    public function showSetting()
    {
        // ユーザ情報を取得
        $user = \Auth::user();

        // DB上のセンシを取得
        $settings = Sens::where('user_id',$user['id'])->where('status',1)->first();
        return view('setting',compact('settings','user'));
    }


}
