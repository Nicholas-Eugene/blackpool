@extends('main')

@section('css')
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{url('css/payment.css')}}" />
@stop

@section('content')
<div class="card-wrapper">
    <div class="card">
      <!-- card left -->
      <div class="product-imgs">
      </div>

      <!-- card right -->
      <div class="product-content">
        <h2 class="product-title">{{ $history->table->name }}</h2>

        <div class="product-detail">
            <p>Date: <span>{{ $history->booking_start }}</span></p>
            <p>Time: 
                <span>
                    @php
                        $times = json_decode($history->time, true);
                        echo implode(', ', $times);
                    @endphp
                </span>
            </p>
            <p>Table: <span>{{ $history->table_id }}</span></p>
            <p>Payment Method: <span>{{ $history->payment_method }}</span></p>
            <p>Total Price: <span>Rp. {{ $history->total_price }}</span></p>
        </div>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td></td>
                    <td>Rp. {{ $history->total_price - 15000 }}</td>
                </tr>
                <tr>
                    <td>Admin Fee</td>
                    <td></td>
                    <td>Rp. 15000</td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td></td>
                    <td>Rp. {{ $history->total_price }}</td>
                </tr>
            </table>
        </div>
      </div>
    </div>
  </div>
@stop