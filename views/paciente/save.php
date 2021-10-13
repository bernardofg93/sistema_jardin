<?php
if (isset($_GET['id'])) {
    $idP = filter_var($_GET['id'], FILTER_VALIDATE_INT);
}
?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0">Expediente</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url ?>paciente/administracion">Administración</a></li>
                <li class="breadcrumb-item active">Expediente</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="<?= base_url ?>layout/dist/img/user4-128x128.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">
                            <?= isset($data) && is_object($data) && $data->nombre_pa ? $data->nombre_pa : '' ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <label>Expediente:</label>
                        <select class="form-control form-control-sm" id="expedienteId">
                            <option value="">Selecciona</option>
                            <?php while ($idExp = $exp->fetch_object()) : ?>
                                <option value="<?= $idExp->id_expediente ?>"><?= $idExp->no_expediente ?>
                                    | <?= $idExp->fecha_alta_exp ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col section tabs-->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane">

                                <!-- Main content -->
                                <section class="content">
                                    <div>
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row" id="containerExpediente">
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <p>Datos personales</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>paciente/registro&id=<?= $id ?>"
                                                       class="small-box-footer" id="linkDoc"> <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <?php if (isset($ent) && is_object($ent)) : ?>
                                                            <i class="fas fa-check"></i> Generado
                                                        <?php else : ?>
                                                            <i class="fas fa-plus"></i>
                                                        <?php endif; ?>
                                                        <p>Entrevista</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>entrevista/paciente&id=<?= $id ?>"
                                                       class="small-box-footer" id="linkDoc"> <i
                                                                class="fas fa-arrow-circle-right" id="linkDoc"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <?php if (isset($dom) && is_object($dom)) : ?>
                                                            <i class="fas fa-check"></i> <span>Generado</span>
                                                        <?php else : ?>
                                                            <i class="fas fa-plus"></i> <span>Generar</span>
                                                        <?php endif; ?>
                                                        <p>Domicilio</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>domicilio/paciente&id=<?= $id ?>"
                                                       class="small-box-footer" id="linkDoc"> <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <?php if (isset($sust) && $sust) : ?>
                                                            <i class="fas fa-check"></i> Generado
                                                        <?php else : ?>
                                                            <i class="fas fa-plus"></i> Generar
                                                        <?php endif; ?>

                                                        <p>sustancias</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>consumo/registro&id=<?= $id ?>"
                                                       class="small-box-footer" id="linkDoc"><i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <?php if (isset($sust) && $sust) : ?>
                                                            <i class="fas fa-check"></i> Generado
                                                        <?php else : ?>
                                                            <i class="fas fa-plus"></i> Generar
                                                        <?php endif; ?>

                                                        <p>sustancias</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>consumo/registro&id=<?= $id ?>"
                                                       class="small-box-footer" id="linkDoc"><i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- /.row -->
                                <!-- /.row -->
                                <!-- /.post -->
                            </div>
                            </div>
</section>
<!-- /.content -->
<input type="hidden" id="idP" value="<?= $idP ?>">
<!-- /.content-wrapper -->
<?php include "layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/paciente/expediente.js"></script>