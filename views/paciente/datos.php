<!-- change password -->
<div class="col-md-12">
    <div class="card row">
        <div class="card-header">
            <h3 class="card-title">Datos paciente</h3>
        </div>
        <div class="card-body">
            <div class="form-group input-group-sm">
                <label for="Apellidos">Fecha de ingreso</label>
                <input
                        type="text"
                        class="form-control"
                        id="fecha_alta_pac"
                        value="<?= isset($data) && is_object($data) ? $data->fecha_alta_pa : '' ?>"
                >
            </div>
            <div class="form-group input-group-sm">
                <label for="Password">Hora de ingreso</label>
                <input
                        type="text"
                        class="form-control"
                        id="hora_alta_pac"
                        value="<?= isset($data) && is_object($data) ? $data->hora_alta_pa : '' ?>"
                >
            </div>
            <div class="form-group input-group-sm">
                <label for="Password">No. de expediente</label>
                <input
                        type="text"
                        class="form-control"
                        id="no_expediente"
                        value="<?= isset($data) && is_object($data) ? $data->no_expediente : '' ?>"
                >
            </div>
        </div>
    </div>
</div>



