
                <form id="frmPassword" onsubmit="cambio_password(event)">
                    <div class="modal fade" id="cambiar_password" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Escribe la nueva contraseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" id="id_usuario" name="id_usuario" hidden>
                                    <label for="password" class="form-label">Contraseña Nueva</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-warning">Actualizar Password</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
