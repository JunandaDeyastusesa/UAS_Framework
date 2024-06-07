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

                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>


                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('kelas.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleSelectBorder">Angka Kelas</label>
                                    <select name="angka_kelas" class="custom-select form-control" id="exampleSelectBorder">
                                        <option selected> Silahkan pilih kelas... </option>
                                        <option value="1"> 1 </option>
                                        <option value="2"> 2 </option>
                                        <option value="3"> 3 </option>
                                        <option value="4"> 4 </option>
                                        <option value="5"> 5 </option>
                                        <option value="6"> 6 </option>
                                        <option value="7"> Lulus </option>
                                        <option value="8"> Tanpa Kelas </option>
                                    </select>
                                    @error('angka_kelas')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="tempat">Nama Kelas</label>
                                    <input type="text" name="nama_kelas"
                                        class="form-control @error('nama_kelas') is-invalid @enderror" id="tempat"
                                        placeholder="Masukkan Nama Kelas...">
                                    @error('nama_kelas')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <a href="{{ route('kelas.index') }}" class="btn btn-outline-secondary float-right">Kembali</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
