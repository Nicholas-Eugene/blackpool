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
                    <img src="{{ url('storage/img/payment.jpg') }}" alt="Payment">
                </div>
            </div>
        </div>

        <!-- card right -->
        <div class="product-content">
            <h2 class="product-title">Payment Details</h2>

            <div class="product-detail">
                @php
                    $subtotal = 0;
                @endphp

                @if($cartItems->isEmpty())
                    <p>Your cart is empty. <a href="{{ url('/shop') }}">Go buy stuff in the shop!</a></p>
                @else
                    @foreach ($cartItems as $item)
                        @php
                            $productPrice = $item->product->price ?? 0;
                            $totalItemPrice = $productPrice * $item->quantity;
                            $subtotal += $totalItemPrice;
                        @endphp
                        <div class="cart-item" data-id="{{ $item->id }}">
                            <p>Product: <span class="product-name">{{ $item->product->name ?? 'Unknown' }}</span></p>
                            <p>Price: <span class="product-price">Rp. {{ number_format($productPrice, 0, ',', '.') }}</span></p>
                            <div class="quantity-controls">
                                <form action="{{ route('cart.decrement', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="decrement" data-id="{{ $item->id }}">-</button>
                                </form>
                                <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" min="1" readonly>
                                <form action="{{ route('cart.increment', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="increment" data-id="{{ $item->id }}">+</button>
                                </form>
                            </div>
                            <p>Total: <span class="item-total">Rp. {{ number_format($totalItemPrice, 0, ',', '.') }}</span></p>
                        </div>
                    @endforeach

                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td id="subtotal">Rp. {{ number_format($subtotal, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Admin Fee</td>
                                <td>Rp. 10,000</td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td id="total-price">Rp. {{ number_format($subtotal + 10000, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </div>

                    <form action="{{ route('checkout') }}" method="POST" id="checkout-form">
                        @csrf
                        <div class="wrap">
                            <div class="select-menu">
                                <span>Payment Method:</span>
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
                    
                    <form action="{{ url('/clearCart') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Clear Cart</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
