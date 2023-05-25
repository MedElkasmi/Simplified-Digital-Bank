@extends('admin.master')
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="clearfix">
                    <div class="card card-bx profile-card author-profile m-b30">
                        <div class="card-body">
                            <div class="p-5">
                                <div class="author-profile">
                                    <div class="author-media">
                                        <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="Profile Image">

                                        <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </div>
                                    <div class="author-info">
                                        <h6 class="title">{{$user->name}}</h6>
                                        <span>{{$user->email}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group mb-3">
                                <div class="form-control rounded text-center bg-white">Update Profile Photo</div>
                            </div>
                            <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="file" name="profile_image" class="form-control">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card profile-card card-bx m-b30">
                    <div class="card-header">
                        <h6 class="title">Update Information</h6>
                    </div>
                    <form method="POST" action="{{ route('profile.update') }}"class="profile-form">
                        @csrf
                        @method('patch')

                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>

                    <div class="card-header">
                        <h6 class="title">Update Password</h6>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}"class="profile-form">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" name="current_password" class="form-control">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Retype Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                            <a href="page-register.html" class="btn-link">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection