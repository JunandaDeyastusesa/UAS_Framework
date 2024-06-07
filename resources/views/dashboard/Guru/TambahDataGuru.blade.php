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
                    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                    <input type="number" name="id_guru" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukkan Kode Guru...">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Nama Guru</label>
                                    <input type="text" name="nama_guru" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukkan Nama...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukkan Data Tanggal Lahir...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">No Telepon</label>
                                    <input type="number" name="no_telp" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukkan No Telepon...">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleSelectBorder">Agama</label>
                                    <select name="agama" class="custom-select form-control" id="exampleSelectBorder">
                                        <option readonly selected>Masukkan Data Agama...</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Khongucu">Khongucu</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleSelectBorder">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="custom-select form-control"
                                        id="exampleSelectBorder">
                                        <option readonly selected>Pilih Jenis Kelamin...</option>
                                        <option value="Laki laki">laki laki</option>
                                        <option value="Perempuan">perempuan</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="foto" type="file" id="inputFoto" accept="image/*">
                                        </div>
                                    </div>
                                    <div id="previewContainer">
                                        <img id="previewFoto" src="#" alt="Preview Foto"
                                            style="max-width: 200px; max-height: 150px;">
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
                                        <label for="exampleSelectBorder">Jabatan</label>
                                        <select name="jabatan" class="custom-select form-control" id="exampleSelectBorder">
                                            <option readonly selected>Masukkan Jabatan / peran...</option>
                                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                                            <option value="Guru Pelajaran">Guru Pelajaran</option>
                                            <option value="Guru Wali Kelas">Guru wali kelas</option>
                                            <option value="Admin Tata Usaha">Admin Tata Usaha</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleSelectBorder">Wali Kelas</label>
                                        <select name="kelas_id" class="custom-select form-control"
                                            id="exampleSelectBorder">
                                            <option value="" disabled selected>Masukkan kelas...</option>
                                            @foreach ($kelas as $class)
                                                @if ($class->angka_kelas < 7)
                                                    <option value="{{ $class->nama_kelas }}">{{ $class->angka_kelas }}</option>
                                                @endif
                                            @endforeach
                                            <option value="8">Tidak Memiliki Kelas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="reset" class="btn btn-danger float-right">reset</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->

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