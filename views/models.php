<main>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="./">Inicio</a></li>
					<li class="active">Modelos</li>
				</ol>
				<hr>
				<?php if ( $total > 0 ) { ?>
				<table id="models-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Año</th>
							<th>Status</th>
							<th>Edt</th>
							<th>Del</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($models as $key => $model) {
								$clase = ( $model['status'] == 0 )? "danger" : "";
						?>
						<tr class="<?= $clase ?>">
							<td><?= $model['brand_name'] ?></td>
							<td><?= $model['name'] ?></td>
							<td><?= $model['year'] ?></td>
							<td><?= $model['status_name'] ?></td>
							<td>
								<a href="./model-edit?row=<?= $model['id'] ?>" class="btn btn-xs btn-primary">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
							</td>
							<td>
								<a href="#" data-href="./model-edit?del=<?= $model['id'] ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-xs btn-primary">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php }else { ?>
				<div class="alert alert-warning" role="alert">
					No hay registros que mostrar.
				</div>
				<?php } ?>
				<hr>
			</div>
		</div>
	</div>
</main>