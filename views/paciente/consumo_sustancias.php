    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
                <h1 class="m-0">Consumo sustancias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url?>paciente/expediente&id=<?= isset($data) && is_object($data) ? $data->id_paciente : ''; ?>">Expediente</a></li>
              <li class="breadcrumb-item active">Entrevista</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    <div class="card-header">               
        <div class="row">
          <div class="col-md-9">
            <h3 class="card-title">Lista de todos los consumos de sustancias</h3>
          </div>
          <div class="col-md-3">
            <button  id="create" class="btn btn-primary btn-xl pull-right w-100" data-toggle="modal" data-target="#modalCategory">
                  <i class="fa fa-plus"></i> Ingresar nuevo registro
            </button>
          </div>
      </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar sustancia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body">
              <form id="consumoForm">
                    <div class="form-group">
                        <label for="nombre">Sustancia:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="sustancia"
                            
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Frecuencia de uso:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="frecuencia_uso"
                           
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Vía de administración:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="via_admin"
                            
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad de uso por primera vez:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edad_uso"
                            
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">La consume actualmente:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="actualmente"
                          
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad en la que dejo de usar:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edad_sin_uso"
                            
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Droga de impacto:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="droga_impacto"
                            >
                    </div>

                     <!-- comprovate if exist darta of user -->
                    <?php if(isset($datos) && is_object($datos)) : ?>
                        <?php $action = 'edit'?>
                    <?php else : ?>
                        <?php $action = 'create'?>
                    <?php endif?>
                    
                    <input type="hidden" name="" id="action" value="create">
                    <input type="hidden" id="paciente_id" value="<?= isset($data) && is_object($data) ? $data->id_paciente : ''; ?>">
                    <input type="hidden" id="consumo_id" value="<?= isset($cons) && is_object($cons) ? $cons->id_consumo_sust : ''; ?>">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-user"></i>Guardar</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

    <!-- /.card-header -->
    <div class="card-body" id="listConsumo">
      <table id="tblConsumo" class="table table-bordered table-striped">
          <thead>
            <tr id="consumo-th">
              <th>Id</th>
              <th>Sustancia</th>
              <th>Frecuencia de uso</th>
              <th>Vía de administración</th>
              <th>Edad de uso por primera vez</th>
              <th>La consume actualmente</th>
              <th>Edad en la que dejo de usar</th>                  
              <th>Droga de impacto</th>
              <th>Editar</th>                  
              <th>Eliminar</th>
            </tr>
          </thead>
          <tfoot class="click">
          <?php while($get = $sust->fetch_object()) :?>
                <tr>
                    <td><?php echo $conter++;?></td>
                    <td><?=$get->sustancia?></td>
                    <td><?=$get->frecuencia_uso?></td>
                    <td><?=$get->via_admin?></td>
                    <td><?=$get->edad_uso?></td>
                    <td><?=$get->actualmente?></td>
                    <td><?=$get->edad_sin_uso?></td>
                    <td><?=$get->droga_impacto?></td>
                    <td>
                      <a class="btn btn-primary btn-sm btn-edit" type="button" data-id="<?=$get->id_consumo_sust?>">
                          <i class="fas fa-pencil-alt btn-actions" data-toggle="modal" data-target="#modalCategory"></i>
                      </a>
                    </td> 
                    <td>
                      <a class="btn btn-danger btn-sm" type="button" >
                        <i class="fas fa-trash btn-actions" data-toggle="modal" data-target="#modalCategory"></i>
                      </a>
                    </td>                  
                </tr>
            <?php endwhile; ?>
          </tfoot>                  
      </table>
  </div>
    <!-- page script -->

  <?php include "layout/footer.php" ?>
  <script src="<?=base_url?>assets/js/paciente/tableSustancias.js"></script>

