@extends('layouts.master')
@section('title', 'COVID-19')
@section('judul', 'Data COVID-19 Provinsi Bali')
@section('judulkecil')

@section('dirawat', 'Dirawat')
@section('totaldirawat')
{{$totaldirawat[0]->dirawat }}
@endsection

@section('sembuh', 'Sembuh')
@section('totalsembuh')
{{$totalsembuh[0]->sembuh }}
@endsection


@section('positif', 'Positif')
@section('totalpositif')
{{$totalpositif[0]->positif }}
@endsection


@section('meninggal', 'Meninggal')
@section('totalmeninggal')
{{$totalmeninggal[0]->meninggal }}
@endsection

@section('petasebaran', 'Peta Sebaran')
@section('peta')
<script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
<script src="https://pendataan.baliprov.go.id/assets/frontend/map/leaflet.markercluster-src.js"></script>
<script src="http://leaflet.github.io/Leaflet.label/leaflet.label.js" charset="utf-8"></script>
  
  
<script>
  $(document).ready(function () {
    var dataMap=null;
    var dataColor=null;
    var colorMap=[
      "331800",
      "4C2400",
      "663000",
      "7F3C00",
      "994800",
      "B25400",
      "CC6000",
      "E56C00",
      "FF7800"
    ];
    var tanggal = $('#caritgl').val();
    // console.log(tanggal);
    $.ajax({
      async:false,
      url:'/getDataMap',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataMap = response["dataMap"];
        dataColor = response["dataColor"];
      }
    });
    console.log(dataMap);

    // $.ajax({
    //   async:false,
    //   url:'data/getPositif',
    //   type:'get',
    //   dataType:'json',
    //   data:{date: tanggal},
    //   success: function(response){
    //     dataColor = response["dataColor"];
    //     // dataPos = response;
    //   }
    // });
    // console.log(dataColor);

    var map = L.map('map', {fullscreenControl:true,});
    
    $('#btnGenerateColor').on('click',function(e){
      var colorStart = $('#colorStart').val();
      var colorEnd = $('#colorEnd').val();
      $.ajax({
        async:false,
        url:'/create-pallete',
        type:'get',
        dataType:'json',
        data:{start: colorStart, end:colorEnd},
        success: function(response){
          colorMap = response;
          setMapColor();
        }
      });
      
    });

    // var map = L.map('map', {fullscreenControl:true,});
    map.setView(new L.LatLng(-8.374187,115.172922), 10);

    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
      maxZoom: 17,
      attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
      // zoomAnimation:true,
            id: 'mapbox/streets-v11',
      opacity: 0.90, accessToken: 'pk.eyJ1Ijoid2lkaWFuYXB3IiwiYSI6ImNrNm95c2pydjFnbWczbHBibGNtMDNoZzMifQ.kHoE5-gMwNgEDCrJQ3fqkQ',
    });

    OpenTopoMap.addTo(map);
    var defStyle = {opacity:'1',color:'#000000',fillOpacity:'0',fillColor:'#CCCCCC'};
    var selStyle = {color:'#0000FF',opacity:'1',fillColor:'#00FF00',fillOpacity:'1'};
    setMapColor();
    // define variables
    var lastLayer;
    // var defStyle = {opacity:'1',color:'#000000',fillOpacity:'0',fillColor:'#CCCCCC'};
    // var selStyle = {color:'#0000FF',opacity:'1',fillColor:'#00FF00',fillOpacity:'1'};
    
    function setMapColor(){
      var markerIcon = L.icon({
        iconUrl: '/mar.png',
        iconSize: [40, 40],
      });
      var BADUNG,BULELENG,BANGLI,DENPASAR,GIANYAR,JEMBRANA,KARANGASEM,KLUNGKUNG,TABANAN;
      //bukan index
      dataColor.forEach(function(value,index){
        var colorKab = dataColor[index].kabupaten.toUpperCase();
        // console.log(colorKab);
        if(colorKab == "BADUNG"){
          BADUNG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="BANGLI"){
          BANGLI = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        } else if(colorKab=="BULELENG"){
          BULELENG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="DENPASAR"){
          DENPASAR = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="GIANYAR"){
          GIANYAR = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab =="JEMBRANA"){
          JEMBRANA = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="KARANGASEM"){
          KARANGASEM = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="KLUNGKUNG"){
          KLUNGKUNG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab =="TABANAN"){
          TABANAN = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }

      });

      // var invocation = new XMLHttpRequest();

    // Instantiate KMZ parser (async)
    var kmzParser = new L.KMZParser({
        onKMZLoaded: function (layer, name) {
          control.addOverlay(layer, name);
          var markers = L.markerClusterGroup();
          var layers = layer.getLayers()[0].getLayers();

            // fetching sub layer
          layers.forEach(function(layer, index){
          
          var kab  = layer.feature.properties.NAME_2;
          
console.log(kab);
kab = kab.toUpperCase();
                var kabLower = kab.toLowerCase();
          var prov = layer.feature.properties.NAME_1;
          var tb_covid;
          
          //
          if(!Array.isArray(dataMap) || !dataMap.length == 0 ){
            // set sub layer default style positif covid
            if(kab == 'BADUNG'){
              layer.setStyle(BADUNG);
            }else if(kab == 'BANGLI'){
              layer.setStyle(BANGLI);
            }else if(kab == 'BULELENG'){
              layer.setStyle(BULELENG);
            }else if(kab == 'DENPASAR'){
              layer.setStyle(DENPASAR);
            }else if(kab == 'GIANYAR'){
              layer.setStyle(GIANYAR);
            }else if(kab == 'JEMBRANA'){
              layer.setStyle(JEMBRANA);
            }else if(kab == 'KARANGASEM'){
              layer.setStyle(KARANGASEM);
            }else if(kab == 'KLUNGKUNG'){
              layer.setStyle(KLUNGKUNG);
            }else if(kab == 'TABANAN'){
              layer.setStyle(TABANAN);
            } 


            
            // preparing data format
            var tb_covid = '<table width="300">';
                tb_covid +='  <tr>';
                tb_covid +='    <th colspan="2">Keterangan</th>';
                tb_covid +='  </tr>';
              
              
              tb_covid +='  <tr>';
              tb_covid +='    <td>Kabupaten</td>';
              tb_covid +='    <td>: '+kab+'</td>';
              tb_covid +='  </tr>';              

              
              tb_covid +='  <tr style="color:red">';
              tb_covid +='    <td>Positif</td>';
              tb_covid +='    <td>: '+dataMap[index].positif+'</td>';
              tb_covid +='  </tr>';
              

              tb_covid +='  <tr style="color:green">';
              tb_covid +='    <td>Sembuh</td>';
              tb_covid +='    <td>: '+dataMap[index].sembuh+'</td>';
              tb_covid +='  </tr>'; 

              tb_covid +='  <tr style="color:black">';
              tb_covid +='    <td>Meninggal</td>';
              tb_covid +='    <td>: '+dataMap[index].meninggal+'</td>';
              tb_covid +='  </tr>';

          
              tb_covid +='  <tr style="color:blue">';
              tb_covid +='    <td>Dalam Perawatan</td>';
              tb_covid +='    <td>: '+dataMap[index].dirawat+'</td>';
              tb_covid +='  </tr>';               
              
              
            tb_covid +='</table>';

// layer.bindPopup(positif);

//       var markerIcon = L.icon({
//   iconUrl: '/mar.png',
//   iconSize: [40, 40],
// });

//       var noHide = false;
    
            if(kab == 'BANGLI'){
              markers.addLayer( 
                L.marker([-8.254251, 115.366936] ,{
                  icon: markerIcon
                }).bindPopup(tb_covid).addTo(map)
              );
            }
            else if(kab == 'GIANYAR'){
              markers.addLayer( 
                L.marker([-8.422739, 115.255700] ,{
                  icon: markerIcon
                }).bindPopup(tb_covid).addTo(map)
              );

            }else if(kab == 'KLUNGKUNG'){
              markers.addLayer( 
                L.marker([-8.487338, 115.380029] ,{
                  icon: markerIcon
                }).bindPopup(tb_covid).addTo(map)
              );

            }else{
              markers.addLayer( 
                L.marker(layer.getBounds().getCenter(),{
                  icon: markerIcon
                }).bindPopup(tb_covid).addTo(map)
              );
            }

          }else{
            var tb_covid = "Tidak ada Data pada tanggal tersebut"
            layer.setStyle(defStyle);
          }
          layer.bindPopup(tb_covid);
        });
        map.addLayer(markers);
        layer.addTo(map);
        }
    });
  
    // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
    kmzParser.load('bali-kabupaten.kmz');
    // kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/globe.kmz');

    var control = L.control.layers(null, null, {
        collapsed: true
    }).addTo(map);
    $('.leaflet-control-layers').hide();
    }
  });
