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
                    <!-- /.card-body -->
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
                                    <div class="container-fluid">
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row">
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <?php if (isset($data) && is_object($data)): ?>
                                                            <i class="fas fa-check"></i> <span>Generado</span>
                                                        <?php else : ?>
                                                            <i class="fas fa-plus"></i>Generar
                                                        <?php endif; ?>
                                                        <p>Datos personales</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>paciente/registro&id=<?= $id ?>"
                                                       class="small-box-footer"> <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <?php if (isset($info) && is_object($info)): ?>
                                                            <i class="fas fa-check"></i>
                                                        <?php else : ?>
                                                            <i class="fas fa-plus"></i>
                                                        <?php endif; ?>
                                                        <p>Entrevista</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>entrevista/paciente&id=<?= $id ?>"
                                                       class="small-box-footer"> <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <?php if (isset($dom) && is_object($dom)): ?>
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
                                                       class="small-box-footer"> <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <?php if (isset($sust) && is_object($sust)): ?>
                                                            <i class="fas fa-check"></i>
                                                        <?php else : ?>
                                                            <i class="fas fa-plus"></i>
                                                        <?php endif; ?>

                                                        <p>sustancias</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>consumo/registro&id=<?= $id ?>"
                                                       class="small-box-footer"><i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                        </div>
                                </section>
                                <!-- /.row -->

                                <!-- Main content -->
                                <section class="content">
                                    <div class="container-fluid">
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row">
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <h3>150</h3>

                                                        <p>Entrevista</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="<?= base_url ?>paciente/entrevista"
                                                       class="small-box-footer"> <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                                                        <p>Bounce Rate</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">More info <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <h3>44</h3>

                                                        <p>User Registrations</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">More info <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg color-manila">
                                                    <div class="inner">
                                                        <h3>65</h3>

                                                        <p>Unique Visitors</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-folder"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">More info <i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                        </div>
                                </section>
                                <!-- /.row -->

                                <!-- /.post -->
                            </div>
</section>
<!-- /.content -->

<!-- /.content-wrapper -->
<?php include "layout/footer.php" ?>