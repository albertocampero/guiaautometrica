            
        </div>

        <footer>
            <div class="container">
                <h6 class="text-center">&copy; <?= date('Y') ?> Vrumm México. Todos los derechos reservados.</h6>
            </div>
        </footer>

        <!-- confirm delete -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Esta a punto de eliminar un registro<br>
                            Confirme que desea eliminar
                        </p>
                        <p class="debug-url"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-danger btn-ok">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /confirm delete -->

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>