<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>Pacientes</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-friends"></i>
            </div>
            <a href="<?= base_url ?>venta/index" class="small-box-footer">2<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Próximas sesiones</p>
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>Pacientes</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url ?>paciente/administracion" class="small-box-footer"><i
                        class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>65</h3>
                <p>Nuevos</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url ?>usuario/pacientesAsignados" class="small-box-footer"><i
                        class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

<?php include 'layout/footer.php'?>