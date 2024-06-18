@extends('main')

@section('css')
    <link rel="stylesheet" href="{{ url('css/history.css') }}" />
@stop

@section('content')
<div class="history-page-container">
    @foreach ($histories as $dateTime => $historyGroup)
        <div class="order-header">
            <h2>Order {{ $loop->iteration }}</h2>
            <span class="date-time">{{ $dateTime }}</span>
        </div>

        @foreach ($historyGroup as $history)
            <div class="card">
                <div class="image">
                    @if ($history->product_type == 'stick')
                        <img src="{{ asset('storage/img/stick/' . $history->stick->image) }}" alt="{{ $history->stick->name }}">
                    @elseif ($history->product_type == 'foodandbeverage')
                        <img src="{{ asset('storage/img/foodandbeverage/' . $history->foodAndBeverage->image) }}" alt="{{ $history->foodAndBeverage->name }}">
                    @endif
                </div>
                <div class="text">
                    <span class="date">{{ $history->date }}</span>
                    <h2>{{ $history->product_type == 'stick' ? $history->stick->name : $history->foodAndBeverage->name }}</h2>
                </div>
                <div class="right">
                    <div class="price">Rp. {{ number_format($history->totalprice, 0, ',', '.') }},00</div>
                    <a class="detail" href="{{ route('historydetail', ['historyIds' => $historyGroup->pluck('id')->implode(',')]) }}">View Detail</a>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
@stop
