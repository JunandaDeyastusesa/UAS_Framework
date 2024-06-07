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
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong> mohon periksa kembali
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif --}}
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">
                            {{-- grup-1 --}}
                            <div class="col-md-6 row">
                                <div class="col-md-12">
                                    <div class="text-center alert alert-secondary" role="alert">
                                        Data Diri
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id_guru">Kode Guru</label>
                                    <input type="number" name="id_guru" class="form-control @error('id_guru') is-invalid @enderror" id="id_guru"
                                        value="{{ old('id_guru') }}" placeholder="Masukkan Kode Guru...">
                                    @error('id_guru')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_guru">Nama Guru</label>
                                    <input type="text" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru"
                                        value="{{ old('nama_guru') }}" placeholder="Masukkan Nama...">
                                    @error('nama_guru')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                        value="{{ old('tgl_lahir') }}" placeholder="Masukkan Data Tanggal Lahir...">
                                    @error('tgl_lahir')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_telp">No Telepon</label>
                                    <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                        value="{{ old('no_telp') }}" placeholder="Masukkan No Telepon...">
                                    @error('no_telp')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="custom-select form-control @error('agama') is-invalid @enderror" id="agama">
                                        <option readonly selected>Masukkan Data Agama...</option>
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Khongucu" {{ old('agama') == 'Khongucu' ? 'selected' : '' }}>Khongucu</option>
                                    </select>
                                    @error('agama')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="custom-select form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin">
                                        <option readonly selected>Pilih Jenis Kelamin...</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki laki' ? 'selected' : '' }}>Laki laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="foto">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="foto" type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" accept="image/*">
                                        </div>
                                    </div>
                                    @error('foto')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                    <div id="previewContainer">
                                        <img id="previewFoto" src="#" alt="Preview Foto" style="max-width: 200px; max-height: 150px;">
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
                                        <label for="jabatan">Jabatan</label>
                                        <select name="jabatan" class="custom-select form-control @error('jabatan') is-invalid @enderror" id="jabatan">
                                            <option readonly selected>Masukkan Jabatan / peran...</option>
                                            <option value="Kepala Sekolah" {{ old('jabatan') == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                            <option value="Guru Pelajaran" {{ old('jabatan') == 'Guru Pelajaran' ? 'selected' : '' }}>Guru Pelajaran</option>
                                            <option value="Guru Wali Kelas" {{ old('jabatan') == 'Guru Wali Kelas' ? 'selected' : '' }}>Guru Wali Kelas</option>
                                            <option value="Admin Tata Usaha" {{ old('jabatan') == 'Admin Tata Usaha' ? 'selected' : '' }}>Admin Tata Usaha</option>
                                        </select>
                                        @error('jabatan')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kelas_id">Wali Kelas</label>
                                        <select name="kelas_id" class="custom-select form-control @error('kelas_id') is-invalid @enderror" id="kelas_id">
                                            <option value="" disabled selected>Masukkan kelas...</option>
                                            @foreach ($kelas as $class)
                                                @if ($class->angka_kelas < 7)
                                                    <option value="{{ $class->id }}" {{ old('kelas_id') == $class->id ? 'selected' : '' }}>
                                                        {{ $class->angka_kelas }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            <option value="8">Tidak Memiliki Kelas</option>
                                        </select>
                                        @error('kelas_id')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary float-right">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>


    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    <script>
        const inputFoto = document.getElementById('foto');
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
