    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <?php if(isset($dom) && is_object($dom)) : ?>
                <h1 class="m-0">Actualizar Domicilio</h1>
            <?php else : ?>
                <h1 class="m-0">Ingresar Domicilio</h1>
            <?php endif; ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url?>paciente/expediente&id=<?= isset($data) && is_object($data) ? $data->id_paciente : ''; ?>">Expediente</a></li>
              <li class="breadcrumb-item active">Domicilio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    <section class="container-personal">   
        <?php require_once 'views/paciente/datos.php' ?>
        <div class="card card-purple">

            <div class="card-header">
                <h3 class="card-title">Domicilio</h3>
            </div>

            <form  method="post" id="formDomicilio">
                <legend></legend> 
                    <div class="card-body">
                        <div class="form-group">
                            <label for="calle">Calle:</label>
                            <input 
                                type="text" 
                                class="form-control"  
                                id="calle"
                                value="<?= isset($dom) && is_object($dom) ? $dom->calle : ''; ?>"
                                >
                        </div>
                        <div class="form-group">
                            <label for="numero">Numero:</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="numero"  
                                value="<?= isset($dom) && is_object($dom) ? $dom->numero : ''; ?>"
                                >
                        </div>
                        <div class="form-group">
                            <label for="colonia">Colonia:</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="colonia"  
                                value="<?= isset($dom) && is_object($dom) ? $dom->colonia : ''; ?>"
                                >
                        </div>
                        <div class="form-group">
                            <label for="inicio_consumo">Municipio</label>
                            <input 
                                type="text" 
                                class="form-control"
                                id="municipio" 
                                value="<?= isset($dom) && is_object($dom) ? $dom->municipio : ''; ?>"
                                >
                        </div>
                        <div class="form-group">
                            <label for="porque_consumo ">Teléfono</label>
                            <input 
                                type="text"
                                class="form-control" 
                                id="telefono"
                                value="<?= isset($dom) && is_object($dom) ? $dom->telefono : ''; ?>" 
                                >
                        </div>
                        <div class="form-group">
                            <label for="nombre_familiar ">Nombre del familiar:</label>
                            <input 
                                type="text"
                                class="form-control" 
                                id="nombre_familiar"
                                value="<?= isset($dom) && is_object($dom) ? $dom->nombre_familiar : ''; ?>"  
                                >
                        </div>
                        <div class="form-group">
                            <label for="telefono_fam">Teléfono</label>
                            <input 
                                type="text"
                                class="form-control" 
                                id="telefono_fam"
                                value="<?= isset($dom) && is_object($dom) ? $dom->telefono_fam : ''; ?>"  
                                >
                        </div>
                        <div class="form-group">
                            <label for="tipo_parentes">Tipo de parentesco:</label>
                            <input 
                                type="text"
                                class="form-control" 
                                id="tipo_parentes"
                                value="<?= isset($dom) && is_object($dom) ? $dom->tipo_parentes : ''; ?>"   
                                >
                        </div>
                        <div class="form-group">
                            <label for="domicilio_fam">Domicilio:</label>
                            <input 
                                type="text"
                                class="form-control" 
                                id="domicilio_fam"
                                value="<?= isset($dom) && is_object($dom) ? $dom->domicilio_fam : ''; ?>" 
                                >
                        </div>
                    </div>
                    <!-- comprovate if exist darta of user -->
                    <?php if(isset($dom) && is_object($dom)) : ?>
                        <?php $action = 'edit'?>
                    <?php else : ?>
                        <?php $action = 'create'?>
                    <?php endif?>
                    <!-- /.card-body -->
                <div class="card-footer">
                    <input type="hidden" id="action" value="<?php echo $action; ?>">
                    <input type="hidden" id="paciente_id" value=<?= isset($data) && is_object($data) ? $data->id_paciente : ''; ?>">
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                </div>
            </form>      
        </div>
    </section>

<script src="<?=base_url?>assets/js/paciente/domicilio.js"></script>
<?php include 'layout/footer.php';