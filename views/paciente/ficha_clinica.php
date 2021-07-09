<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?php if (isset($edit) && $edit) : ?>
                <h4 class="title-header">Actualizar Registro</h4>
            <?php else : ?>
                <h4 class="title-header">Nuevo Registro</h4>
            <?php endif; ?>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <?php if (isset($edit) && $edit) : ?>
                    <li class="breadcrumb-item"><a
                                href="<?= base_url ?>paciente/expediente&id=<?= $paciente_id ?>">Expediente</a>
                    </li>
                <?php else : ?>
                    <li class="breadcrumb-item"><a
                                href="<?= base_url ?>paciente/administracion">Administracion</a>
                    </li>
                <?php endif; ?>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div>
    </div>
</div>
<?php include 'views/paciente/datos.php'; ?>

<?php include 'layout/footer.php' ?>