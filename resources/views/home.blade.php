@extends('main')

@section('css')
    <link rel="stylesheet" href="{{ url('css/home.css') }}" />
@stop

@section('content')
    <div class="content">
        <div class="gallery-container">
            <div class="gallery">
                <img src="{{ url('storage/img/bp1.jpg') }}" alt="Image 1">
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ url('js/home.js') }}"></script>
@stop
