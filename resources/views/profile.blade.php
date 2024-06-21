@extends('main')

@section('css')
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('css/profile.css') }}" />
@stop

@section('content')
<div class="card-wrapper">
    <div class="product-content">
        <form action="/updateUser/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="sign-in-form">
            @csrf
            <div class="upload">
                <!-- Pastikan menggunakan asset() untuk mendapatkan URL gambar -->
                <img src="{{ asset('storage/img/' . Auth::user()->profilepic) }}">
                <label for="photo" class="round">
                    <input type="file" name="photo" id="photo" style="display:none;">
                    <i class="fa fa-camera" style="color: #fff;"></i>
                </label>
            </div>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" required name="username" value="{{ Auth::user()->username }}">
            </div>

            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Email" required name="email" value="{{ Auth::user()->email }}">
            </div>

            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" required name="password">
            </div>

            <div class="buttons">
                <input type="submit" value="Update" class="btn solid">
                <a href="/signOut"><input value="Log Out" id="btnLogout" class="btn solid"></a>
            </div>
        </form>
    </div>
</div>
@endsection
