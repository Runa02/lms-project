@extends('components.index')

@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        @if (Auth::user()->foto)
                            <img src="{{ asset('images/' . Auth::user()->foto) }}" alt="Profile" class="rounded-circle">
                        @else
                            <img src="{{ asset('images/default-profile.png') }}" alt="Profile" class="rounded-circle">
                        @endif
                        <h2>{{ Auth::user()->name }}</h2>
                        {{-- <h3>Web Designer</h3> --}}
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="foto" class="col-md-4 col-lg-3 col-form-label">Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="foto" type="file" class="form-control" id="foto">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nik" class="col-md-4 col-lg-3 col-form-label">Nik</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nik" type="text" class="form-control" id="nik"
                                                value="{{ $user->nik }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="username" type="text" class="form-control" id="username"
                                                value="{{ $user->username }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="ttd" class="col-md-4 col-lg-3 col-form-label">TTD</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="ttd" type="file" class="form-control" id="ttd">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
