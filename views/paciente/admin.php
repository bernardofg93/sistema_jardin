<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0">Registros</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url ?>paciente/registro">Nuevo Registro</a></li>
                <li class="breadcrumb-item active">Registros</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

<!-- /.card-header -->
<div class="card">
    <div class="card-body" id="data-action">
        <table id="tblRegistros" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Status</th>
                <th>Expediente</th>
            </tr>
            </thead>
            <tbody class="click">
            <?php while ($pac = $data->fetch_object()) : ?>
                <tr>
                    <td class="col-3"><?= $pac->id_paciente ?></td>
                    <td class="col-3"><?= $pac->nombre_pa ?></td>
                    <td class="col-3"><?= $pac->apellido_paterno ?></td>
                    <td class="col-3"><?= $pac->apellido_materno ?></td>
                    <td class="col-3"><?= $pac->status_paciente ?></td>
                    <td class="col-1"><a type="button"
                                         href="<?= base_url ?>paciente/expediente&id=<?= $pac->id_paciente ?>"
                                         class="btn btn-cns btn-flat">
                            <i class="fas fa-folder"></i>
                        </a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- page script -->

<?php include "layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/tableUser.js"></script>

