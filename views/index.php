<main>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li class="active">Inicio</li>
				</ol>
				<hr>
				<?php if ( $total > 0 ) { ?>
				<table id="versions-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Año</th>
							<th>Version</th>
							<th>Descripción</th>
							<th>Precio<br>Venta</th>
							<th>Precio<br>Compra</th>
							<th>Status</th>
							<th>Edt</th>
							<th>Del</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($versions as $key => $version) {
								$clase = ( $version['status'] == 0 )? "danger" : "";
						?>
						<tr class="<?= $clase ?>">
							<td><?= $version['brand_name'] ?></td>
							<td><?= $version['model_name'] ?></td>
							<td><?= $version['year'] ?></td>
							<td><?= $version['name'] ?></td>
							<td><?= $version['description'] ?></td>
							<td class="text-right"><?= number_format($version['sale_price'], 2) ?></td>
							<td class="text-right"><?= number_format($version['purchase_price'], 2) ?></td>
							<td><?= $version['status_name'] ?></td>
							<td>
								<a href="./edit?row=<?= $version['id'] ?>" class="btn btn-xs btn-primary">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
							</td>
							<td>
								<a href="#" data-href="./edit?del=<?= $version['id'] ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-xs btn-primary">
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