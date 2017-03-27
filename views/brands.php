<main>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="./">Inicio</a></li>
					<li class="active">Marcas</li>
				</ol>
				<hr>
				<?php if ( $total > 0 ) { ?>
				<table id="brands-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Marca</th>
							<th>Status</th>
							<th>Mdl</th>
							<th>Edt</th>
							<th>Del</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($brands as $key => $brand) {
								$clase = ( $brand['status'] == 0 )? "danger" : "";
						?>
						<tr class="<?= $clase ?>">
							<td><?= $brand['name'] ?></td>
							<td><?= $brand['status_name'] ?></td>
							<td>
								<a href="./models?brand=<?= $brand['id'] ?>" class="btn btn-xs btn-primary">
									<i class="fa fa-car" aria-hidden="true"></i>
								</a>
							</td>
							<td>
								<a href="./brand-edit?row=<?= $brand['id'] ?>" class="btn btn-xs btn-primary">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
							</td>
							<td>
								<a href="#" data-href="./brand-edit?del=<?= $brand['id'] ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-xs btn-primary">
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