</script>


@endsection


@section('datasebaran', 'Data Sebaran')

@section('search')
<!-- search -->
    <form action="/dashboard" method="GET">
              <div class="input-group">
                <label class="form-control-label ">Tanggal Penyebaran</label>
                <input type="date" name="caritgl" required="required" class="form-control" value="{{ old('caritgl') }}">
                <input type="submit" value="CARI" class="btn btn-primary">
              </div>
            </form>
            <!-- endsearch -->
@endsection

@section('tabel')
<section class="section-table cid-rYFdRyyvD9" id="table1-b">
  <div class="container container-table">
    <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Data  COVID-19 di Bali</h2>
    

<table class="table no-margin">
                  <thead>
                  <tr>
                    <!-- <th>id</th> -->
                  <th>kabupaten</th>
                  <th>positif</th>
                  <th>dirawat</th>
                  <th>sembuh</th>
                  <th>meninggal</th>
                  <th>tanggal</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($tb_covid as $p)
                    <tr>
                       <!--  <td>{{ $p->id }}</td> -->
                      <td>{{ $p->id_kabupaten}}</td>
                      <td>{{ $p->positif }}</td>
                      <td>{{ $p->dirawat }}</td>
                      <td>{{ $p->sembuh }}</td>
                      <td>{{ $p->meninggal }}</td>
                      <td>{{ $p->tanggal }}</td>
                    <td>
        <a href="/positif/edit/{{ $p->id }}" class="btn btn-primary">Edit</a>
      </td><td>
        <a href="/positif/hapus/{{ $p->id }}" class="btn btn-primary">Hapus</a>
      </td></td>
    </tr>
    @endforeach
    </tbody>
    <a href="/positif/tambah" class="btn btn-primary">Tambah Data</a>
    </table>
      <div class="card-footer">

        <!-- <button type="submit" class="btn btn-primary" href="/tambah">Tambah Data</button> -->
      </div>
@endsection
@section('tambahata')

@endsection