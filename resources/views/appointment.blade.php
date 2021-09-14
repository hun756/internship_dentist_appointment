@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="teset-center">Dentist Information</h4>
                        <img src="{{ asset('images') }}/{{ $user->image }}" alt="User Avatar" width="100px"
                            style="border-radius: 50%;">
                        <br>
                        <p>Name : {{ $user->name }}</p>
                        <p>Expertise : {{ $user->status }}</p>
                        <p>Specialist : {{ $user->department }}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if (Session::has('errmessage'))
                    <div class="alert alert-danger">
                        {{ Session::get('errmessage') }}
                    </div>
                @endif
                <form action="{{ route('booking.appointment') }}" method="post">@csrf

                    <div class="card">
                        <div class="card-header">{{ $date }}</div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($times as $time)
                                    <div class="col-md-3">
                                        <label class="btn btn-outline-primary">
                                            <input type="radio" name="time" value="{{ $time->time }}">
                                            <span>{{ $time->time }}</span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="dentistId" value="{{ $dentist_id }}">
                                    <input type="hidden" name="appointmentId" value="{{ $time->appointment_id }}">
                                    <input type="hidden" name="date" value="{{ $date }}">
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            @if (Auth::check())
                                <button type="submit" class="btn btn-success" style="width:100%;">Book Appointment</button>
                            @else
                                <p>Please Login to make appointment.!</p>
                                <a href="/register">Register</a>
                                <a href="/login">Login</a>
                            @endif
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
