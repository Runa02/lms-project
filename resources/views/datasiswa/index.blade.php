@extends('components.index')

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('create.siswa') }}" class="btn btn-primary mb-3 mt-3">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datasiswa') }}",
                columns: [{
                        data: 'nis',
                        name: 'Nis'
                    },
                    {
                        data: 'name',
                        name: 'Name'
                    },
                    {
                        data: 'username',
                        name: 'Username'
                    },
                    {
                        data: 'kelas',
                        name: 'Kelas'
                    },
                    {
                        data: 'id',
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
                                <a href="/materi/${data}" class="btn btn-primary btn-sm">Materi</a>
                                `;
                        }
                    },
                ]
            })
        });
    </script>
@endsection
