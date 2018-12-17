
<div class="modal fade" id="modalTrab" tabindex="-1" role="dialog" aria-labelledby="modalGrupo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Anular modelo de encuesta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="modalForm" method="POST" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombreT" name="nombreT" required >
                    </div>
                    <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" class="form-control" id="cargoT" name="cargoT" required >
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="metodo" type="hidden" name="_method">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
