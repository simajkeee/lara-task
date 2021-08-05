@extends('layouts.app')
@section('content')
@foreach($bookings as $booking)

    <h3>{{ $booking->auto_brand }}</h3>

    <ul>
        @foreach($booking->customer as $customer)
            <li> {{ $customer->name }}</li>
        @endforeach
    </ul>
@endforeach

@endsection
