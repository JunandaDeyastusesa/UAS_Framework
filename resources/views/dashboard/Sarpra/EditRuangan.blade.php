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
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Nav Page -->
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('showLantai', $lantai) }}">Ruangan</a></li>
                            <li class="breadcrumb-item active">Edit Ruangan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong> Mohon periksa kembali...
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif

                <!-- General Form Input Start-->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form {{$title}}</h3>
                    </div>

                    <!-- Form Start -->
                    <form id="ruanganForm" action="{{route('ruangan.update', $ruangan->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                            <!-- Input Start -->
                            <div class="form-group col-sm-6">
                                <label for="nama">Nama Ruangan:</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $ruangan->nama) }}" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="lantai">Lantai:</label>
                                <select id="lantai" name="lantai" class="form-control" required>
                                    <option value="Lantai 1" {{ old('lantai', $ruangan->lantai) == 'Lantai 1' ? 'selected' : '' }}>Lantai 1</option>
                                    <option value="Lantai 2" {{ old('lantai', $ruangan->lantai) == 'Lantai 2' ? 'selected' : '' }}>Lantai 2</option>
                                    <option value="Lantai 3" {{ old('lantai', $ruangan->lantai) == 'Lantai 3' ? 'selected' : '' }}>Lantai 3</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi...">{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>
                            </div>
                        </div> <!-- Input End -->

                        <!-- Button Start-->
                        <div class="card-footer">
                            <a href="{{ route('showLantai', $lantai) }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                        <!-- Button End -->
                    </form> <!-- End Form -->
                </div> <!-- General Form Input End -->
            </div> <!-- Container End -->


        </section> <!-- /.content -->
    </div>
@endsection
