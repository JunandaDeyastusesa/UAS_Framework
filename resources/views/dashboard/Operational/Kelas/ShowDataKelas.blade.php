@extends('layoutDash.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a type="button" class=""
                            onclick="window.history.back();">Kembali</a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            {{-- <li class="breadcrumb-item active">{{ $title }}</li> --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                @if (session('Success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('Success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- table --}}
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    {{-- <th>Semester</th> --}}
                                    <th>Ortu / Wali Siswa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas->siswa as $guru)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $guru->NISN }}</td>
                                        <td>{{ $guru->nama_siswa }}</td>
                                        <td>{{ $guru->tanggal_lahir }}</td>
                                        <td>{{ $guru->jenis_kelamin }}</td>
                                        {{-- <td>{{ $guru->semester }}</td> --}}
                                        <td>{{ $guru->wali_siswa }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('siswa.destroy', $guru->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#showModal{{ $guru->id }}">
                                                    <i class="fas fa-user"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade m-0" data-keyboard="false" data-backdrop="static"
                                        id="showModal{{ $guru->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="showModalLabel{{ $guru->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="showModalLabel{{ $guru->id }}">Detail
                                                        Siswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="{{ route('siswa.update', $guru->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body p-0">
                                                        <div class="card-body row p-4">
                                                            <div class="form-group col-sm-4">
                                                                <img id="previewFoto{{ $guru->id }}"
                                                                    src="{{ asset('storage/siswa/' . $guru->foto_siswa) }}"
                                                                    alt="Foto Siswa"
                                                                    style="max-width: 170px; max-height: 170px;">
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nisn{{ $guru->id }}">NIK</label>
                                                                    <p>{{ $guru->NIK }}</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nisn{{ $guru->id }}">NO. KK (Kartu
                                                                        Keluarga)</label>
                                                                    <p>{{ $guru->NO_KK }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nisn{{ $guru->id }}">NIS</label>
                                                                    <p>{{ $guru->NIS }}</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nisn{{ $guru->id }}">NISN</label>
                                                                    <p>{{ $guru->NISN }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="nama_siswa{{ $guru->id }}">Nama
                                                                    Lengkap</label>
                                                                <p>{{ $guru->nama_siswa }}</p>
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="tanggal_lahir{{ $guru->id }}">Tanggal
                                                                    Lahir</label>
                                                                <p>{{ $guru->tanggal_lahir }}</p>
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="jenis_kelamin{{ $guru->id }}">Jenis
                                                                    Kelamin</label>
                                                                <p>{{ $guru->jenis_kelamin }}</p>
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="wali_siswa{{ $guru->id }}">Orang Tua /
                                                                    Wali</label>
                                                                <p>{{ $guru->wali_siswa }}</p>
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="jenis_kelamin{{ $guru->id }}">Agama</label>
                                                                <p>{{ $guru->agama }}</p>
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label
                                                                    for="jenis_kelamin{{ $guru->id }}">Tempat</label>
                                                                <p>{{ $guru->tempat }}</p>
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="jenis_kelamin{{ $guru->id }}">Anak Ke
                                                                </label>
                                                                <p>{{ $guru->anak_ke }}</p>
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="wali_siswa{{ $guru->id }}">Kelas</label>
                                                                <p>{{ $guru->nama_kelas }}</p>
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label for="wali_siswa{{ $guru->id }}">Semester</label>
                                                                <p>{{ $guru->semester }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        const inputFoto{{ $guru->id }} = document.getElementById('foto_siswa{{ $guru->id }}');
                                        const previewFoto{{ $guru->id }} = document.getElementById('previewFoto{{ $guru->id }}');

                                        inputFoto{{ $guru->id }}.addEventListener('change', function() {
                                            const file = this.files[0];

                                            if (file) {
                                                const reader = new FileReader();

                                                reader.addEventListener('load', function() {
                                                    previewFoto{{ $guru->id }}.src = reader.result;
                                                });

                                                reader.readAsDataURL(file);
                                            } else {
                                                previewFoto{{ $guru->id }}.src = ""; // Reset gambar
                                                previewFoto{{ $guru->id }}.style.display = 'none'; // Sembunyikan gambar
                                            }
                                        });
                                    </script>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var selectAllCheckbox = document.getElementById('selectAll');
                                            var selectElement = document.getElementById('siswas');

                                            selectAllCheckbox.addEventListener('change', function() {
                                                var isSelected = selectAllCheckbox.checked;
                                                for (var i = 0; i < selectElement.options.length; i++) {
                                                    selectElement.options[i].selected = isSelected;
                                                }
                                            });
                                        });
                                    </script>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
