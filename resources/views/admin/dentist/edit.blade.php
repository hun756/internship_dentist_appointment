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
                                <span>Update Dentist</span>
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
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                            <h3>Update Dentist</h3>
                        </div>
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('dentist.update', [$user['id']]) }}" method="post"
                                enctype="multipart/form-data">@csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Full name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Dentist Name" value="{{ $user->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter Your E-Mail" value="{{ $user->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Dentist Password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Gender</label>
                                        <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                            <option value="">Please Select Gender</option>
                                            @foreach (['male', 'female'] as $gender)
                                                <option value="{{ $gender }}" @if ($user->gender == $gender)selected @endif>
                                                    {{ $gender }}</option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Status</label>
                                        <input type="text" name="status"
                                            class="form-control @error('status') is-invalid @enderror"
                                            placeholder="Please Enter Your Highest Education"
                                            value="{{ $user->status }}">
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Address</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter Adress" value="{{ $user->address }}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Specialist</label>

                                            <select name="department" class="form-control">
                                                @foreach (['General', 'Pedodontist', 'Orthodontist', 'Periodontist', 'Endodontist', 'Oral Pathologist', 'Prosthodontist'] as $_department)
                                                    <option value="{{ $_department }}" @if ($user->department == $_department)selected @endif>
                                                        {{ $_department }}</option>
                                                @endforeach
                                                {{-- <input type="text" name="department"
                                                    class="form-control @error('Department') is-invalid @enderror"
                                                    placeholder="Dentist department" value="{{ old('department') }}"> --}}
                                            </select>


                                            @error('department')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone number</label>
                                            <input type="text" name="phone_number"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                value="{{ $user->phone_number }}">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file"
                                                class="form-control file-upload-info @error('image') is-invalid @enderror"
                                                placeholder="Upload Image" name="image">
                                            <span class="input-group-append">

                                            </span>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Role</label>
                                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                            <option value="">Please select role</option>
                                            @foreach (App\Role::where('name', '!=', 'patient')->get() as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleTextarea1">About</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="exampleTextarea1" rows="4" name="description">{{ $user->description }}

                                        </textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
