@extends('theme.admin.main')
@section('title', 'agenda')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
               
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Form</h6>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('admin.agenda.update', $agenda->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul"
                                    id="judul" value="{{ $agenda->judul }}">
                            </div>
                            @error('judul')
                                <span class="alert alert-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                            <div class="row">
                                <div class="col-lg-8">
                                    <textarea type="textarea" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                        placeholder="Masukkan deskripsi" id="deskripsi" value="{{ $agenda->deskripsi }} "></textarea>
                                </div>
                            </div>
                            @error('deskripsi')
                                <span class="alert alert-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                            <button type="submit" class="btn btn-primary me-2">Ubah</button>
                            <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
