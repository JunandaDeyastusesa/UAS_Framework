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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$siswaAll}}</h3>

                <p>Jumlah Seluruh Siswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('/siswa') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$kelasAll}}</h3>

                <p>Jumlah Kelas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('/kelas') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$sarana}}</h3>

                <p>Jumlah Peralatan Sarana Prasarana</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('/ruangan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$Guru}}</h3>
                <p>Total Guru</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('/guru') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row justify-content-center">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-users mr-1"></i>
                  5 Siswa Terbaru
                </h3>                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->

                  <!-- /.card-header -->
                    <div class="card-body">
                        <table id="siswaTable" class="datatable table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="text-left">NISN</th>
                                    <th class="text-left">Nama</th>
                                    <th class="text-left">Tanggal Lahir</th>
                                    <th class="text-left">Jenis Kelamin</th>
                                    {{-- <th>Semester</th> --}}
                                    <th class="text-left">Ortu / Wali Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $guru)
                                    <tr class="text-left">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-left">{{ $guru->NISN }}</td>
                                        <td class="text-left">{{ $guru->nama_siswa }}</td>
                                        <td class="text-left">{{ $guru->tanggal_lahir }}</td>
                                        <td>{{ $guru->jenis_kelamin }}</td>

                                        {{-- <td>{{ $guru->semester }}</td> --}}
                                        <td>{{ $guru->wali_siswa }}</td>
                                    </tr>
                                    <!-- Show Detail Modal -->
                                    <div class="modal fade m-0" data-keyboard="false" data-backdrop="static"
                                        id="showModal{{ $guru->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="showModalLabel{{ $guru->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
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
                                                                    <label for="nisn{{ $guru->id }}">NIS</label>
                                                                    <p>{{ $guru->NIS }}</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nisn{{ $guru->id }}">NISN</label>
                                                                    <p>{{ $guru->NISN }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nama_siswa{{ $guru->id }}">Nama Lengkap</label>
                                                                    <p>{{ $guru->nama_siswa }}</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tanggal_lahir{{ $guru->id }}">Tanggal Lahir</label>
                                                                    <p>{{ $guru->tanggal_lahir }}</p>
                                                                </div>
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
                                                                <label
                                                                    for="jenis_kelamin{{ $guru->id }}">Agama</label>
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
                                                                <label
                                                                    for="wali_siswa{{ $guru->id }}">Semester</label>
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

                  {{-- <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div> --}}
                </div>
              </div><!-- /.card-body -->
            </div>

          </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection

