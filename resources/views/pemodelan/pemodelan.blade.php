@extends('template.main')
@section('konten')
{{-- @include('dataasli.modal')
@include('datauji.modaltambahdata') --}}
{{-- @include('dataset.modaledit'); --}}
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
