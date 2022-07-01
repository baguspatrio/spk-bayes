<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ ('asset/img/logo/logo.png') }}" rel="icon">
  <title>BMT Al Ikhwan - Dashboard</title>
  <link href="{{ ('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ ('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ ('asset/css/ruang-admin.min.css') }}" rel="stylesheet">
  <link href="{{ ('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{('asset/css/button-dataTables.css') }}">
   
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
          <h3 class="sidebar-brand-text">BMT</h3>
        </div>
        <div class="sidebar-brand-text mx-3">Al Ikhwan</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{  Request::path()== '/'? 'active' : '' }}" >
        <a class="nav-link"href="{{ url('/') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item {{ Request::path()== 'dataasli'? 'active' : '' }}">
        <a class="nav-link " href="{{ url('dataasli') }}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Data Asli</span>
        </a>
      </li>
       <li class="nav-item {{ Request::path()== 'dataset'? 'active' : ''  }}">
        <a class="nav-link" href="{{ url('dataset') }}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Data Set</span>
        </a>
      </li>
      <li class="nav-item Request::path()== 'datatraining'? 'active' : '' ">
        <a class="nav-link" href="ui-colors.html">
          <i class="fas fa-fw fa-palette"></i>
          <span>Data Training & Data Testing</span>
        </a>
      </li>
      <li class="nav-item Request::path()== 'pemodelan'? 'active' : '' ">
        <a class="nav-link" href="{{ url('dataset') }}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Pemodelan</span>
        </a>
      </li>
      <li class="nav-item Request::path()== 'datauji'? 'active' : '' ">
        <a class="nav-link" href="{{ url('datauji') }}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Uji Data</span>
        </a>
      </li>
      {{-- <div class="version" id="version-ruangadmin"></div> --}}
    </ul>
    <!-- endSidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ ('asset/img/boy.png') }}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 {{ Request::path()=='/' ? ''  : 'd-none' }}">Dashboard</h1>
                <h1 class="h3 mb-0 text-gray-800 {{ Request::path()=='dataasli' ? ''  : 'd-none' }}">Data Asli</h1>
                {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item {{  Request::path()== '/'? 'active' : '' }}"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol> --}}
            </div>

            <div class="row mb-3">
                @yield('konten')
            </div>
            <!--Row-->

            <!-- Modal Logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="login.html" class="btn btn-primary">Logout</a>
                    </div>
                </div>
                </div>
            </div>

            </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
                <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
                </span>
            </div>
            </div>
        </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ 'asset/vendor/jquery/jquery.min.js' }}"></script>
  <script src="{{ 'asset/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
  <script src="{{ 'asset/vendor/jquery-easing/jquery.easing.min.js' }}"></script>
  <script src="{{ 'asset/js/ruang-admin.min.js' }}"></script>
  <script src="{{ 'asset/vendor/chart.js/Chart.min.js' }}"></script>
  <script src="{{ 'asset/js/demo/chart-area-demo.js' }}"></script>  
  <!-- Page level plugins -->
  <script src="{{ 'asset/vendor/datatables/jquery.dataTables.min.js' }}"></script>
  <script src="{{ 'asset/vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
 
   <script>
    // $(document).ready(function () {
    //   $('#dataTable').DataTable(); // ID From dataTable 
    //   $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    // 'copy'});
     $(document).ready(function () {
                
            $('#dataTable').DataTable(); // ID From dataTable 
                $('#dataTableHover').DataTable({
                   
                   
                    dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>"+
                        "<'row'<'col-md-12'tr>>"+
                        "<'row'<'col-md-5'i><'col-md-7'p>>",
                    buttons: [
                        , 'csv', 'excel', 'pdf', 'print','colvis'
                    ],
                    
                })
            });
  </script>
  <script>

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.pendapatan.value;
two = document.autoSumForm.konsumsi.value; 
three = document.autoSumForm.persen.value; 
document.autoSumForm.kapasitasBulanan.value = ((one * 1) - (two * 1)) * (three * 1);}
function stopCalc(){
clearInterval(interval);}
</script>
</body>

</html>