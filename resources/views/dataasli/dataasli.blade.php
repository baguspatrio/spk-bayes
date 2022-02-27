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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                         <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                      </tr>
                      <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           
@endsection
