@extends('components.index')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('store.siswa') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="col-lg-12">
                    <label for="image">Foto</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nis">Nis</label>
                        <input type="text" class="form-control" name="nis" id="nis">
                    </div>
                    <div class="col-lg-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="col-lg-4">
                        <label for="kelas">Kelas</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>

                <div class="button mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('siswa') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
