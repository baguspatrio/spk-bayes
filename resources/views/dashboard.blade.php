@extends('template.main')
@section('konten')
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Data Training</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $training }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Data Uji</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-check fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pengajuan Layak</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $layak }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pengajuan Tidak Layak</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $macet }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Invoice Example -->
            <div class="col-xl-6 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pengajuan Layak</h6>
                  {{-- <a class="m-0 float-right btn btn-danger btn-sm" href="#">View More <i
                      class="fas fa-chevron-right"></i></a> --}}
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-hover p-2" >
                    <thead class="thead-light">
                      <tr>
                        <th>Nama</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Nama</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Status</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     @foreach ($datatesting as $key)
                      <tr>
                        <td>{{ $key->nama}}</td>
                        <td>{{ $key->jumlahPengajuan }}</td>
                        <td>
                          @if ($key->prediksi=='Lancar')
                          <span class="badge badge-success">{{ $key->prediksi }}</span>
                          @endif
                          @if ($key->prediksi=='Tidak Lancar')
                          <span class="badge badge-danger">{{ $key->prediksi }}</span>
                          @endif
                        </td>
                        
                      </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
             <!-- Invoice Example -->
            <div class="col-xl-6 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan</h6>
                  {{-- <a class="m-0 float-right btn btn-danger btn-sm" href="#">View More <i
                      class="fas fa-chevron-right"></i></a> --}}
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-hover p-2" >
                    <thead class="thead-light">
                      <tr>
                        <th>Nama</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Nama</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Status</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     @foreach ($uji as $key)
                      <tr>
                        <td>{{ $key->nama}}</td>
                        <td>{{ $key->jumlahPengajuan }}</td>
                        <td>@if ($key->keterangan=='Lancar')
                          <span class="badge badge-success">{{ $key->keterangan }}</span>
                          @endif
                          @if ($key->keterangan=='Tidak Lancar')
                          <span class="badge badge-danger">{{ $key->keterangan }}</span>
                          @endif
                        </td>
                        
                      </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          
@endsection