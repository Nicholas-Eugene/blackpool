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
                    <form action="{{ route('checkout') }}" method="POST" id="checkout-form">
                        @csrf

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
                                    <button type="button" class="decrement" data-id="{{ $item->id }}">-</button>
                                    <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" min="1" readonly>
                                    <button type="button" class="increment" data-id="{{ $item->id }}">+</button>
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

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const updateCart = (cartItemId, action) => {
        fetch(`/cart/${action}/${cartItemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  const cartItem = document.querySelector(`.cart-item[data-id='${cartItemId}']`);
                  const quantityInput = cartItem.querySelector('input[name^="quantities"]');
                  const itemTotal = cartItem.querySelector('.item-total');
                  const subtotalElement = document.getElementById('subtotal');
                  const totalPriceElement = document.getElementById('total-price');

                  quantityInput.value = data.newQuantity;
                  itemTotal.textContent = `Rp. ${new Intl.NumberFormat('id-ID').format(data.newItemTotal)}`;
                  subtotalElement.textContent = `Rp. ${new Intl.NumberFormat('id-ID').format(data.newSubtotal)}`;
                  totalPriceElement.textContent = `Rp. ${new Intl.NumberFormat('id-ID').format(data.newSubtotal + 15000)}`;
              }
          }).catch(error => console.error('Error:', error));
    };

    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', function () {
            const cartItemId = this.dataset.id;
            updateCart(cartItemId, 'decrement');
        });
    });

    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', function () {
            const cartItemId = this.dataset.id;
            updateCart(cartItemId, 'increment');
        });
    });
});
</script>
@stop
