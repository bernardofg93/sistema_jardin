<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?php if (isset($data) && is_object($data)) : ?>
                <h4 style="font-size: 18px;">Actualizar Registro</h4>
            <?php else : ?>
                <h4 style="font-size: 18px;">Nuevo Registro</h4>
            <?php endif; ?>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url ?>usuario/gestion">Administración</a></li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

<div class="row">
    <div class="col-md-6">
        <div class="card card-light">
            <form action="<?= base_url ?>usuario/save" method="post" id="formUsuario">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="nombre" placeholder="Nombre" value="<?= isset($data) && is_object($data) ? $data->nombre_us : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Apellidos">Apellidos</label>
                        <input type="text" class="form-control form-control-sm" id="apellidos" placeholder="Apellidos" value="<?= isset($data) && is_object($data) ? $data->apellidos_us : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select class="form-control form-control-sm" id="rol">
                            <option><?= isset($data) && is_object($data) ? $data->rol : 'Selecciona'; ?></option>
                            <option value="admin">Administrador</option>
                            <option value="doc">Doctor</option>
                            <option value="pers">Personal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control form-control-sm" id="telefono" placeholder="Enter email" value="<?= isset($data) && is_object($data) ? $data->telefono_us : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="email" value="<?= isset($data) && is_object($data) ? $data->email : ''; ?>">
                    </div>
                    <?php if (!isset($data)) : ?>
                        <div class="form-group">
                            <label for="Password">contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="password" placeholder="Password" minlength="6">
                        </div>
                    <?php endif ?>
                    <!-- comprovate if exist darta of user -->
                    <?php if (isset($data) && is_object($data)) : ?>
                        <?php $action = 'edit' ?>
                    <?php else : ?>
                        <?php $action = 'create' ?>
                    <?php endif ?>
                </div>
                <div class="card-footer">
                    <input type="hidden" id="id_usuario" value="<?= $data->id_usuario ?>">
                    <input type="hidden" id="action" value="<?php echo $action; ?>">
                    <button type="submit" form="formUsuario" class="btn btn-sm btn-flat gen-button">
                        Guardar <i class="far fa-save"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php if (isset($data) && is_object($data)) : ?>
        <div class="col-md-6">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Cambiar contraseña</h3>
                </div>
                <form method="post" id="userPass">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Apellidos">Contraseña nueva</label>
                            <input type="password" class="form-control form-control-sm" id="pass" placeholder="Password" minlength="6">
                        </div>
                        <div class="form-group">
                            <label for="Password">Repetir nueva contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="newpass" placeholder="Password" minlength="6">
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="hidden" id="userPass" value="<?= $data->id_usuario ?>">
                        <button type="submit" form="formUsuario" class="btn btn-sm btn-flat gen-button">
                            Guardar <i class="far fa-save"></i>
                        </button>
                    </div>

                </form>
            </div>
            <div class="card card-light" id="card-body">
                <div class="card-header">
                    <h3 class="card-title">Estado del usuario</h3>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="status-user">
                                <label for="">
                                    <input type="text" name="" id="estado_us" value="<?= isset($data) && $data->status_us == 1 ? 'ACTIVO' : 'INACTIVO' ?>">
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group clearfix">
                                    <div class="icheck-info d-inline">
                                        <input id="checkboxPrimary1" type="checkbox" data-v="<?= $data->id_usuario ?>" <?= isset($data) && $data->status_us == 1 ? 'checked' : '' ?>>
                                        </label><label for="checkboxPrimary1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" id="idUser" value="<?= $data->id_usuario ?>">
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require('layout/footer.php') ?>
<script src="<?= base_url ?>assets/js/usuario.js"></script>
<script src="<?= base_url ?>layout/plugins/select2/js/select2.full.min.js"></script>