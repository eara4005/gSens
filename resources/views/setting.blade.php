@extends('layouts.app')

@section('content')
<div class="mx-auto" style="width:50rem;">
    <h2>振り向き計算アプリ</h2>

    <div class="card">
        <div class="card-body" >
            <h4 class="cart-title">今の振り向きの長さ(cm)</h4>
            <h5 class="cart-title"><b>{{ $settings['user_sens'] }} cm</b></h5>
            <a href="/home">戻る</a>
        </div>
    </div>
</div>
@endsection