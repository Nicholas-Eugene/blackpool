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
            <img src = "{{url('storage/img/payment.jpg')}}">
          </div>
        </div>
      </div>

      <!-- card right -->

      <div class = "product-content">
        <h2 class = "product-title">{{ $billiard->billiard->name }}</h2>

        <div class = "product-detail">
            <p>Date: <span>{{ now()->format('Y-m-d') }}</span></p>
            <p>Time: <span>{{ $billiard->time }}</span></p>
            <p>Table: <span>{{ $billiard->tablenumber }}</span></p>
        </div>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>{{ $billiard->billiard->priceperhour }} x {{ $billiard->totaltables }}</td>
                    <td>Rp. {{ $billiard->totalprice }}</td>
                </tr>
                <tr>
                    <td>Admin Fee</td>
                    <td></td>
                    <td>Rp. 15000</td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td></td>
                    @php
                        $fixedPrice = $billiard->totalprice + 15000;
                    @endphp
                    <td>Rp. {{ $fixedPrice }}</td>
                </tr>
            </table>
        </div>

        <form action="/checkout/{{ $billiard->billiard_id }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="wrap">
                <div class="select-menu">
                    <span>Payment Method : </span>
                    <select name="paymentmethod">
                        <option value="Virtual Account">Virtual Account</option>
                        <option value="DANA">DANA</option>
                        <option value="GOPAY">GOPAY</option>
                        <option value="OVO">OVO</option>
                        <option value="PayPal">PayPal</option>
                    </select>
                </div>
                <div class = "purchase-info">
                    <button type="submit" class="btn">Confirm Order</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  <script src="{{url('js/payment.js')}}"></script>
@stop
