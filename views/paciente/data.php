<form id="consumoForm">
                    <div class="form-group">
                        <label for="nombre">Sustancia:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="sustancia"
                            value="<?= isset($datos) && is_object($datos) ? $datos->sustancia : ''; ?>" 
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Frecuencia de uso:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="frecuencia_uso"
                            value="<?= isset($datos) && is_object($datos) ? $datos->frecuencia_uso : ''; ?>"  
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Vía de administración:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="via_admin"
                            value="<?= isset($datos) && is_object($datos) ? $datos->via_admin : ''; ?>"  
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad de uso por primera vez:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edad_uso"
                            value="<?= isset($datos) && is_object($datos) ? $datos->edad_uso : ''; ?>"  
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">La consume actualmente:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="actualmente"
                            value="<?= isset($datos) && is_object($datos) ? $datos->actualmente : ''; ?>" 
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad en la que dejo de usar:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edad_sin_uso"
                            value="<?= isset($datos) && is_object($datos) ? $datos->edad_sin_uso : ''; ?>"
                            >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Droga de impacto:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="droga_impacto"
                            value="<?= isset($datos) && is_object($datos) ? $datos->droga_impacto : ''; ?>"
                            >
                    </div>

                     <!-- comprovate if exist darta of user -->
                    <?php if(isset($datos) && is_object($datos)) : ?>
                        <?php $action = 'edit'?>
                    <?php else : ?>
                        <?php $action = 'create'?>
                    <?php endif?>
                    
                    <input type="hidden" name="" id="action" value="create">
                    <input type="hidden" id="paciente_id" value=<?= isset($data) && is_object($data) ? $data->id_paciente : ''; ?>">
                    <button type="submit" class="btn btn-info w-100"><i class="fas fa-user"></i>Guardar</button>
                </form>