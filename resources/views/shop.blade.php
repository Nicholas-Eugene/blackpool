@extends('main')

@section('css')
    <link rel="stylesheet" href="{{url('css/shop.css')}}" />
@stop

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button Group -->
    <div class="button-group mb-4">
        <a href="{{ route('stick') }}" class="btn btn-primary btn-lg {{ $section == 'stick' ? 'active' : '' }}">Stick</a>
        <a href="{{ route('foodandbeverage') }}" class="btn btn-secondary btn-lg {{ $section == 'foodandbeverage' ? 'active' : '' }}">Food and Beverages</a>
    </div>

    @if($section == 'stick')
        <h2>Sticks</h2>
        <section class="pack" id="stick">
            <div class="box-container">
                @foreach($stick as $stick)
                    <div class="box">
                        <a href="{{url('stickDetail/'.$stick->id)}}">
                            <img src="{{ $stick->mainpic }}" alt="{{ $stick->name }}">
                        </a>
                        <div class="content">
                            <a href="{{url('stickDetail/'.$stick->id)}}"><h3>{{ $stick->name }}</h3></a>
                            <p>{{ $stick->description }}</p>
                            <div class="price">Rp.{{ $stick->price }}</div>
                            <form action="{{ url('/addToCart/stick/' . $stick->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @elseif($section == 'foodandbeverage')
        <h2>Food and Beverages</h2>
        <section class="pack" id="foodandbeverage">
            <div class="box-container">
                @foreach($foodandbeverage as $food)
                    <div class="box">
                        <a href="{{url('foodDetail/'.$food->id)}}">
                            <img src="{{ $food->mainpic }}" alt="{{ $food->name }}">
                        </a>
                        <div class="content">
                            <a href="{{url('foodDetail/'.$food->id)}}"><h3>{{ $food->name }}</h3></a>
                            <p>{{ $food->description }}</p>
                            <div class="price">Rp.{{ $food->price }}</div>
                            <form action="{{ url('/addToCart/food/' . $food->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</div>
@stop

<style>
.button-group {
    display: flex;
    justify-content: center;
    gap: 1rem;
}
</style>
