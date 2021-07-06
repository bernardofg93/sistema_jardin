<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?php if (isset($dom) && is_object($dom)) : ?>
                <h1 class="m-0">Actualizar Domicilio</h1>
            <?php else : ?>
                <h1 class="m-0">Ingresar Domicilio</h1>
            <?php endif; ?>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a
                            href="<?= base_url ?>paciente/expediente&id=<?= isset($data) && is_object($data) ? $data->id_paciente : ''; ?>">Expediente</a>
                </li>
                <li class="breadcrumb-item active">Domicilio</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->


<div class="row">
    <div class="col-sm-6">
        <div class="card card-white">
            <div class="card-body" id="container-buttons">
                <button type="submit" form="formDomicilio" class="btn gen-button btn-flat">
                    Guardar <i class="far fa-save"></i>
                </button>
                <!--
                <a type="button" id="max" class="btn btn-cns btn-flat w-size">
                    Información general <i class="far fa-window-maximize w-size"></i>
                </a>
                -->
                <a target="_blank" type="button" class="btn btn-danger btn-flat"
                   href="<?= base_url ?>docs/ingreso.php?&idP=<?= $paciente_id ?>">
                    <i class="fas fa-file-pdf"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?php require_once 'views/paciente/datos.php' ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <form method="post" id="formDomicilio">
                <div class="row">
                    <div class="card-body">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="calle">Calle:</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="calle"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->calle : ''; ?>"
                                    >
                                </div>
                                <div class="form-group col-6">
                                    <label for="numero">Numero:</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="numero"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->numero : ''; ?>"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="colonia">Colonia:</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="colonia"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->colonia : ''; ?>"
                                    >
                                </div>
                                <div class="form-group col-6">
                                    <label for="inicio_consumo">Municipio</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="municipio"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->municipio : ''; ?>"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="porque_consumo ">Teléfono</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="telefono"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->telefono : ''; ?>"
                                    >
                                </div>
                                <div class="form-group col-6">
                                    <label for="nombre_familiar ">Nombre del familiar:</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="nombre_familiar"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->nombre_familiar : ''; ?>"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="telefono_fam">Teléfono</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="telefono_fam"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->telefono_fam : ''; ?>"
                                    >
                                </div>
                                <div class="form-group col-4">
                                    <label for="tipo_parentes">Tipo de parentesco:</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="tipo_parentes"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->tipo_parentes : ''; ?>"
                                    >
                                </div>
                                <div class="form-group col-4">
                                    <label for="domicilio_fam">Domicilio:</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="domicilio_fam"
                                            value="<?= isset($dom) && is_object($dom) ? $dom->domicilio_fam : ''; ?>"
                                    >
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- comprovate if exist darta of user -->
                <?php if (isset($dom) && is_object($dom)) : ?>
                    <?php $action = 'edit' ?>
                <?php else : ?>
                    <?php $action = 'create' ?>
                <?php endif ?>
                <!-- /.card-body -->
                <input type="hidden" id="action" value="<?php echo $action; ?>">
                <input type="hidden" id="paciente_id"
                       value="<?= isset($data) && is_object($data) ? $data->id_paciente : ''; ?>">
            </form>
        </div>
    </div>
</div>


<script src="<?= base_url ?>assets/js/paciente/domicilio.js"></script>
<?php include 'layout/footer.php';