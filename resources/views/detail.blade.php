@extends('main')

@section('css')
    <link rel="stylesheet" href="{{url('css/detail.css')}}" />
@stop

@section('content')
<div class = "card-wrapper">
    <div class = "card">
      <!-- card left -->
      <div class = "product-imgs">
        <div class = "img-display">
          <div class = "img-showcase">
            <img src = "{{asset('storage/img/billiard/mainPicture/'.$billiard->mainpic)}}" alt = "shoe image">
            <img src = "{{asset('storage/img/billiard/otherPicture/'.$billiard->pic2)}}" alt = "shoe image">
            <img src = "{{asset('storage/img/billiard/otherPicture/'.$billiard->pic3)}}" alt = "shoe image">
            <img src = "{{asset('storage/img/billiard/otherPicture/'.$billiard->pic4)}}" alt = "shoe image">
          </div>
        </div>
        <div class = "img-select">
            <div class = "img-item">
                <a href = "#" data-id = "1">
                    <img src = "{{asset('storage/img/billiard/mainPicture/'.$billiard->mainpic)}}" alt = "shoe image">
                </a>
              </div>
          <div class = "img-item">
            <a href = "#" data-id = "2">
                <img src = "{{asset('storage/img/billiard/otherPicture/'.$billiard->pic2)}}" alt = "shoe image">
            </a>
          </div>
          <div class = "img-item">
            <a href = "#" data-id = "3">
                <img src = "{{asset('storage/img/billiard/otherPicture/'.$billiard->pic3)}}" alt = "shoe image">
            </a>
          </div>
          <div class = "img-item">
            <a href = "#" data-id = "4">
                <img src = "{{asset('storage/img/billiard/otherPicture/'.$billiard->pic4)}}" alt = "shoe image">
            </a>
          </div>

        </div>
      </div>
      <!-- card right -->
      <div class = "product-content">
        <h2 class = "product-title">{{ $billiard->name }}</h2>
        <div class = "product-rating">
          <i class = "fas fa-star"></i>
          <span>{{ $billiard->rating }} ( {{ $billiard->totalrate }} )</span>
        </div>

        <div class = "product-price">
          <p class = "new-price">Price / hour : <span>Rp. {{ $billiard->priceperhour }}</span></p>
        </div>

        <div class = "product-detail">
          <h2>about us </h2>
          <p>{{ $billiard->description }}</p>
          <ul>
            <li>Address : <span>{{ $billiard->address }}</span></li>
            <li>Open At : <span>{{ $billiard->openat }}</span></li>
            <li>Telephone : <span>{{ $billiard->telephone }}</span></li>
            <li>WhatsApp : <span>{{ $billiard->whatsapp }}</span></li>
            <li>Instagram : <span>{{ $billiard->insta }}</span></li>
          </ul>
        </div>

        <div class = "purchase-info">
          <a href="{{url('bookingBilliard/'.$billiard->id)}}"><button type = "button" class = "btn">Book Now</button></a>
        </div>

      </div>
    </div>
  </div>

  <script src="{{url('js/detail.js')}}"></script>
@stop
