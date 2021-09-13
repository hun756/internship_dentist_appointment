@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid"
                    style="border:1px solid #ccc;">

            </div>
            <div class="col-sm-6">
                <h2>Create an account & Book your appointment</h2>
                <p> This site is not intended for you to easily make an appointment with your dentist. By becoming a member
                    of our system, you can choose your dentist, arrange and arrange your appointment and save your time.
                    Start looking for a dentist right for you. </p>
                <div class="mt-5">
                    <a href="{{ url('/register') }}">
                        <button class="btn btn-success">Register as Patient</button>
                    </a>

                    <a href="{{ url('/login') }}">
                        <button class="btn btn-secondary">Login</button>
                    </a>
                </div>
            </div>

        </div>
        <hr>
        <section class="">
        <div class=" card">
            <div class="card-header">Find Doctors</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control " id="datepicker" name="date">
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-primary">Find doctors</button>
                    </div>

                </div>
            </div>

    </div>

    <div class="card mt-1">
        <div class="card-header"> Doctors available today</div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dentists as $dentist)
                        <tr>
                            <th scope="row">1</th>
                            <td><img src="{{ asset('images') }}/{{ $dentist->dentist['image'] }}" width="80" style="border-radius: 50%;">
                            </td>
                            <td>{{ $dentist->dentist['name'] }}</td>
                            <td>{{ $dentist->dentist['department'] }}</td>
                            <td>
                                <button class="btn btn-success">Book Appointment</button>
                            </td>
                        </tr>
                    @empty
                        <td>
                            No Dentists Available.
                        </td>
                    @endforelse
                </tbody>
            </table>


        </div>

    </div>
    </div>
    </section>
    </div>


@endsection
