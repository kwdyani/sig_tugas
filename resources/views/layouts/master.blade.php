<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/assets/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
 
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.css" />
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.Default.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.css" />
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.Default.css" />

  
<!-- Leaflet (JS/CSS) -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.css" />
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.Default.css" />
  <!-- Leaflet-KMZ -->
  <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

  <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->

  
  <!-- <style>
    html,
    body,
    #map {
        height: 400px;
        width: 100%;
        padding: 0;
        margin: 0;
        position: relative;
    }
</style> -->
</head>
<body >

  <!-- Content Wrapper. Contains page content -->
  <div class="container mt-8">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('judul')
        <small>@yield('judulkecil')</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>@yield('totalpositif')</h3>

              <p>@yield('positif')</p>
            </div>
            
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>@yield('totalsembuh')<sup style="font-size: 20px"></sup></h3>

              <p>@yield('sembuh')</p>
            </div>
            
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>@yield('totaldirawat')</h3>

              <p>@yield('dirawat')</p>
            </div>
            
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>@yield('totalmeninggal')</h3>

              <p>@yield('meninggal')</p>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable" align="center">

          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@yield('petasebaran')</h3>
              <div class="card-body">
                <!-- <p>@yield('peta')</p> -->
                <div id="map" style="height: 500px; width: 100%;"></div>
              </div>

                  <div class="card-footer " style="background: white">
      <!-- <div class="map">
        <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAEIpgj38KyLFELm2bK9Y7krBkz1K-cMq8&amp;q=place_id:ChIJ06f8IHUv0i0RhM1WxCy2cig" allowfullscreen=""></iframe>
      </div> -->
      <!-- <div class="card-footer" style="background: white"> -->
              <div class="row">
                <div class="col-6">
                  Warna Awal
                  <input type="color" value="#FF0000" class="form-control" id="colorStart">
                </div>
                <div class="col-6">
                  Warna Akhir
                  <input type="color" value="#008000" class="form-control" id="colorEnd">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                  <button class="btn btn-primary form-control" id="btnGenerateColor">Generate Warna</button>
                </div>
      
              </div>
            <!-- </div> -->
      
    </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    
                    
                  </div>
                </div>
                
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">@yield('datasebaran')</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
                <p>@yield('search')</p>
                
              </div>

            <div class="box-body">
              <div class="table-responsive">
                @yield('tabel')
                
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <a href="/tambah" class="btn btn-sm btn-info btn-flat pull-left">Tambah Data Baru</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div> -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          

          

          

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Sistem Informasi Geografis - Kerti Widyani</strong>
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

@yield('peta')
<!-- jQuery 3 -->
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/assets/bower_components/raphael/raphael.min.js"></script>
<script src="/assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/assets/bower_components/moment/min/moment.min.js"></script>
<script src="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
</body>
</html>
