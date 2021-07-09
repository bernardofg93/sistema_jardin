<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?php if (isset($obj) && is_object($obj)) : ?>
                <h1 class="m-0">Actualizar Entrevista</h1>
            <?php else : ?>
                <h1 class="m-0">Realizar Entrevista</h1>
            <?php endif; ?>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a
                            href="<?= base_url ?>paciente/expediente&id=<?= isset($data) && is_object($data) ? $data->id_paciente : ''; ?>">Expediente</a>
                </li>
                <li class="breadcrumb-item active">Entrevista</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

<div class="card card-white col-sm-6">
    <!-- /.card-header -->
    <div class="card-body" id="container-buttons">
        <button type="submit" form="entrevistaInicial" class="btn btn-cns btn-flat">
           Guardar <i class="far fa-save"></i>
        </button>
        <a type="button" id="btnCreate" class="btn btn-cns btn-flat" data-toggle="modal" data-target="#modalCategory">
            <i class="far fa-list-alt"></i>
        </a>
        <a type="button" class="btn btn-danger btn-flat"
           href="<?= base_url ?>docs/entrevista.php?&id=<?= $data->id_paciente ?>">
            <i class="fas fa-file-pdf"></i>
        </a>
    </div>
</div>

<div class="row">
    <?php if (isset($data) && is_object($data)) : ?>
        <div class="col-md-6">
            <?php require_once 'views/paciente/datos.php' ?>
        </div>
    <?php endif; ?>
    <div class="col-md-6">
        <div class="card card-light">
            <div class="card-body">
                <div class="form-group">
                    <label for="juntas">¿Participabas en juntas?</label>
                    <input
                            type="text"
                            class="form-control"
                            id="juntas"
                            value="<?= isset($obj) && is_object($obj) ? $obj->juntas : ''; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="recibo_informacion">¿Recibiste información sobre la prevención de recaídas?</label>
                    <input
                            type="text"
                            class="form-control"
                            id="recibo_informacion"
                            value="<?= isset($obj) && is_object($obj) ? $obj->recibo_informacion : ''; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="constancia_reunion">¿Fuiste constante a las reuniones después de tu
                        internamiento?</label>
                    <input
                            type="text"
                            class="form-control"
                            id="constancia_reunion"
                            value="<?= isset($obj) && is_object($obj) ? $obj->constancia_reunion : ''; ?>"
                    >
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-light">
            <form method="post" id="entrevistaInicial">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="lugar">¿Como llegaste aquí?</label>
                            <input type="text" class="form-control" id="como_llegaste"
                                   value="<?= isset($obj) && is_object($obj) ? $obj->como_llegaste : ''; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="nacionalidad ">¿Que sustancia consumes?</label>
                            <input type="text" class="form-control" id="consumo_sustancia"
                                   value="<?= isset($obj) && is_object($obj) ? $obj->consumo_sustancia : ''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="lugar_recidencia">¿Con que frecuencia consumes?</label>
                            <input type="text" class="form-control" id="consumo_frecuencia"
                                   value="<?= isset($obj) && is_object($obj) ? $obj->consumo_frecuencia : ''; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="edo_civil">¿A qué edad empezaste a consumir?</label>
                            <input type="text" class="form-control" id="inicio_consumo"
                                   value="<?= isset($obj) && is_object($obj) ? $obj->inicio_consumo : ''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="sit_laboral">¿Por que empezaste a consumir?</label>
                            <input type="text" class="form-control" id="porque_consumo"
                                   value="<?= isset($obj) && is_object($obj) ? $obj->porque_consumo : ''; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="religion">¿Tienes familiares en esta ciudad ?</label>
                            <input type="text" class="form-control" id="fam_ciudad"
                                   value="<?= isset($obj) && is_object($obj) ? $obj->fam_ciudad : ''; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="religion">¿Como es tu relación con ellos?</label>
                            <input type="text" class="form-control" id="fam_relacion"
                                   value="<?= isset($obj) && is_object($obj) ? $obj->fam_relacion : ''; ?>">
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-light">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="consideracion">¿consideras que este programa es bueno para ti?</label>
                        <input
                                type="text"
                                class="form-control"
                                id="consideracion"
                                value="<?= isset($obj) && is_object($obj) ? $obj->consideracion : ''; ?>"
                        >
                    </div>
                    <div class="form-group col-6">
                        <label for="porque_consid">¿Por qué?</label>
                        <input
                                type="text"
                                class="form-control"
                                id="porque_consid"
                                value="<?= isset($obj) && is_object($obj) ? $obj->porque_consid : ''; ?>"
                        >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="porque_consumo ">¿Es tu primera vez en un programa de rehabilitación?</label>
                        <input
                                type="text"
                                class="form-control"
                                id="primera_vez"
                                value="<?= isset($obj) && is_object($obj) ? $obj->primera_vez : ''; ?>"
                        >
                    </div>
                    <div class="form-group col-6">
                        <label for="fam_ciudad ">¿Cuantas veces has estado en un programa de rehabilitación?</label>
                        <input
                                type="text"
                                class="form-control"
                                id="veces_programa"
                                value="<?= isset($obj) && is_object($obj) ? $obj->veces_programa : ''; ?>"
                        >
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($obj) && is_object($obj)) : ?>
            <?php $action = 'edit' ?>
        <?php else : ?>
            <?php $action = 'create' ?>
        <?php endif ?>

        <?php $paciente_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false ?>

        <input type="hidden" id="action" value="<?= $action ?>"/>
        <input type="hidden" id="paciente_id" value="<?= $paciente_id ?>"/>
        </form>
    </div>
</div>

<script src="<?= base_url ?>assets/js/entrevistaInicial.js"></script>
<?php include 'layout/footer.php';