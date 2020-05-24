<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TAMBAH DATA</title>
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
  <link rel="stylesheet" href="{{ asset('/assets/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">TAMBAH DATA <small>COVID-19</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/positif/store" method="post">
                <div class="card-body">
                  <div class="form-group">
                  	{{ csrf_field() }}
                    <label for="Kabupaten">Kabupaten</label>
                    <select name="kabupaten" class="form-control" placeholder="{{ old('carikabupaten') }}">
                      <option placeholder="" selected="selected">Semua Kabupaten</option>
                      @foreach($kabupaten as $k)
                      <option placeholder="{{$k->id}}">{{$k->kabupaten}}</option>
                      @endforeach

                    </select>
                    
                  </div>
                  <div class="form-group">
                     <label for="Total">Positif</label>
                    <input type="text" name="positif" class="form-control" id="Positif" placeholder="Total">
                  </div>
                  <div class="form-group">
                     <label for="Dirawat">Dirawat</label>
                    <input type="text" name="dirawat" class="form-control" id="Dirawat" placeholder="Jumlah Dirawat">
                  </div>
                  <div class="form-group">
                     <label for="Sembuh">Sembuh</label>
                    <input type="text" name="sembuh" class="form-control" id="Sembuh" placeholder="Jumlah Sembuh">
                  </div>
                  <div class="form-group">
                     <label for="Meninggal">Meninggal</label>
                    <input type="text" name="meninggal" class="form-control" id="Meninggal" placeholder="Jumlah Meninggal">
                  </div>
                  <div class="form-group">
                     <label for="Tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <input type="submit" value="Simpan Data">
              </form>
            </div>
	
	<!-- <br/>
	<br/>

	<form action="/positif/store" method="post">
		{{ csrf_field() }}
		Kabupaten <input type="text" name="kabupaten" required="required"> <br/>
		Total <input type="text" name="total" required="required"> <br/>
		Dirawat <input type="text" name="dirawat" required="required"> <br/>
		Sembuh <input type="text" name="sembuh" required="required"> <br/>
		Meninggal <input type="text" name="meninggal" required="required"> <br/>
		Tanggal <input type="text" name="tanggal" required="required"> <br/>
		<input type="submit" value="Simpan Data">
	</form> -->


</body>
</html>