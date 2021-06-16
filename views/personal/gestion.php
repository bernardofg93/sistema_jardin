<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0">Registros</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url ?>usuario/registro">Nuevo Registro</a></li>
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
                <th>Rol</th>
                <th>Email</th>
                <th>Status</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody class="click">
            <?php while ($data = $registros->fetch_object()) : ?>
                <tr>
                    <td class="col-3"><?= $data->id_usuario ?></td>
                    <td class="col-3"><?= $data->nombre_us ?></td>
                    <td class="col-3"><?= $data->apellidos_us ?></td>
                    <td class="col-3"><?= $data->rol ?></td>
                    <td class="col-3"><?= $data->email ?></td>
                    <td  class="col-1"><?= $data->status_us == 1 ? 'ACTIVO' : 'INACTIVO' ?></td>
                    <td><a type="button" href="<?= base_url ?>usuario/editar&id=<?= $data->id_usuario ?>" class="btn btn-cns btn-flat">
                        <i class="fas fa-user-edit"></i>
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
<script src="<?= base_url ?>assets/js/usuarioActions.js"></script>
