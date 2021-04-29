@extends('layouts.app')

@section('content')
<div class="mx-auto" style="width:50rem;">
    <h2>振り向き計算アプリ</h2>

    <div class="card">
        <div class="card-body" >
            <p>
                ゲーム（PC）の振り向き計算ツールです。</br>
                ゲームを選択後、DPIと感度に値を入力すると自動計算されます。(cm=180)</br>
                感度には選択したゲームのゲーム内感度を設定してください。</br>
                ログインすると現在の振り向き長さ(cm)が保存できます。</br>
            </p>
            </br>

            <h5 class="card-title">対応しているゲーム</h5>
            <b>
                Apex Legends,Call of Duty,CS:GO</br>
                Destiny 2,Escape from Tarcov,Fortnite</br>
                Left 4 Dead 1・2,Overwatch,RUST</br>
                Titanfall 2,VALORANT</br>
            </b>
            </br>

            <form>
                <h5 class="card-title">ゲームタイトル</h5>
                <select type="hidden" name="games" value="{{$games}}" style="height: 35px; width: 150px;">
                    <option value='' style='display:none;'>選択してください</option>
                    <option name="apex" value='0.022'>Apex Legends</option>
                    <option name="cod" value='0.0066'>Call Of Duty</option>
                    <option name="csgo" value='0.022'>CS:GO</option>
                    <option name="destiny2" value='0.0066'>Destiny2</option>
                    <option name="eft" value='0.0125'>Escape from Tarcov</option>
                    <option name="fortnite" value='0.5715S'>Fortnite</option>
                    <option name="l4d" value='0.022'>Left 4 Dead 1・2</option>
                    <option name="ow" value='0.0066'>Overwatch</option>
                    <option name="r6s" value='0.00573'>RainbowSixSiege</option>
                    <option name="rust" value='0.1125'>RUST</option>
                    <option name="tf2" value='0.022'>Titanfall 2</option>
                    <option name="valo" value='0.07'>VALORANT</option>
                </select>
                </br></br>

                <h5 class="card-title">DPI</h5>
                <input type="text" name="dpi" value="{{$dpi}}" style="height: 30px; width: 150px;">
                </br></br>

                <h5 class="card-title">ゲーム内感度</h5>
                <input type="text" name="useSens" value="{{$useSens}}" style="height: 30px; width: 150px;">

                <button type="submit" class="btn btn-outline-info">表示</button>
            </form>
            </br>

            <h5 class="card-title">振り向き(cm)は　<b>{{ round($gameSens,2) }}cm　</b>です</h5>
            @guest
            <!-- 特に処理はしません -->
            @else
            <form method='POST' action="/store">
            @csrf
                <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                <input type="hidden" name="dpi" value="{{$dpi}}">
                <input type="hidden" name="useSens" value="{{$useSens}}">
                <input type="hidden" name="storeSens" value="{{ round($gameSens,2) }}">
                <button type="submit" class="btn btn-outline-info">結果を表示する</button>
            </form>
            @endguest
        </div>
    </div>
</div>
@endsection