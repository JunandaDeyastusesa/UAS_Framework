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
                    <div class="card-header">
                        <a href="{{ route('kelas.create') }}" class="btn btn-primary"><i class="mr-2 fas fa-user-plus"></i>
                            Tambah Data</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table3rd" class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-left">Kelas</th>
                                    <th class="text-left">Jumlah Murid</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $class)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $class->nama_kelas }}</td>
                                        <td class="text-left">{{ $class->siswa_count }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('kelas.destroy', $class->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('kelas.show', $class->id) }}"
                                                    class="btn btn-sm btn-info"><i class="fas fa-person"></i>Lihat Murid</a>
                                                <a href="{{ route('kelas.edit', $class->id) }}"
                                                    class="btn btn-sm btn-outline-warning"> <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-delete"> <i
                                                        class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                            {{-- <a href="{{route('kelas.destroy',$class->id)}}" class="btn btn-sm btn-danger">Hapus</a> --}}
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
        <!-- /.content -->
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
    </div>
@endsection
