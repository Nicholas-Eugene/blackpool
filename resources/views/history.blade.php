@extends('main')

@section('css')
    <link rel="stylesheet" href="{{url('css/history.css')}}" />
@stop

@section('content')
    <div class="history-page-container">
        @foreach($histories as $history)
            <div class="card">
                <div class="image">
                    <img src="{{asset('storage/img/billiard/mainPicture/'.$history->billiard->mainpic)}}" alt="">
                </div>
                <div class="text">
                    <span class="date">{{ $history->date }}</span>
                    <h2>{{ $history->billiard->name }}</h2>
                    <p>Table {{ $history->tablenumber }}</p>
                </div>

                <div class="right">
                    <div class="price">Rp. {{ $history->totalprice }},00</div>
                    <a class="detail" href="{{url('historyDetail/'.$history->id)}}">View Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@stop
