@extends('template.main')
@section('konten')
@include('dataasli.modal')
@include('dataasli.modaltambahdata')
    <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6> --}}
                  <button type="button" class="btn-success m-3" data-toggle="modal" data-target="#tambahdata"id="#myBtn">Tambah Data</button>
                  <button type="button" class="btn-info"data-toggle="modal" data-target="#importdata"id="#myBtn">Import Data</button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Kepribadian</th>
                        <th>Status Rumah</th>
                        <th>Status Tempat Usaha</th>
                        <th>Jumlah Tanggungan</th>
                        <th>Kemampuan</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Nilai Jaminan</th>
                        <th>Angsuran</th>
                        <th>Lama Angsuran</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Kepribadian</th>
                        <th>Status Rumah</th>
                        <th>Status Tempat Usaha</th>
                        <th>Jumlah Tanggungan</th>
                        <th>Kemampuan</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Nilai Jaminan</th>
                        <th>Angsuran</th>
                        <th>Lama Angsuran</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     @foreach ($data as $key)
                      <tr>
                        <td>{{ $key->kepribadian }}</td>
                        <td>{{ $key->statusRumah }}</td>
                        <td>{{ $key->statusTempatusaha }}</td>
                        <td>{{ $key->jumlahTanggungan }}</td>
                        <td>{{ $key->kemampuan }}</td>
                        <td>{{ $key->jumlahPinjaman }}</td>
                        <td>{{ $key->nilaiJaminan }}</td>
                        <td>{{ $key->angsuran }}</td>
                        <td>{{ $key->lamaAngsuran }}</td>
                        <td>{{ $key->keterangan }}</td>
                        <td><a href="" class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Hapus</a></td>
                      </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           
@endsection
