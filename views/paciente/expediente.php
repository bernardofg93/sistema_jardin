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
                           Maria Perez
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
                                    <div class="">
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row" id="containerExpediente">

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