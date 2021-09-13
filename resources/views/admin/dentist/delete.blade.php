@extends('admin.layouts.main')

@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-command bg-blue"></i>
                            <div class="d-inline">
                                <h5>Dentists</h5>
                                <span>Delete Dentist</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="../index.html"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Dentist</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Delete</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @if (Session::has('message'))
                        <div class="alert bg-success alert-success text-white" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3>Confirm Deletion</h3>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('images') }}/{{ $user->image }}" alt="User Avatar" width="120">
                            <h2>{{ $user->name }}</h2>
                            <form class="forms-sample" action="{{ route('dentist.destroy', [$user->id]) }}"
                                method="post" enctype="multipart/form-data">@csrf
                                @method('DELETE')

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger mr-2">Confirm</button>
                                    <a href="{{ route('dentist.index') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
