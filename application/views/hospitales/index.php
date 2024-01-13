<h1 class="text-center"><i class="bi bi-hospital">HOSPITAL</i></h1>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-end mb-3">
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-eye"></i> Ver mapa
      </button>
      <a href="<?php  echo site_url('hospitales/nuevo') ?>" class="btn btn-outline-success"><i class="bi bi-plus-circle">Agregar Hospital</i></a>

  </div>

</div>

</div>
<?php if($listadoHospitales): ?>
      <div class="container">
          <div class="row">
             <div class="col-md-12">
               <div class="table-responsive">
                 <table class="table table-bordered">
                     <thead class="table-dark">
                         <tr>
                             <th>ID</th>
                             <th>NOMBRE</th>
                             <th>DIRECCION</th>
                             <th>TELEFONO</th>
                             <th>LATITUD</th>
                             <th>LONOGITUD</th>
                             <th>Acciones</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach($listadoHospitales as $consultar): ?>
                             <tr>
                                 <td><?php  echo $consultar->id_hos; ?></td>
                                 <td><?php  echo $consultar->nombre_hos; ?></td>
                                 <td><?php  echo $consultar->direccion_hos; ?></td>
                                 <td><?php  echo $consultar->telefono_hos; ?></td>
                                 <td><?php  echo $consultar->latitud_hos; ?></td>
                                 <td><?php  echo $consultar->longitud_hos; ?></td>
                                 <td><a href="<?php echo site_url('hospitales/borrar/').$consultar->id_hos; ?>" class="btn btn-outline-danger">Eliminar</a></td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>

               </div>
             </div>

          </div>
      </div>
      <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-eye"></i>MAPA DE HOSPITALES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="" id="reportMapa" style="height:300px; width:100%; border:2px solid black">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
      function initMap(){
        var coordenadaCentral=
            new google.maps.LatLng(-0.152948869329262,
              -78.4868431364856);
        var miMapa=new google.maps.Map(
          document.getElementById('reportMapa'),
          {
            center:coordenadaCentral,
            zoom:8,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        <?php foreach ($listadoHospitales as $hospital): ?>
        var coordenadaTemporal=
            new google.maps.LatLng(
              <?php echo $hospital->latitud_hos; ?>,
              <?php echo $hospital->longitud_hos; ?>);
          var marcador=new google.maps.Marker({
            position:coordenadaTemporal,
            map:miMapa,
            title:'<?php echo $hospital->nombre_hos; ?>',
          });
        <?php endforeach; ?>

      }
    </script>

<?php else: ?>
    <div class="alert alert-danger">
        <h1>No hay datos</h1>
    </div>
<?php endif; ?>
