@extends('main')

@section('css')
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ url('css/payment.css') }}" />
@stop

@section('content')
<div class="card-wrapper">
    <div class="card">
        <!-- card left -->
        <div class="product-imgs">
            <div class="img-display">
            <div class="img-showcase">
                @foreach ($historyItems as $history)
                    <img src="{{ asset('storage/img/success.png') }}" alt="Success">
                @endforeach
            </div>
            </div>
        </div>
        <!-- card right -->
        <div class="product-content">
            @foreach ($historyItems as $history)
                <h2 class="product-title">
                    {{ $history->product_type == 'stick' ? $history->stick->name : $history->foodAndBeverage->name }}
                </h2>

                <div class="product-detail">
                    <p>Date: <span>{{ $history->date }}</span></p>
                    <p>Time: <span>{{ $history->time }}</span></p>
                    <p>Quantity: <span>{{ $history->quantity }}</span></p> <!-- Display quantity here -->
                    <p>Price: <span>Rp. {{ number_format($history->totalprice, 0, ',', '.') }}</span></p>
                    <p>Payment Method: <span>{{ $history->paymentmethod }}</span></p>
                </div>
            @endforeach

            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Admin Fee</td>
                        <td>Rp. 10,000</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td>Rp. {{ number_format($totalPriceWithAdmin, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
