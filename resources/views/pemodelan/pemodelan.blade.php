@extends('template.main')
@section('konten')
{{-- @include('dataasli.modal')
@include('datauji.modaltambahdata') --}}
{{-- @include('dataset.modaledit'); --}}
<!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tidak Layak Lancar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tidaklayaklancar }}</div>
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
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tidak Layak Tidak Lancar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tidaklayaktidaklancar }}</div>
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
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $layaklancar; }}</div>
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
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pengajuan Layak Tidak lancar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $layaktidaklancar; }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Data Training</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$perhitungan}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Akurasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{round( (($layaklancar+$tidaklayaktidaklancar)/$perhitungan)*100); }}%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Presisi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{round( ($layaklancar/($layaklancar+$tidaklayaklancar))*100); }}%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Recall</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{round( (($layaklancar/($layaklancar+$layaktidaklancar)))*100); }}%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                {{-- <div class="card-header py-3 d-flex flex-row align-items-center">
                  {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6> --}}
                  {{-- <button type="button" class="btn-success m-3" data-toggle="modal" data-target="#tambahdata"id="#myBtn">Tambah Data</button>
                  <button type="button" class="btn-info"data-toggle="modal" data-target="#importdata"id="#myBtn">Import Data</button> --}}
                  {{-- <a href="hapusduplikat" class=" btn btn-danger ml-3 ">Hapus Duplikat</a> --}}
                  {{-- <a href="/ujidataset" class=" btn btn-danger ml-3 ">Uji Data </a>
                  
                </div> --}} 
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Atribut</th>
                        <th>Value</th>
                        <th>Total lancar</th>
                        <th>Total Tidak Lancar</th>
                        <th>Probabilitas Lancar</th>
                        <th>Probabilitas Tidak lancar</th>
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Atribut</th>
                        <th>Value</th>
                        <th>Total lancar</th>
                        <th>Total Tidak Lancar</th>
                        <th>Probabilitas Lancar</th>
                        <th>Probabilitas Tidak lancarn</th>
                        
                      </tr>
                    </tfoot>
                    <tbody>
                     @foreach ($data as $key)
                      <tr>
                        <td>{{ $key->atribut}}</td>
                        <td>{{ $key->nilai }}</td>
                        <td>{{ $key->totalLancar}}</td>
                        <td>{{ $key->totalMacet}}</td>
                        <td>{{ $key->probLancar}}</td>
                        <td>{{ $key->probMacet}}</td>
                         {{-- <td> <button type="button" class="btn-primary m-3" data-toggle="modal" data-target="#edit{{ $key->id }}"id="#myBtn">Edit</button>
                          <form action="{{ url('dataasli/'.$key->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data ini?')" >
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger">Hapus</button>
                          </form>
                         </td> --}}
                      </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           
@endsection
