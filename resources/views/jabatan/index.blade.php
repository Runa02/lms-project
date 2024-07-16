@extends('components.index')

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('create.jabatan') }}" class="btn btn-primary mb-3 mt-3">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editJabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="editJabatan" name="jabatan"
                                value="{{ old('jabatan') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
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
                ajax: "{{ route('datajabatan') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        data: 'id',
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
                                <button class="btn btn-primary edit-btn" data-id="${data}">Edit</button>
                                <button class="btn btn-danger delete-btn" data-id="${data}">Delete</button>
                            `;
                        }
                    },
                ]
            });

            // tombol edit
            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                $.get('/apps/jabatan/edit/' + id, function(data) {
                    $('#editId').val(data.id);
                    $('#editJabatan').val(data.jabatan);
                    $('#editModal').modal('show');
                });
            });

            // update funtion
            $('#editForm').submit(function(e) {
                e.preventDefault();
                var id = $('#editId').val();
                $.ajax({
                    url: '/apps/jabatan/update/' + id,
                    method: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#editModal').modal('hide');
                        table.ajax.reload(null, false); // false to keep pagination
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            //Delete function
            $(document).on('click', '.delete-btn', function() {
                if (confirm('Are you sure you want to delete this item?')) {
                    var id = $(this).data('id');
                    $.ajax({
                        url: '/apps/jabatan/delete/' + id,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            table.ajax.reload(null, false); // false to keep pagination
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
