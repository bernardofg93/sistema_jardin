<?php if (isset($data) && $data) : ?>
    <?php $action = 'edit' ?>
<?php else : ?>
    <?php $action = 'create' ?>
<?php endif ?>


<?php
if (isset($_GET['id'])) {
    $pacienteId = filter_var($_GET['id'], FILTER_VALIDATE_INT);
}
?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?php if (isset($edit) && $edit) : ?>
                <h4 class="title-header">Actualizar Registro</h4>
            <?php else : ?>
                <h4 class="title-header">Nuevo Registro</h4>
            <?php endif; ?>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                                href="<?= base_url ?>paciente/expediente&id=<?= $pacienteId ?>">Expediente</a>
                    </li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div>
    </div>
</div>

<div class="row" id="container-buttons">
    <div class="col-sm-6">
        <div class="card card-white col-sm-12">
            <div class="card-body" id="container-buttons">
                <button type="submit" form="sendSustancias" class="btn gen-button btn-flat">
                    Guardar <i class="far fa-save"></i>
                </button>
                <!-- Min size -->
                <!--
                <a type="button" id="min" class="btn btn-cns btn-flat w-minSize">
                    Consumo sustancias <i class="far fa-window-maximize w-minSize"></i>
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

<section id="w-sustancias">
    <div class="row">
        <div class="col-sm-12">
            <a type="button" id="btnCreate" class="btn btn-cns btn-flat" data-toggle="modal"
               data-target="#modalCategory">
                Ingresar sustancias <i class="far fa-list-alt"></i>
            </a>
            <div class="card card-light">
                <div class="card-body" id="listaSuatancias">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size: 12px;">Sustancia</th>
                            <th style="font-size: 12px;">Frecuencia de uso</th>
                            <th style="font-size: 12px;">Vía de administración</th>
                            <th style="font-size: 12px;">Edad de uso por primera vez</th>
                            <th style="font-size: 12px;">La consume actualmente</th>
                            <th style="font-size: 12px;">Edad en que la dejo de usar</th>
                            <th style="font-size: 12px;">Editar</th>
                            <th style="font-size: 12px;">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody id="sustanciasPaciente"
                        <?php
                        foreach ($arrCons as $i) {
                            echo "<tr>
                                        <td class='sustancia'>
                                            $i->sustancia
                                        </td>
                                                  <td class='frecuencia'>
                                            $i->frecuencia_uso
                                        </td>
                                                  <td class='via'>
                                            $i->via_admin
                                        </td>
                                                  <td class='edad'>
                                            $i->edad_uso
                                        </td>
                                                  <td class='actualmente'>
                                        $i->actualmente
                                        </td>
                                                  <td class='dejo_uso'>
                                           $i->edad_sin_uso
                                        </td>
                                                  <td>
                                                    <a class='btn btn-primary btn-sm b-edit' data-toggle='modal' data-target='#modalEdit' data-id='$i->id_consumo_sustancias'>
                                                        <i class='fas fa-pencil-alt btn-actions b-edit' data-id='$i->id_consumo_sustancias'></i>
                                                    </a>
                                        </td>
                                         <td>
                                                <a  class='btn btn-danger btn-sm b-delete' data-id='$i->id_consumo_sustancias'>
                                                    <i class='fas fa-trash btn-actions b-delete' data-id='$i->id_consumo_sustancias'></i>
                                               </a>
                                        </td>
                                        
                                    </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form id="sendSustancias">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="acudio">
                                Cuenta con certiﬁcado expedido por un médico:</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad-cert"
                                           value="si" <?= isset($data) && $data && is_object($data) && $data->certificado == 'si' ? 'checked=checked' : '' ?>>
                                    <label class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad-cert" value="no"
                                           value="si" <?= isset($data) && $data && is_object($data) && $data->certificado == 'no' ? 'checked=checked' : '' ?>>
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group rad-enf">
                            <label for="acudio">
                                Tiene alguna enfermedad:</label>
                            <div class="col-sm-6" id="rad-enf">
                                <div class="form-check">
                                    <input class="form-check-input enf-si" type="radio" name="enfRad" value="si"
                                           value="si" <?= isset($data) && $data && is_object($data) && $data->alguna_enf == 'si' ? 'checked=checked' : '' ?>>
                                    <label class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input enf-no" type="radio" name="enfRad" value="no"
                                           value="si" <?= isset($data) && $data && is_object($data) && $data->alguna_enf == 'no' ? 'checked=checked' : '' ?>>
                                    <label class="form-check-label">No</label>
                                </div>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="inputEnf"
                                       placeholder="¿Cuál?"
                                       value="<?= isset($data) && is_object($data) && $data->alguna_enf != 'no' ? $data->alguna_enf : ''; ?>"
                                       disabled>
                            </div>
                        </div>

                        <div class="form-group rad-lesion">
                            <label for="acudio">
                                Tiene alguna lesión:</label>
                            <div class="col-sm-6" id="rad-lesion">
                                <div class="form-check">
                                    <input class="form-check-input les-si" type="radio" name="radLes" value="si"
                                           value="si" <?= isset($data) && $data && is_object($data) && $data->lesion == 'si' ? 'checked=checked' : '' ?>>
                                    <label class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input les-no" type="radio" name="radLes"
                                           value="no" <?= isset($data) && $data && is_object($data) && $data->lesion == 'no' ? 'checked=checked' : '' ?>>
                                    <label class="form-check-label">No</label>
                                </div>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="inputLes"
                                       placeholder="¿Cuál?"
                                       value="<?= isset($data) && is_object($data) && $data->lesion != 'no' ? $data->lesion : ''; ?>"
                                       disabled>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Descripción del estado de salud al ingreso:</label>
                            <textarea id="estadoIngreso" class="form-control" rows="3"
                                      placeholder="Enter ..."><?= isset($data) && is_object($data) ? $data->descripcion_salud : ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="acudio">
                                Alguna vez ha usado droga vía intravenosa:</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad-intra"
                                           value="si" <?= isset($data) && $data && is_object($data) && $data->intravenosa == 'si' ? 'checked=checked' : '' ?>>
                                    <label class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad-intra"
                                           value="no" <?= isset($data) && $data && is_object($data) && $data->intravenosa == 'no' ? 'checked=checked' : '' ?>>
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="acudio">
                                Numero de tratamientos previos por consumo de sustancias:</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="numTratamientos"
                                       value="<?= isset($data) && is_object($data) ? $data->num_trat : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="acudio">Se ha hecho la prueba del:</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="acudio">VIH:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radvih"
                                               value="si" <?= isset($data) && $data && is_object($data) && $data->vih == 'si' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radvih"
                                               value="no" <?= isset($data) && $data && is_object($data) && $data->vih == 'no' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="acudio">SIDA:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radsida"
                                               value="si" <?= isset($data) && $data && is_object($data) && $data->sida == 'si' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radsida"
                                               value="no" <?= isset($data) && $data && is_object($data) && $data->sida == 'no' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="acudio">TUBERCULOSIS:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radtub"
                                               value="si" <?= isset($data) && $data && is_object($data) && $data->pr_tuberculosis == 'si' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radtub"
                                               value="no" <?= isset($data) && $data && is_object($data) && $data->pr_tuberculosis == 'no' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="acudio">HEPATITIS:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rad-hep"
                                               value="si" <?= isset($data) && $data && is_object($data) && $data->hepatitis == 'si' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rad-hep"
                                               value="no" <?= isset($data) && $data && is_object($data) && $data->hepatitis == 'no' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group rad-otra">
                            <div class="row">
                                <div class="col-sm-6" id="rad-otra">
                                    <label for="acudio">OTRA:</label>
                                    <div class="form-check">
                                        <input class="form-check-input otra-si" type="radio" name="rad-otra"
                                               value="si" <?= isset($data) && $data && is_object($data) && $data->otras == 'si' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input otra-no" type="radio" name="rad-otra"
                                               value="no" <?= isset($data) && $data && is_object($data) && $data->otras == 'no' ? 'checked=checked' : '' ?>>
                                        <label class="form-check-label">No</label>
                                    </div>
                                    <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="inputOtras"
                                           placeholder="¿Cuál?"
                                           value="<?= isset($data) && is_object($data) && $data->otras != 'no' ? $data->otras : '' ?>"
                                           disabled>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="pregId" value="<?= $data->id_preguntas_consumo ?>">
                        <input type="hidden" id="action" value="<?= $action ?>">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<!-- Modal -->
<div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <form id="formSustancia">
                    <div class="form-group">
                        <label for="nombre">Sustancia:</label>
                        <input type="text" class="form-control" id="sustanciaEd">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Frecuencia de uso:</label>
                        <input type="text" class="form-control" id="frecuenciaEd">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Vía de administración:</label>
                        <input type="text" class="form-control" id="viaEd">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad de uso por primera vez:</label>
                        <input type="text" class="form-control" id="edad_usoEd">
                    </div>
                    <div class="form-group">
                        <label for="nombre">La consume actualmente:</label>
                        <input type="text" class="form-control" id="actualmenteEd">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad en que la dejo de usar:</label>
                        <input type="text" class="form-control" id="dejo_usoEd">
                    </div>

                    <input type="hidden" id="consumoId">
                    <input type="hidden" id="pacienteId" value="<?= $pacienteId ?>">

                    <button type="submit" class="btn btn-cns btn-flatt btnAction">
                        <i class="far fa-save btnAction"> Guardar</i>
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
<script src="<?= base_url ?>assets/js/paciente/radiosIngreso.js"></script>
<script src="<?= base_url ?>assets/js/paciente/sustancias.js"></script>
<script src="<?= base_url ?>assets/js/paciente/tableSustancias.js"></script>
