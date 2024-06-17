@extends('main')

@section('css')
    <link rel="stylesheet" href="{{url('css/history.css')}}" />
@stop

@section('content')
    <div class="history-page-container">
        @foreach($histories as $history)
            <div class="card">
                <div class="image">
                    <!-- Assuming you have an image related to the table or a placeholder -->
                    <!-- You might need to adjust this line based on how you store table images -->
                    <img src="{{ asset('storage/img/tables/' . $history->table->image) }}" alt="Table Image">
                </div>
                <div class="text">
                    <span class="date">{{ $history->booking_start }}</span>
                    <h2>{{ $history->table->name }}</h2>
                    <p>Table {{ $history->table_id }}</p>
                </div>

                <div class="right">
                    <div class="price">Rp. {{ $history->total_price }},00</div>
                    <a class="detail" href="{{ url('historyDetail/' . $history->id) }}">View Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@stop
