<table class="table table-bordered" width="100%" cellspacing="0">
	<thead>
		<tr align="center">
			<th>ID Divisi</th>
			<th>Nama Divisi</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody id="data-divisi">
		<?php foreach($DaftarDivisi as $data => $rows) : ?>
		<tr>
			<td style="text-align: center; font-weight: bold;"><?php echo $rows['IDDivisi']; ?></td>
			<td><?php echo $rows['NamaDivisi']; ?></td>
			<td style="text-align: center;">
				<button type="button" data-id="biji kuda" class="btn btn-success btn-edit" style="cursor:pointer;"><i class="fa fa-pencil-square-o"></i> Ubah</button>
				<button type="button" class="btn btn-danger"><i class="fa fa-trash-o" style="cursor:pointer;"></i> Hapus</button>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>