@extends('layoutDash.main');

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
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
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>



                    <!-- /.card-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body row ">

                            {{-- grup-1 --}}
                            <div class="col-md-6 row ">
                                <div class="col-md-12">
                                    <div class="text-center alert alert-secondary" role="alert">
                                        Data diri
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Kode Guru</label>
                                    <input type="number" value="{{ $guru->id_guru }}" name="id_guru" class="form-control"
                                        id="exampleInputEmail1" placeholder="Masukkan Kode Guru..." readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Nama Guru</label>
                                    <input type="text" value="{{ $guru->nama_guru }}" name="nama_guru"
                                        class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama..."
                                        readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                                    <input type="text" value="{{ $guru->tgl_lahir }}" name="tgl_lahir"
                                        class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukkan Data Tanggal Lahir..." readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">No Telepon</label>
                                    <input type="number" value="{{ $guru->no_telp }}" name="no_telp" class="form-control"
                                        id="exampleInputEmail1" placeholder="Masukkan No Telepon..." readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Agama</label>
                                    <input type="text" value="{{ $guru->agama }}" name="nama_guru" class="form-control"
                                        id="exampleInputEmail1" placeholder="Masukkan Nama..." readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                                    <input type="text" value="{{ $guru->jenis_kelamin }}" name="nama_guru"
                                        class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama..."
                                        readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Foto</label>
                                    <div class="input-group">
                                    </div>
                                    <div id="previewContainer">
                                        <img id="previewFoto" src="{{ Storage::url('guru/' . $guru->foto) }}"
                                            alt="Preview Foto" style="max-width: 200px; max-height: 150px;">
                                    </div>
                                </div>

                            </div>
                            {{-- end grup 1 --}}

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="text-center alert alert-info" role="alert">
                                        Jabatan & Tugas
                                    </div>
                                </div>

                                <div class="row px-2">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Jabatan</label>
                                        <input type="text" value="{{ $guru->jabatan }}" name="nama_guru"
                                            class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama..."
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary float-right">Kembali</a>
                        </div>
                    </form>
                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        const inputFoto = document.getElementById('inputFoto');
        const previewFoto = document.getElementById('previewFoto');

        inputFoto.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    previewFoto.src = reader.result;
                });

                reader.readAsDataURL(file);
            } else {
                previewFoto.src = ""; // Reset gambar
                previewFoto.style.display = 'none'; // Sembunyikan gambar
            }
        });
    </script>
@endsection
