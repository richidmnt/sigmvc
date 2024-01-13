<h1 class="text-center"><i class="bi bi-hospital">CLINICA</i></h1>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-end mb-3">
      <a href="<?php  echo site_url('clinicas/nuevo') ?>" class="btn btn-outline-success"><i class="bi bi-plus-circle">Agregar Clinica</i></a>

  </div>

</div>

</div>
<?php if($listadoClinicas): ?>
      <div class="container">
          <div class="row">
             <div class="col-md-12">
               <div class="table-responsive">
                 <table class="table table-bordered">
                     <thead class="table-dark">
                         <tr>
                             <th>ID</th>
                             <th>NOMBRE</th>
                             <th>RUC</th>
                             <th>PROPIETARIO</th>
                             <th>FECHA FUNDACION</th>
                             <th>LATITUD</th>
                             <th>LONGITUD</th>
                             <th>Acciones</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach($listadoClinicas as $consultar): ?>
                             <tr>
                                 <td class="position-middle"><?php  echo $consultar->id_rc; ?></td>
                                 <td><?php  echo $consultar->nombre_rc; ?></td>
                                 <td><?php  echo $consultar->ruc_rc; ?></td>
                                 <td><?php  echo $consultar->propietario_rc; ?></td>
                                 <td><?php  echo $consultar->fecha_fundacion_rc; ?></td>
                                 <td><?php  echo $consultar->latitud_rc; ?></td>
                                 <td><?php  echo $consultar->longitud_rc; ?></td>
                                 <td><a href="<?php echo site_url('clinicas/borrar/').$consultar->id_rc; ?>" class="btn btn-outline-danger">Eliminar</a></td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>

               </div>
             </div>

          </div>
      </div>
<?php else: ?>
    <div class="alert alert-danger">
        <h1>No hay datos</h1>
    </div>
<?php endif; ?>
