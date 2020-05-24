<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EDIT DATA</title>
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
<body class="hold-transition sidebar-mini">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> EDIT DATA <small>COVID-19</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($tb_covid as $p)
              <form role="form" id="quickForm" action="/positif/update" method="post">
              	{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
                <div class="card-body">
                  <div class="form-group">
                    <label for="Kabupaten">Kabupaten</label>
                    <select name="kabupaten" class="form-control" value="{{ old('carikabupaten') }}">
                      <option value="" selected="selected">Semua Kabupaten</option>
                      @foreach($kabupaten as $k)
                      <option value="{{$k->id}}">{{$k->kabupaten}}</option>
                      @endforeach
                  </div>
                  <div class="form-group">
                    <label for="Positif">Positif</label>
                    <input input type="text" required="required" name="positif" value="{{ $p->positif }}" class="form-control">
                  </div>
                <div class="form-group">
                    <label for="Dirawat">Dirawat</label>
                    <input input type="text" required="required" name="dirawat" value="{{ $p->dirawat }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Sembuh">Sembuh</label>
                    <input input type="text" required="required" name="sembuh" value="{{ $p->sembuh }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Meninggal">Meninggal</label>
                    <input input type="text" required="required" name="meninggal" value="{{ $p->meninggal }}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Tanggal">Tanggal</label>
                    <input input type="date" required="required" name="tanggal" value="{{ $p->tanggal }}" class="form-control">
                  </div>
				<input type="submit" value="Simpan Data">
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div> -->
              </form>
     
              @endforeach
            </div>
            <!-- /.card -->
            </div>

	<a href="/dashboard"> Kembali</a>
	
	

</body>
</html>