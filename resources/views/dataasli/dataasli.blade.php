@extends('template.main')
@section('konten')
@include('dataasli.modal')
@include('dataasli.modaltambahdata')
@include('dataasli.modaledit');
    <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6> --}}
                  {{-- <button type="button" class="btn-success m-3" data-toggle="modal" data-target="#tambahdata"id="#myBtn">Tambah Data</button> --}}
                  <button type="button" class="btn-info"data-toggle="modal" data-target="#importdata"id="#myBtn">Import Data</button>
                  {{-- <a href="hapusduplikat" class=" btn btn-danger ml-3 ">Hapus Duplikat</a> --}}
                  <a href="transform" class=" btn btn-danger ml-3 ">Preprosessing Data</a>
                  {{-- <form action="{{ url('hapusduplikat') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button is-small is-danger">Hapus</button>
                </form> --}}
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Nama</th>
                        <th>Pekerjaan</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jangka Waktu</th>
                        <th>Metode Pembayaran</th>
                        <th>Pendapatan</th>
                        <th>Pengeluaran</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Nama</th>
                        <th>Pekerjaan</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jangka Waktu</th>
                        <th>Metode Pembayaran</th>
                        <th>Pendapatan</th>
                        <th>pengeluaran</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     @foreach ($data as $key)
                      <tr>
                        <td>{{ $key->nama}}</td>
                        <td>{{ $key->pekerjaan }}</td>
                        <td>{{ $key->jumlahPengajuan }}</td>
                        <td>{{ $key->jenisPembayaran }}</td>
                        <td>{{ $key->jangkaWaktu}}</td>
                        <td>{{ $key->metodePembayaran}}</td>
                        <td>{{ $key->pendapatan }}</td>
                        <td>{{ $key->pengeluaran }}</td>
                        <td>{{ $key->keterangan }}</td>
                        <td>
                          <button type="button" class="btn-primary m-3" data-toggle="modal" data-target="#edit{{ $key->id }}"id="#myBtn">Edit</button>
                          <form action="{{ url('dataasli/'.$key->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data ini?')" >
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger">Hapus</button>
                          </form>
                         </td>
                      </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           
@endsection
