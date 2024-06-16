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
                    <img src="{{ url('storage/img/payment.jpg') }}">
                </div>
            </div>
        </div>

        <!-- card right -->
        <div class="product-content">
            <h2 class="product-title">{{ $cart->table->name }}</h2>
            <div class="product-detail">
                <p>Date: <span>{{ $cart->date }}</span></p>
                <p>Time: <span>{{ implode(', ', json_decode($cart->time)) }}</span></p>
                <p>Table: <span>{{ $cart->tablenumber }}</span></p>
            </div>
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>{{ $cart->totalprice }}</td>
                    </tr>
                    <tr>
                        <td>Admin Fee</td>
                        <td>Rp. 15000</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        @php
                            $fixedPrice = $cart->totalprice + 15000;
                        @endphp
                        <td>Rp. {{ $fixedPrice }}</td>
                    </tr>
                </table>
            </div>

            <form action="{{ route('confirm.order', ['cartId' => $cart->id]) }}" method="POST">
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
                <div class="purchase-info">
                    <button type="submit" class="btn">Confirm Order</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="{{ url('js/payment.js') }}"></script>
@stop