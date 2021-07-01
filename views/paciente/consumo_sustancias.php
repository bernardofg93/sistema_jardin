<?php if (isset($edit) && is_object($edit)) : ?>
    <?php $action = 'edit' ?>
<?php else : ?>
    <?php $action = 'create' ?>
<?php endif ?>

<?php
    if(isset($_GET['id'])) {
        $pacienteId = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    }
?>


<div class="row" id="container-buttons">
    <div class="col-sm-6">
        <div class="card card-white col-sm-12">
            <div class="card-body" id="container-buttons">
                <button type="submit" form="sendSustancias" class="btn gen-button btn-flat">
                    Guardar <i class="far fa-save"></i>
                </button>
                <!-- Min size -->
                <a type="button" id="min" class="btn btn-cns btn-flat w-minSize">
                    Consumo sustancias <i class="far fa-window-maximize w-minSize"></i>
                </a>
                <a type="button" class="btn btn-danger btn-flat"
                   href="<?= base_url ?>docs/contrato_ingreso_esp.php?&id=<?= $data->id_paciente ?>">
                    <i class="fas fa-file-pdf"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<section id="w-sustancias" >
    <form id="sendSustancias">
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
                            <tbody id="sustanciasPaciente">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="acudio">
                                Cuenta con certiﬁcado expedido por un médico:</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad-cert" value="si">
                                    <label class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad-cert" value="no">
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group rad-enf">
                            <label for="acudio">
                                Tiene alguna enfermedad:</label>
                            <div class="col-sm-6" id="rad-enf">
                                <div class="form-check">
                                    <input class="form-check-input enf-si" type="radio" name="enfRad" value="si">
                                    <label class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input enf-no" type="radio" name="enfRad" value="no">
                                    <label class="form-check-label">No</label>
                                </div>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="inputEnf"
                                       placeholder="¿Cuál?"
                                       value="<?= isset($data) && is_object($data) ? $data->nombre_pa : ''; ?>"
                                       disabled>
                            </div>
                        </div>

                        <div class="form-group rad-lesion">
                            <label for="acudio">
                                Tiene alguna lesión:</label>
                            <div class="col-sm-6" id="rad-lesion">
                                <div class="form-check">
                                    <input class="form-check-input les-si" type="radio" name="radLes" value="si">
                                    <label class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input les-no" type="radio" name="radLes" value="no">
                                    <label class="form-check-label">No</label>
                                </div>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="inputLes"
                                       placeholder="¿Cuál?"
                                       value="<?= isset($data) && is_object($data) ? $data->nombre_pa : ''; ?>"
                                       disabled>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Descripción del estado de salud al ingreso:</label>
                            <textarea id="estadoIngreso" class="form-control" rows="3"
                                      placeholder="Enter ..."></textarea>
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
                                    <input class="form-check-input" type="radio" name="rad-intra" value="si">
                                    <label class="form-check-label">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad-intra" value="no">
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="acudio">
                                Numero de tratamientos previos por consumo de sustancias:</label>
                            <div class="col-sm-6">
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="numTratamientos"
                                       value="<?= isset($data) && is_object($data) ? $data->nombre_pa : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="acudio">Se ha hecho la prueba del:</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="acudio">VIH:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radvih" value="si">
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radvih" value="no">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="acudio">SIDA:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radsida" value="si">
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radsida" value="no">
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
                                        <input class="form-check-input" type="radio" name="radtub" value="si">
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radtub" value="no">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="acudio">HEPATITIS:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rad-hep" value="si">
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rad-hep" value="no">
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
                                        <input class="form-check-input otra-si" type="radio" name="rad-otra" value="si">
                                        <label class="form-check-label">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input otra-no" type="radio" name="rad-otra" value="no">
                                        <label class="form-check-label">No</label>
                                    </div>
                                    <input pattern="[a-zA-Z ]*" type="text" class="form-control" id="inputOtras"
                                           placeholder="¿Cuál?"
                                           value="<?= isset($data) && is_object($data) ? $data->nombre_pa : ''; ?>"
                                           disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="id_paciente" value="<?= $data->id_paciente ?>">
            </div>
    </form>
</section>
<!-- Modal -->
<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <form id="csForm">
                    <div class="form-group">
                        <label for="nombre">Sustancia:</label>
                        <input type="text" class="form-control" id="sustancia">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Frecuencia de uso:</label>
                        <input type="text" class="form-control" id="frecuencia">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Vía de administración:</label>
                        <input type="text" class="form-control" id="via">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad de uso por primera vez:</label>
                        <input type="text" class="form-control" id="edad_uso">
                    </div>
                    <div class="form-group">
                        <label for="nombre">La consume actualmente:</label>
                        <input type="text" class="form-control" id="actualmente">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad en que la dejo de usar:</label>
                        <input type="text" class="form-control" id="dejo_uso">
                    </div>

                    <input type="hidden" id="paciente_id" value="<?= $data->id_paciente ?>">
                    <input type="hidden" id="action" value="<?php echo $action; ?>">

                    <button type="submit" class="btn btn-cns btn-flatt">
                        <i class="far fa-save"> Guardar</i>
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <form id="sustEdit">
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

                    <input type="hidden" id="sustanciaId">
                    <input type="hidden" id="pacienteId" value="<?= $pacienteId ?>" >
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
