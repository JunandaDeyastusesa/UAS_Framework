@extends('layoutDash.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid mt-4">
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
                        <h2 class="card-title">{{ $title }}</h2>
                    </div>

                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                            <div class="form-group col-sm-4">
                                <label for="exampleInputFile">Foto Siswa</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="foto_siswa" type="file" id="inputFoto" accept="image/*"
                                            class="form-control @error('foto_siswa') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img id="previewFoto"
                                        src="{{ $errors->any() ? old('foto_siswa') : asset('storage/siswa/' . $siswa->foto_siswa) }}"
                                        alt="Foto Siswa" style="max-width: 170px; max-height: 170px;">
                                </div>
                                @error('foto_siswa')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-4">
                                <div class="">
                                    <label for="nis">NIS</label>
                                    <input type="number" name="NIS"
                                        class="form-control @error('NIS') is-invalid @enderror" id="nis"
                                        value="{{ $errors->any() ? old('NIS') : $siswa->NIS }}"
                                        placeholder="Masukkan NIS..." readonly>
                                    @error('NIS')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="my-3">
                                    <label for="nisn">NISN</label>
                                    <input type="number" name="NISN"
                                        class="form-control @error('NISN') is-invalid @enderror" id="nisn"
                                        value="{{ $errors->any() ? old('NISN') : $siswa->NISN }}"
                                        placeholder="Masukkan NISN..." readonly>
                                    @error('NISN')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                        value="{{ $errors->any() ? old('tanggal_lahir') : $siswa->tanggal_lahir }}"
                                        placeholder="Masukkan Tanggal Lahir...">
                                    @error('tanggal_lahir')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <div class="">
                                    <label for="nama_siswa">Nama Lengkap</label>
                                    <input type="text" name="nama_siswa"
                                        class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa"
                                        value="{{ $errors->any() ? old('nama_siswa') : $siswa->nama_siswa }}"
                                        placeholder="Masukkan nama siswa...">
                                    @error('nama_siswa')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin">
                                        <option value="laki"
                                            {{ (old('jenis_kelamin') ?? $siswa->jenis_kelamin) == 'laki' ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="perempuan"
                                            {{ (old('jenis_kelamin') ?? $siswa->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="wali_siswa">Ortu / Wali Siswa</label>
                                    <input type="text" name="wali_siswa"
                                        class="form-control @error('wali_siswa') is-invalid @enderror" id="wali_siswa"
                                        value="{{ $errors->any() ? old('wali_siswa') : $siswa->wali_siswa }}"
                                        placeholder="Masukkan Wali Siswa...">
                                    @error('wali_siswa')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="agama">Agama</label>
                                <input type="text" name="agama"
                                    class="form-control @error('agama') is-invalid @enderror" id="agama"
                                    value="{{ $errors->any() ? old('agama') : $siswa->agama }}"
                                    placeholder="Masukkan Agama...">
                                @error('agama')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="tempat">Tempat</label>
                                <input type="text" name="tempat"
                                    class="form-control @error('tempat') is-invalid @enderror" id="tempat"
                                    value="{{ $errors->any() ? old('tempat') : $siswa->tempat }}"
                                    placeholder="Masukkan Tempat Tinggal...">
                                @error('tempat')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="anak_ke">Anak Ke</label>
                                <input type="number" name="anak_ke"
                                    class="form-control @error('anak_ke') is-invalid @enderror" id="anak_ke"
                                    value="{{ $errors->any() ? old('anak_ke') : $siswa->anak_ke }}"
                                    placeholder="Masukkan Anak Ke...">
                                @error('anak_ke')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="kelas">Kelas</label>
                                <select name="kelas_id"
                                    class="custom-select form-control @error('kelas_id') is-invalid @enderror"
                                    id="kelas">
                                    @foreach ($kelas as $class)
                                        <option value="{{ $class->id }}"
                                            {{ (old('kelas_id') ?? $siswa->kelas_id) == $class->id ? 'selected' : '' }}>
                                            {{ $class->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="semester">Semester</label>
                                <select name="semester" class="form-control @error('semester') is-invalid @enderror"
                                    id="semester">
                                    <option value="Semester 1"
                                        {{ (old('semester') ?? $siswa->semester) == 'Semester 1' ? 'selected' : '' }}>
                                        Semester 1</option>
                                    <option value="Semester 2"
                                        {{ (old('semester') ?? $siswa->semester) == 'Semester 2' ? 'selected' : '' }}>
                                        Semester 2</option>
                                </select>
                                @error('semester')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right">Submit</button>
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="window.history.back();">Kembali</button>
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
