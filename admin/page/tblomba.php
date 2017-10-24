<?php
	require_once '../../php/mysql.php';
	$search = isset($_POST['search'])?$mysql->real_escape_string($_POST['search']):'';
	$sql = "SELECT * FROM lomba WHERE lomba_nama LIKE '%".$search."%' ";
	$query = $mysql->query($sql);
?>

<table class="tb">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Bidang Lomba</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<?php 
		$no = 1;
		while($row=$query->fetch_assoc()) {
	?>
	<tbody>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row['lomba_nama']; ?></td>
			<td><a modal-toggle="mo-dlomba" data-id="<?php echo $row['lomba_id'] ?>" data-nama="<?php echo $row['lomba_nama']; ?>" class="btn btnp btndet" href="#">Detail</a></td>
		</tr>
	</tbody>
	<?php } ?>
</table>

<!-- Modal -->
<div class="modal mo-clomba">
	<div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-h2">Tambah Data Lomba</h2>
		</div>
		<div class="modal-body">
			<div class="messages"></div>
			<form action="php/clomba.php" method="POST" class="form" id="fclomba">
				<input type="text" class="form-control" name="lomba_nama" placeholder="Nama Lomba" required>
				<button type="submit" class="btn btnp btn-block">Tambah</button>
			</form>
		</div>
	</div>
</div>

<div class="modal mo-dlomba">
	<div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-h2">Detail Data Lomba</h2>
		</div>
		<div class="modal-body">
			<div class="messages"></div>
			<form action="php/elomba.php" method="POST" class="form" id="fdlomba">
				<input type="hidden" name="id">
				<input type="text" class="form-control" name="lomba_nama" placeholder="Nama Lomba" required>
				<button type="submit" class="btn btnp btn-block">Ubah</button>
			</form>
			<button modal-toggle="mo-delomba" type="submit" class="btn btne btn-block">Hapus</button>
			<!-- Hapus -->
			<div class="modal mo-delomba">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-h2">Anda yakin akan menghapus data ini?</h2>
					</div>
					<div class="modal-body">
						<div class="messages messagesdel"></div>
						<form action="php/delomba.php" method="POST" class="form" id="fdelomba">
							<input type="hidden" name="id">
							<button type="submit" class="btn btne">Hapus</button>
							<a href="lomba" class="btn btnp">Kembali</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="../assets/js/admin.js"></script>