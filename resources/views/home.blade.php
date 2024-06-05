@extends('main')

@section('css')
    <link rel="stylesheet" href="{{url('css/home.css')}}" />
@stop

@section('content')
    <section class="pack" id="pack">
        <div class="box-container">
            @foreach ($billiards as $billiard)
                <div class="box">
                    <a href="{{url('billiardDetail/'.$billiard->id)}}">
                        <img src="{{asset('storage/img/billiard/mainPicture/'.$billiard->mainpic)}}" alt="">
                    </a>
                    <div class="content">
                        <a href="{{url('billiardDetail/'.$billiard->id)}}"><h3>{{ $billiard->name }}</h3></a>
                        <p><i class="fas fa-map-marker-alt"></i> {{ $billiard->address }}</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <span>{{ $billiard->rating }} ( {{ $billiard->totalrate }} )</span>
                        </div>
                        <div class="price">Rp. {{ $billiard->priceperhour }} / hour</div>
                        <a href="{{url('bookingBilliard/'.$billiard->id)}}" class="btn">book now</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination-container">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ $billiards -> previousPageUrl() }}">&laquo;</a>
                </li>
                @for ($i = 1; $i <= $billiards -> lastPage(); $i++)
                    @if ($i == $billiards -> currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="">{{ $i }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $billiards -> url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $billiards -> nextPageUrl() }}">&raquo;</a>
                </li>
            </ul>
        </div>
    </section>
@stop
