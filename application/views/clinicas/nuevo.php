<div class="container">
  <h1 class="text-center"><i class="bi bi-hospital">Ingresar Clinica</i> </h1>
  <div class="row justify-content-center">
     <div class="col-md-12 card shadow bg-dark w-50 p-4" style="color:white">
        <form class="" action="<?php echo site_url('clinicas/guardarClinica') ?>" method="POST">
          <label class="form-label"><b>Nombre:</b></label>
          <input type="text" name="nombre_rc"  id="nombre_rc " value="" class="form-control" placeholder="Ingrese su nombre" required>
          <label class="form-label"><b>Ruc:</b></label>
          <input type="number" name="ruc_rc" id="ruc_rc" value="" class="form-control" placeholder="Ingrese el ruc">
          <label for="" class="form-label"><b>Propietario:</b></label>
          <input type="text" name="propietario_rc" id="propietario_rc" value="" class="form-control" placeholder="Ingrese propietario">
          <label class="form-label">Fecha de fundación:</label>
          <input type="date" name="fecha_fundacion_rc" id="fecha_fundacion_rc" value="" class="form-control">
          <div class="row">
            <div class="col-md-6">
              <label for=""><b>Latitud:</b></label>
              <input type="number" name="latitud_rc" id="latitud_rc" value="" class="form-control" placeholder="Ingrese Latitud" readonly>
            </div>
            <div class="col-md-6">
              <label for=""><b>Longitud:</b></label>
              <input type="number" name="longitud_rc" id="longitud_rc" value="" class="form-control" placeholder="Ingrese longitud" readonly>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <div id="mapa" style="height:250px; width:100%; border:2px solid white">

              </div>
            </div>
          </div>

           <div class="d-grid gap-2 mt-3">
              <button type="submit" name="button" class="btn btn-primary"><i class="bi bi-floppy"> Guardar</i></button>
             <a href="<?php echo site_url('clinicas/index') ?>"  class="btn btn-danger"><i class="bi bi-x-circle"> Cancelar</i></a>
           </div>


        </form>
     </div>

  </div>

</div>
<script type="text/javascript">
    function initMap(){
      var coordenadaCentral=new google.maps.LatLng(-0.2118519909207322, -78.50762393143957);
      var miMapa=new google.maps.Map(
        document.getElementById('mapa'),
        {
          center:coordenadaCentral,
          zoom:8,
          mapTypeId:google.maps.MapTypeId.ROADMAP
        }
      );
      var marcador=new google.maps.Marker({
        position:coordenadaCentral,
        map:miMapa,
        title:'Seleccione la ubicacion',
        draggable:true
      });
      google.maps.event.addListener(
        marcador,
        'dragend',
        function(event){
          var latitud=this.getPosition().lat();
          var longitud=this.getPosition().lng();
          document.getElementById('latitud_rc').value=latitud;
          document.getElementById('longitud_rc').value=longitud;

        }
      );
    }
</script>
