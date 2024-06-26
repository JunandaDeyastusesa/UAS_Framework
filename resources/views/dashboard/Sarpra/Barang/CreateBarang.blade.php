@extends('layoutDash.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Nav Page -->
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('showLantai', $lantai) }}">Barang</a></li>
                            <li class="breadcrumb-item active">Tambah Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong> mohon periksa kembali
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif

                <!-- General Form Input Start -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form {{ $title }}</h3>
                    </div>

                    <!-- Form Start -->
                    <form id="barangForm" action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">
                            <!-- Input Start -->
                            <div class="form-group col-sm-6">
                                <label for="nama">Nama Barang</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Barang..." value="{{ old('nama') }}" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="ruangan_id">Ruangan</label>
                                <select name="ruangan_id" class="form-control" id="ruangan_id" required>
                                    @foreach($ruangan as $ruangans)
                                        <option value="{{ $ruangans->id }}" {{ old('ruangan_id') == $ruangans->id ? 'selected' : '' }}>{{ $ruangans->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="barang_baik">Jumlah Barang Baik</label>
                                <input type="number" name="barang_baik" class="form-control" id="barang_baik" placeholder="Masukkan Jumlah Barang Normal..." value="{{ old('barang_baik') }}" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="barang_rusak">Jumlah Barang Rusak</label>
                                <input type="number" name="barang_rusak" class="form-control" id="barang_rusak" placeholder="Masukkan Jumlah Barang Rusak..." value="{{ old('barang_rusak') }}" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi...">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                        <!-- Input End -->

                        <!-- Button Start -->
                        <div class="card-footer">
                            <a href="{{ route('showLantai', $lantai) }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div> <!-- Button End -->
                    </form> <!-- End Form -->
                </div> <!-- General Form Input End -->
            </div> <!-- Container End -->
        </section> <!-- /.content -->
    </div>
@endsection
