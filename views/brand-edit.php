<main>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="./">Inicio</a></li>
					<li><a href="./brands">Marcas</a></li>
					<li class="active"><?= $pageTitle ?></li>
				</ol>
				<hr>
				<?php if ( isset($_SESSION['alert']['success']) ) { ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?= $_SESSION['alert']['success'] ?>
				</div>
				<?php } ?>
				<form class="form-horizontal" method="post" action="?">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Marca:</label>
						<div class="col-sm-5">
					 		<input type="text" class="form-control" id="name" name="name" value="<?= $name_val ?>" required>
					 	</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
					 			<label>
					 				<input type="checkbox" name="status" <?= $status_val ?>> Activo
					 			</label>
					 		</div>
					 	</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="hidden" name="id" value="<?= $id_val ?>">
							<button type="submit" name="save" class="btn btn-sm btn-primary">Guardar</button>
                            <button type="button" class="btn btn-sm btn-primary" onclick="javascript:window.location='./brands'">Cancelar</button>
						</div>
					</div>
				</form>
				<hr>
			</div>
		</div>
	</div>
</main>