@extends('layouts.master')
@section('title', 'COVID-19')
@section('judul', 'Data COVID-19 Provinsi Bali')
@section('judulkecil', 'tanggal sekian')
@section('dirawat', 'Dirawat')
@section('sembuh', 'Sembuh')
@section('positif', 'Positif')
@section('meninggal', 'Meninggal')
@section('petasebaran', 'Peta Sebaran')
@section('datasebaran', 'Data Sebaran')
@section('tabel')
<p>Cari Data Covid-19 :</p>
<form method="get">
      <label>PILIH TANGGAL</label>
      <input type="date" name="tanggal">
      <input type="submit" value="FILTER">
    </form>
<table class="table no-margin">
                  <thead>
                  <tr>
                    <th>id</th>
      <th>kabupaten</th>
      <th>total</th>
      <th>dirawat</th>
      <th>sembuh</th>
      <th>meninggal</th>
      <th>tanggal</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($tb_positif as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td>{{ $p->kabupaten }}</td>
      <td>{{ $p->total }}</td>
      <td>{{ $p->dirawat }}</td>
      <td>{{ $p->sembuh }}</td>
      <td>{{ $p->meninggal }}</td>
      <td>{{ $p->tanggal }}</td>
      <td>
        <a href="/positif/edit/{{ $p->id }}">Edit</a>
      </td><td>
        <a href="/positif/hapus/{{ $p->id }}">Hapus</a>
      </td></td>
    </tr>
    @endforeach
    </tbody>
    <a href="/positif/tambah">Tambah Data</a>
      </table>
@endsection



<!-- <!DOCTYPE html>
<html>
<head>
	<title>COVID-19</title>
</head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <!-- Tell the browser to be responsive to screen width -->

  <!-- Bootstrap 3.3.7 -->
  <!-- <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css"> -->
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.min.css"> -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!-- <link rel="stylesheet" href="/adminlte/dist/css/skins/_all-skins.min.css"> -->

  <!-- Google Font --><!-- 
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data COVID-19 Provinsi Bali</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
		<tr>
			<th>id</th>
			<th>kabupaten</th>
			<th>total</th>
			<th>dirawat</th>
			<th>sembuh</th>
			<th>meninggal</th>
			<th>tanggal</th>
		</tr>
		 </thead>
            <tbody>
		@foreach($tb_positif as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->kabupaten }}</td>
			<td>{{ $p->total }}</td>
			<td>{{ $p->dirawat }}</td>
			<td>{{ $p->sembuh }}</td>
			<td>{{ $p->meninggal }}</td>
			<td>{{ $p->tanggal }}</td>
			<td>
				<a href="/positif/edit/{{ $p->id }}">Edit</a>
			</td><td>
				<a href="/positif/hapus/{{ $p->id }}">Hapus</a>
			</td></td>
		</tr>
		@endforeach
	</table>
 -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div>
</div> -->
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<!-- <script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- DataTables -->
<!-- <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<!-- SlimScroll -->
<!-- <script src="/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<!-- <script src="/adminlte/bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="/adminlte/dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="/adminlte/dist/js/demo.js"></script> -->
<!-- page script -->
<!-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html> -->