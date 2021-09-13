@extends('admin.layouts.main')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-inbox bg-blue"></i>
                            <div class="d-inline">
                                <h5>Dentists</h5>
                                <span>Dentists information</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="../index.html"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Dentists</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dentists </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Data Table</h3>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="nosort">Avatar</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>phone_number</th>
                                        <th>department</th>
                                        <th class="nosort">&nbsp;</th>
                                        <th class="nosort">&nbsp;</th>
                                        {{-- <th></th> --}}

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($dentists) > 0)
                                        @foreach ($dentists as $user)

                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td><img src="{{ asset('images') }}/{{ $user->image }}"
                                                        class="table-user-thumb" alt=""></td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->address }}<i class="ik ik-eye table-actions "></i> </td>
                                                <th>{{ $user->phone_number }}</th>
                                                <th>{{ $user->department }}</th>
                                                <td>
                                                    <div class="table-actions">

                                                        <a href="#" data-toggle="modal"
                                                            data-target="#exampleModal{{ $user->id }}">
                                                            <i class="ik ik-eye"></i>
                                                        </a>

                                                        <a href="{{route('dentist.edit', [$user->id])}}"><i class="ik ik-edit-2"></i></a>
                                                        <a href="#"><i class="ik ik-trash-2"></i></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    X
                                                </td>
                                            </tr>

                                            {{-- View Modal --}}
                                            @include('admin.dentist.modal');
                                        @endforeach

                                    @else
                                        <td>No Users To Display</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
