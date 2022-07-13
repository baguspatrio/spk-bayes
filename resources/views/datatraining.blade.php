@extends('template.main')
@section('konten')
@include('dataasli.modal')
@include('dataset.modaltambahdata')
{{-- @include('dataset.modaledit'); --}}
    <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center">
                 <h3>Data Training</h3>
                  
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        {{-- <th>Nama</th> --}}
                        <th>Pekerjaan</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jangka Waktu (bulan)</th>
                        <th>Metode Pembayaran</th>
                        <th>Kapasitas Bulanan</th>
                        <th>Keterangan</th>
                        <th>Prediksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         {{-- <th>Nama</th> --}}
                        <th>Pekerjaan</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jangka Waktu</th>
                        <th>Metode Pembayaran</th>
                        <th>Kapasitas Bulanan</th>
                        <th>Keterangan</th>
                        <th>Prediksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     @foreach ($training as $key)
                      <tr>
                        {{-- <td>{{ $key->nama}}</td> --}}
                        <td>{{ $key->pekerjaan }}</td>
                        <td>{{ $key->jumlahPengajuan }}</td>
                        <td>{{ $key->jenisPembayaran }}</td>
                        <td>{{ $key->jangkaWaktu}}</td>
                        <td>{{ $key->metodePembayaran}}</td>
                        <td>{{ $key->kapasitasBulanan }}</td>
                        <td>{{ $key->keterangan }}</td>
                        <td>{{ $key->prediksi }}</td>
                       
                      </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            {{-- testing --}}
             <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <h3>Data Testing</h3>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        {{-- <th>Nama</th> --}}
                        <th>Pekerjaan</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jangka Waktu (bulan)</th>
                        <th>Metode Pembayaran</th>
                        <th>Kapasitas Bulanan</th>
                        <th>Keterangan</th>
                        <th>Prediksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         {{-- <th>Nama</th> --}}
                        <th>Pekerjaan</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jangka Waktu</th>
                        <th>Metode Pembayaran</th>
                        <th>Kapasitas Bulanan</th>
                        <th>Keterangan</th>
                        <th>Prediksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     @foreach ($testing as $key)
                      <tr>
                        {{-- <td>{{ $key->nama}}</td> --}}
                        <td>{{ $key->pekerjaan }}</td>
                        <td>{{ $key->jumlahPengajuan }}</td>
                        <td>{{ $key->jenisPembayaran }}</td>
                        <td>{{ $key->jangkaWaktu}}</td>
                        <td>{{ $key->metodePembayaran}}</td>
                        <td>{{ $key->kapasitasBulanan }}</td>
                        <td>{{ $key->keterangan }}</td>
                       <td>{{ $key->prediksi }}</td>
                      </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           
@endsection
