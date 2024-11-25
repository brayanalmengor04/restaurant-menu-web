@extends('template.sectiontemplate')
@section('title', 'Menu QR Code')
@section('section-title', 'QR Code for Menu')
@section('content')
<div class="container text-center mt-5">
    <h3>Scan the QR Code to view the menu</h3>
    <p>This QR Code redirects to the list of dishes.</p>
    <div class="mt-4">
        <!-- Mostrar el QR generado -->
        {!! $qr !!}
    </div>
    <div class="mt-3">
        <a href="{{ route('user.dishes') }}" class="btn btn-primary">Go to Menu</a>
    </div>
</div>
@stop
