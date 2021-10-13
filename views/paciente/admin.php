<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0">Gestión de pacientes</h4>
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
                <!-- <th>Id</th> -->
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Gestion</th>
                <th>Expediente</th>
                <th>Reingreso</th>
            </tr>
            </thead>
            <tbody class="click">
            <?php while ($pac = $data->fetch_object()) : ?>
                <tr>
                    <!--<td><?= $pac->id_paciente ?></td> -->
                    <td><?= $pac->nombre_pa ?></td>
                    <td><?= $pac->apellido_paterno ?></td>
                    <td><?= $pac->apellido_materno ?></td>
                    <td class="txtStatePac">
                        <div class="form-group clearfix">
                            <div class="d-inline">
                                <input id="checkEstado" type="checkbox" class="statePac">
                            </div>
                        </div>
                    </td>
                    <td style="width: 10%; text-align: center">
                        <a type="button"
                              href="<?= base_url ?>paciente/expediente&id=<?= $pac->id_paciente ?>"
                              class="btn color-manila btn-flat">
                            <i class="fas fa-folder" style="color: #563d7c; "></i>
                        </a>
                    </td>
                    <td style="width: 10%; text-align: center">
                        <a type="button"
                              href="<?= base_url ?>paciente/expediente&id=<?= $pac->id_paciente ?>"
                              class="btn color-manila btn-flat">
                            <i class="fas fa-folder" style="color: #563d7c; "></i>
                        </a>
                    </td>

                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- page script -->

<?php include "layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/tableUser.js"></script>
<script src="<?= base_url ?>assets/js/paciente/gestion.js"></script>

