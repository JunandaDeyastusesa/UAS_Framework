@extends('layoutDash.main')

  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
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
              {{session('Success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
        {{-- table --}}
        <div class="card">
          <div class="card-header">
            <a href="{{ route('kelas.create') }}" class="btn btn-primary"><i class="mr-2 fas fa-user-plus"></i> Tambah Data</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                {{-- <th>No</th> --}}
                <th>Kelas</th>
                <th>Murid</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($kelas as $class)
                <tr>
                    {{-- <td>{{$loop->iteration}}</td> --}}
                    <td>{{ $nama_kelas[$class->angka_kelas] ?? 'Angka Kelas Tidak Valid' }}</td>
                    <td>
                      <a href="{{route('kelas.show',$class->id)}}" class="btn btn-sm btn-info"><i class="fas fa-person"></i>Lihat Murid</a>
                    </td>
                    <td>
                      <a href="{{route('kelas.edit',$class->id)}}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('kelas.destroy', $class->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>

                      {{-- <a href="{{route('kelas.destroy',$class->id)}}" class="btn btn-sm btn-danger">Hapus</a> --}}
                    </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                {{-- <th>No</th> --}}
                <th>Kelas</th>
                <th>Murid</th>
                <th>Action</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
