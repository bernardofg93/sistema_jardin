<!-- comprovate if exist darta of user -->
<?php if (isset($edit) && is_object($edit)) : ?>
    <?php $action = 'edit' ?>
<?php else : ?>
    <?php $action = 'create' ?>
<?php endif ?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?php if (isset($edit) && is_object($edit)) : ?>
                <h4 class="title-header">Actualizar Registro</h4>
            <?php else : ?>
                <h4 class="title-header">Nuevo Registro</h4>
            <?php endif; ?>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php if (isset($edit) && is_object($edit)) : ?>
                    <li class="breadcrumb-item"><a
                                href="<?= base_url ?>paciente/expediente&id=<?= $data->id_paciente ?>">Expediente</a>
                    </li>
                <?php else : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url ?>paciente/administracion ?>">Administración</a>
                    </li>
                <?php endif; ?>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div>
    </div>
</div>

<div class="row" id="container-buttons">
    <div class="col-sm-6">
        <div class="card card-white">
            <div class="card-body">
                <button type="submit" form="registroPaciente" class="btn gen-button btn-flat">
                    Guardar <i class="far fa-save"></i>
                </button>
                <!--
                <a type="button" id="max" class="btn btn-cns btn-flat w-size">
                    Información general <i class="far fa-window-maximize w-size"></i>
                </a>
                -->
                <a type="button" class="btn btn-danger btn-flat"
                   href="<?= base_url ?>docs/contrato_ingreso_esp.php?&id=<?= $data->id_paciente ?>">
                    <i class="fas fa-file-pdf"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<section id="w-ingreso">
    <form method="post" id="registroPaciente">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nombre">Nombre:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="nombre"
                                       value="<?= isset($data) && is_object($data) ? $data->nombre_pa : ''; ?>"
                                       required>
                            </div>
                            <div class="form-group col-6">
                                <label for="apellido_paterno">Apellido Paterno:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="apellido_paterno"
                                       value="<?= isset($data) && is_object($data) ? $data->apellido_paterno : ''; ?>"
                                       required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="apellido_materno">Apellido materno:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="apellido_materno"
                                       value="<?= isset($data) && is_object($data) ? $data->apellido_materno : ''; ?>"
                                       required>
                            </div>
                            <div class="form-group col-6">
                                <label>Fecha de nacimiento:</label>
                                <div class="input-group date " data-target-input="nearest">
                                    <input type="date" id="fecha_nac" class="form-control form-control"
                                           data-target="#reservationdate"
                                           value="<?= isset($data) && is_object($data) ? $data->fecha_nac : '' ?>">
                                    <div class="input-group-append" data-target="#reservationdate"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="edad">Edad:</label>
                                <input type="number" class="form-control" id="edad"
                                       value="<?= isset($data) && is_object($data) ? $data->edad : ''; ?>">
                            </div>
                            <div class="form-group col-4">
                                <div class="form-group">
                                    <label for="sexo">Sexo:</label>
                                    <select class="form-control form-control" id="sexo">
                                        <option value="<?= isset($data) && is_object($data) ? $data->sexo : ''; ?>"
                                                disabled
                                                selected><?= isset($data) && is_object($data) ? $data->sexo : 'Selecciona'; ?></option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <div class="form-group">
                                    <label for="sexo">Escolaridad:</label>
                                    <select class="form-control form-control" id="escolaridad">
                                        <option value="<?= isset($data) && is_object($data) ? $data->escolaridad : ''; ?>"
                                                disabled
                                                selected><?= isset($data) && is_object($data) ? $data->escolaridad : 'Selecciona'; ?></option>
                                        <option value="Educación preescolar">Educación preescolar</option>
                                        <option value="Educación Primaria">Educación Primaria</option>
                                        <option value="Educación secundaria">Educación secundaria</option>
                                        <option value="Educación media superior">Educación media superior</option>
                                        <option value="Educación superior">Educación superior</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-light">
                    <!-- radio -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="acudio">acudió a esta institución</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input inactive" value="Voluntario" type="radio"
                                       id="customRadio1"
                                       name="customRadio" <?= isset($data) && is_object($data) && $data->acudio == 'Voluntario' ? 'checked="checked"' : ''; ?>>
                                <label for="customRadio1" class="custom-control-label">Voluntario</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input inactive" value="Petición familiar" type="radio"
                                       id="customRadio2"
                                       name="customRadio" <?= isset($data) && is_object($data) && $data->acudio == 'Petición familiar' ? 'checked="checked"' : ''; ?>>
                                <label for="customRadio2" class="custom-control-label">Petición familiar</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input inactive" value="Indicación legal" type="radio"
                                       id="customRadio3"
                                       name="customRadio" <?= isset($data) && is_object($data) && $data->acudio == 'Indicación legal' ? 'checked="checked"' : ''; ?>>
                                <label for="customRadio3" class="custom-control-label">Indicación legal</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input inactive" value="Indicación medica" type="radio"
                                       id="customRadio4"
                                       name="customRadio" <?= isset($data) && is_object($data) && $data->acudio == 'Indicación medica' ? 'checked="checked"' : ''; ?>>
                                <label for="customRadio4" class="custom-control-label">Indicación medica</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio5" name="custom">
                                <label for="customRadio5" class="custom-control-label">Otro</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="otro_acudio">Otro</label>
                            <input type="text" class="form-control" id="otro_acudio" name="otro_acudio"
                                   value="<?= isset($data) && is_object($data)
                                   && $data->acudio != 'Voluntario'
                                   && $data->acudio != 'Petición familiar'
                                   && $data->acudio != 'Indicación legal'
                                   && $data->acudio != 'Indicación medica'
                                       ? $data->acudio : '' ?>" disabled>
                        </div>

                        <input type="hidden" id="id_paciente" value="<?= $data->id_paciente ?>">
                        <input type="hidden" id="action" value="<?php echo $action; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php if (isset($data) && is_object($data)) : ?>
                    <?php require_once 'views/paciente/datos.php' ?>
                <?php endif; ?>
                <div class="card card-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="lugar">Lugar</label>
                                <input type="text" class="form-control" id="lugar"
                                       value="<?= isset($data) && is_object($data) ? $data->lugar_nacimiento : ''; ?>">
                            </div>
                            <div class="form-group col-6">
                                <label for="nacionalidad ">Nacionalidad</label>
                                <input type="text" class="form-control" id="nacionalidad"
                                       value="<?= isset($data) && is_object($data) ? $data->nacionalidad : ''; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="lugar_recidencia">Lugar de Residencia</label>
                                <input type="text" class="form-control" id="lugar_recidencia"
                                       value="<?= isset($data) && is_object($data) ? $data->lugar_recidencia : ''; ?>">
                            </div>
                            <div class="form-group col-6">
                                <label for="edo_civil">Estado Civil</label>
                                <select class="form-control form-control" id="edo_civil">
                                    <option value="<?= isset($data) && is_object($data) ? $data->edo_civil : ''; ?>"
                                            disabled
                                            selected><?= isset($edit) && is_object($edit) ? $edit->edo_civil : 'Selecciona'; ?></option>
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Separación en proceso judicial">Separación en proceso judicialr
                                    </option>
                                    <option value="Viudo">Viudo</option>
                                    <option value="Concubinato">Concubinato</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="sit_laboral">Situación Laboral</label>
                                <input type="text" class="form-control" id="sit_laboral"
                                       value="<?= isset($data) && is_object($data) ? $data->sit_laboral : ''; ?>">
                            </div>
                            <div class="form-group col-6">
                                <label for="religion">Religión</label>
                                <input type="text" class="form-control" id="religion"
                                       value="<?= isset($data) && is_object($data) ? $data->religion : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<?php include 'layout/footer.php'; ?>
<script src="<?= base_url ?>assets/js/paciente/registro.js"></script>
