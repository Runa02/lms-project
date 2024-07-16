@extends('components.index')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update.jabatan', $data->id) }}" method="POST">
                @csrf

                <div class="col-lg-12">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ $data->jabatan }}">
                </div>

                <div class="button mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('jabatan') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
