@extends('layoutDash.main');

@section('content')
    ;
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

                {{-- table --}}
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('guru.create') }}" class="btn btn-primary"><i class="mr-2 fas fa-user-plus"></i>
                            Tambah Data</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table3rd" class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-left">Kode Guru</th>
                                    <th class="text-left">Nama Guru</th>
                                    <th class="text-left">Jenis Kelamin</th>
                                    <th class="text-left">No Telepon</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $g)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-left">{{ $g->id_guru }}</td>
                                        <td>{{ $g->nama_guru }}</td>
                                        <td>{{ $g->jenis_kelamin }}</td>
                                        <td class="text-left">{{ $g->no_telp }} </td>
                                        <td class="text-center">
                                            <form action="{{ route('guru.destroy', $g->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-outline-warning"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('guru.show', $g->id) }}" class="btn btn-outline-info"><i
                                                        class="fas fa-user"></i></a>
                                                <button type="submit" class="btn btn-outline-danger btn-delete"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        @push('scripts')
            <script type="module">
                $(document).ready(function() {
                    $(".datatable").on("click", ".btn-delete", function(e) {
                        e.preventDefault();

                        var form = $(this).closest("form");

                        Swal.fire({
                            title: "Kamu Yakin Mau Hapus Data ?",
                            text: "Anda tidak akan bisa kembalikan data ini lagi",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "bg-primary",
                            confirmButtonText: "Ya, Saya Yakin",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            </script>

            <script type="module">
                $(document).ready(function() {
                    $('#table3rd').DataTable();
                });
            </script>
        @endpush
        <!-- /.content -->
    </div>
@endsection
