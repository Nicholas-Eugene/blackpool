@extends('main')

@section('css')
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{url('css/payment.css')}}" />
@stop

@section('content')
<div class = "card-wrapper">
    <div class = "card">
      <!-- card left -->
      <div class = "product-imgs">
        <div class = "img-display">
          <div class = "img-showcase">
            <img src = "{{asset('storage/img/billiard/mainPicture/'.$history->billiard->mainpic)}}">
          </div>
        </div>
      </div>

      <!-- card right -->

      <div class = "product-content">
        <h2 class = "product-title">{{ $history->billiard->name }}</h2>

        <div class = "product-detail">
            <p>Date: <span>{{ $history->date }}</span></p>
            <p>Time: <span>{{ $history->time }}</span></p>
            <p>Table: <span>{{ $history->tablenumber }}</span></p>
            <p>Payment Method: <span>{{ $history->paymentmethod }}</span></p>
        </div>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>{{ ($history->totalprice - 15000)/$history->totaltables }} x {{ $history->totaltables }}</td>
                    <td>Rp. {{ $history->totalprice-15000 }}</td>
                </tr>
                <tr>
                    <td>Admin Fee</td>
                    <td></td>
                    <td>Rp. 15000</td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td></td>
                    <td>Rp. {{ $history->totalprice }}</td>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>
@stop
