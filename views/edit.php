<main>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="./">Inicio</a></li>
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
						<label for="brand-ajax" class="col-sm-2 control-label">Marca:</label>
						<div class="col-sm-5">
							<select class="form-control brand-ajax" id="brand-ajax" name="brand" required>
								<option>Seleccione</option>
								<?php
									foreach ($brands as $key => $brand) {
										$sel = ( $brand['id'] == $brand_val )? "selected" : "";
								?>
									<option value="<?= $brand['id'] ?>" <?= $sel ?>><?= $brand['name'] ?></option>
								<?php } ?>
							</select>
					 	</div>
					</div>
					<div id="modelBlock">
						<div class="form-group">
							<label for="model" class="col-sm-2 control-label">Modelo:</label>
							<div class="col-sm-5">
								<div class="input-group">
									<?php if ( is_numeric($model_val) ) { ?>
									<select class="form-control" id="model" name="model" data-model="<?= $model_val ?>" required>
										<?php
											if ( $totalModels > 0 ) {
												echo '<option>Seleccione un modelo</option>';
												foreach ($models as $key => $model) {
													$sel = ( $model_val == $model['id'] )? "selected" : "";
													echo '<option value="'.$model['id'].'" '.$sel.'>'.$model['name'].'</option>';
												}
											}else {
												echo '<option>No hay resultados</option>';
											}
										?>
									</select>
									<?php }else { ?>
									<select class="form-control" id="model" name="model" data-model="<?= $model_val ?>" required>
										<option>Seleccione una marca</option>
									</select>
									<?php } ?>
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button" id="addModel"><i class="fa fa-fw fa-plus-circle" aria-hidden="true"></i></button>
									 </span>
								</div>
							</div>
						</div>
					</div>
					<div id="addModelBlock">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Modelo:</label>
							<div class="col-sm-5">
						 		<input type="text" class="form-control" id="name" name="name" value="<?= $name_val ?>">
						 	</div>
						</div>
						<div class="form-group">
							<label for="year" class="col-sm-2 control-label">Año:</label>
							<div class="col-sm-5">
						 		<input type="number" class="form-control" id="year" name="year" value="<?= $year_val ?>">
						 	</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="button" class="btn btn-sm btn-block btn-primary" id="cancelAddModel">Cancelar</button>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="version" class="col-sm-2 control-label">Versión:</label>
						<div class="col-sm-5">
					 		<input type="text" class="form-control" id="version" name="version" value="<?= $version_val ?>" required>
					 	</div>
					</div>
					<div class="form-group">
						<label for="venta" class="col-sm-2 control-label">Precio de venta:</label>
						<div class="col-sm-5">
					 		<input type="number" class="form-control" id="venta" name="venta" value="<?= $venta_val ?>" required>
					 	</div>
					</div>
					<div class="form-group">
						<label for="compra" class="col-sm-2 control-label">Precio de compra:</label>
						<div class="col-sm-5">
					 		<input type="number" class="form-control" id="compra" name="compra" value="<?= $compra_val ?>" required>
					 	</div>
					</div>
					<div class="form-group">
						<label for="description" class="col-sm-2 control-label">Descripción:</label>
						<div class="col-sm-5">
							<textarea class="form-control" id="description" name="description" rows="3" required><?= $description_val ?></textarea>
					 	</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<div class="checkbox">
					 			<label>
					 				<input type="checkbox" name="status" <?= $status_val ?>> Activo
					 			</label>
					 		</div>
					 	</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<input type="hidden" name="id" value="<?= $id_val ?>">
							<button type="submit" name="save" class="btn btn-sm btn-primary">Guardar</button>
							<input type="hidden" name="addNewBrandInput" name="addNewBrandInput" value="no">
							<button type="button" class="btn btn-sm btn-primary" onclick="javascript:window.location='./'">Cancelar</button>
						</div>
					</div>
				</form>
				<hr>
			</div>
		</div>
	</div>
</main>