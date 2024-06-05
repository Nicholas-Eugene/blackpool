@extends('main')

@section('css')
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('css/profile.css')}}" />
@stop

@section('content')
<div class = "card-wrapper">
    <!-- card left -->

    <!-- card right -->

    <div class = "product-content">
      <form action="/updateUser/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" class="sign-in-form">
          {{ csrf_field() }}
          <div class="upload">
              <img src="{{asset('storage/img/'. Auth::user()->profilepic)}}" width = 100 height = 100 alt="">
              <div class="round">
                <input type="file" name="photo" id="photo">
                <i class = "fa fa-camera" style = "color: #fff;"></i>
            </div>
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" required name="username"/>
          </div>

          <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" required name="email"/>
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" required name="password"/>
          </div>

          <div class="buttons">
              <input type="submit" value="Update" class="btn solid" />
              <a href="/signOut"><input value="Log Out" id="btnLogout" class="btn solid" style="text-align: center;"/></a>
          </div>
      </form>
    </div>
</div>
@stop
