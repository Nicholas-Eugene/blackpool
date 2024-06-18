@extends('main')

@section('css')
    <link rel="stylesheet" href="{{ url('css/history.css') }}" />
@stop

@section('content')
    <div class="history-page-container">
        @php
            $currentDate = null;
        @endphp

        @foreach($histories as $history)
            @php
                $formattedDate = \Carbon\Carbon::parse($history->booking_start)->format('m-d-Y');
            @endphp

            @if ($currentDate !== $formattedDate)
                @if ($currentDate !== null)
                    </div>
                @endif

                <div class="date-group">
                    <h2 class="date-header">{{ $formattedDate }}</h2>
                    @php $currentDate = $formattedDate; @endphp
            @endif

            <div class="card">
                <div class="text">
                    <h2>{{ $history->table->name }}</h2>
                    <p>Table {{ $history->table_id }}</p>
                </div>

                <div class="right">
                    <div class="price">Rp. {{ $history->total_price }},00</div>
                    <a class="detail" href="{{ route('history.booking', $history->id) }}">View Detail</a>
                </div>
            </div>

            @if ($loop->last)
                </div>
            @endif
        @endforeach
    </div>

    <script>
        function sortHistory() {
            let sort = document.getElementById('sort').value;
            window.location.href = `{{ url('history') }}?sort=${sort}`;
        }
    </script>
@stop
