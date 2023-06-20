@extends('theme.admin.main')
@section('title', 'peminjaman')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">

            </ol>
        </nav>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header row">
                        <h6 class="card-title">Daftar Request Surat</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nomor HP</th>
                                        <th>Email</th>
                                        <th>Permintaan surat</th>
                                        <th>Tujuan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($request_surat as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->nomorhp }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>{{ $item->tujuan }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <div class="btn-group" role="group">

                                                    <form action="{{ route('admin.request_surat.tolak', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button style="background-color :red;" type="submit"
                                                            class="btn btn-warning">Tolak</button>
                                                    </form>
                                                    <form action="{{ route('admin.request_surat.terima', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button style="background-color :green;" type="submit"
                                                            class="btn btn-warning">Terima</button>
                                                    </form>
                                                    <form action="{{ route('admin.request_surat.upload', $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="file" name="file_path" id="file_path">
                                                        <button type="submit" class="btn btn-warning">Upload pdf</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script>
        $('#dataTableExample').DataTable({
            "aLengthMenu": [
                [10, 30, 50, -1],
                [10, 30, 50, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
                search: ""
            }
        });
    </script>
@endsection
