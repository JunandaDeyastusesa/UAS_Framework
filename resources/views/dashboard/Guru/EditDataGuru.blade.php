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

                    <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                            {{-- grup-1 --}}
                            <div class="col-md-6 row">
                                <div class="col-md-12">
                                    <div class="text-center alert alert-secondary" role="alert">
                                        Data diri
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Kode Guru</label>
                                    <input type="number" value="{{ $guru->id_guru }}" name="id_guru" class="form-control @error('id_guru') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan Kode Guru...">
                                    @error('id_guru')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Nama Guru</label>
                                    <input type="text" value="{{ $guru->nama_guru }}" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan Nama...">
                                    @error('nama_guru')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                                    <input type="date" value="{{ $guru->tgl_lahir }}" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan Data Tanggal Lahir...">
                                    @error('tgl_lahir')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">No Telepon</label>
                                    <input type="number" value="{{ $guru->no_telp }}" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan No Telepon...">
                                    @error('no_telp')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleSelectBorder">Agama</label>
                                    <select name="agama" class="custom-select form-control @error('agama') is-invalid @enderror">
                                        <option readonly>Masukkan Data Agama...</option>
                                        <option value="Islam" {{ $guru->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ $guru->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Hindu" {{ $guru->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Budha" {{ $guru->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Khongucu" {{ $guru->agama == 'Khongucu' ? 'selected' : '' }}>Khongucu</option>
                                    </select>
                                    @error('agama')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleSelectBorder">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="custom-select form-control @error('jenis_kelamin') is-invalid @enderror">
                                        <option readonly>Pilih Jenis Kelamin...</option>
                                        <option value="Laki-laki" {{ $guru->jenis_kelamin == 'Laki laki' ? 'selected' : '' }}>Laki laki</option>
                                        <option value="Perempuan" {{ $guru->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="foto" type="file" id="inputFoto" class="custom-file-input @error('foto') is-invalid @enderror" accept="image/*">
                                            <label class="custom-file-label" for="inputFoto">Choose file</label>
                                        </div>
                                    </div>
                                    @error('foto')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                    <div id="previewContainer">
                                        <img id="previewFoto" src="{{ Storage::url('guru/' . $guru->foto) }}" alt="Preview Foto" style="max-width: 200px; max-height: 150px;">
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
                                        <select name="jabatan" class="custom-select form-control @error('jabatan') is-invalid @enderror">
                                            <option readonly>Masukkan Jabatan / peran...</option>
                                            <option value="Kepala Sekolah" {{ $guru->jabatan == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                            <option value="Guru Pelajaran" {{ $guru->jabatan == 'Guru Pelajaran' ? 'selected' : '' }}>Guru Pelajaran</option>
                                            <option value="Guru Wali Kelas" {{ $guru->jabatan == 'Guru Wali Kelas' ? 'selected' : '' }}>Guru wali kelas</option>
                                            <option value="Admin Tata Usaha" {{ $guru->jabatan == 'Admin Tata Usaha' ? 'selected' : '' }}>Admin Tata Usaha</option>
                                        </select>
                                        @error('jabatan')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="kelas">Kelas</label>
                                        <select name="kelas_id" class="custom-select form-control" id="kelas">
                                            @foreach ($kelas as $class)
                                                <option value="{{ $class->nama_kelas }}" {{ $guru->kelas_id == $class->nama_kelas ? 'selected' : '' }}>
                                                    @if ($class->nama_kelas === 8)
                                                        Tidak ada Kelas
                                                    @else
                                                        {{ $class->nama_kelas }}
                                                    @endif
                                                </option>
                                            @endforeach
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
