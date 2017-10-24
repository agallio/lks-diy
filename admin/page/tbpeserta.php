<?php
	require_once '../../php/mysql.php';
	$search = isset($_POST['search'])?$mysql->real_escape_string($_POST['search']):'';
	$sql = "SELECT *,lomba.lomba_id,lomba.lomba_nama FROM peserta LEFT JOIN lomba ON peserta.peserta_id_lomba=lomba.lomba_id WHERE peserta_nama LIKE '%".$search."%' OR peserta_no LIKE '%".$search."%' OR peserta_sekolah LIKE '%".$search."%' OR lomba_nama LIKE '%".$search."%' ";
	$query = $mysql->query($sql);
?>

<table class="tb">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Peserta</th>
			<th>Nomor Peserta</th>
			<th>Asal Sekolah</th>
			<th>Bidang Lomba</th>
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
			<td><?php echo $row['peserta_nama']; ?></td>
			<td><?php echo $row['peserta_no']; ?></td>
			<td><?php echo $row['peserta_sekolah']; ?></td>
			<td><?php echo $row['lomba_nama']; ?></td>
			<td><a modal-toggle="mo-dpeserta" data-id="<?php echo $row['peserta_id'] ?>" data-nama="<?php echo $row['peserta_nama']; ?>" data-no="<?php echo $row['peserta_no']; ?>" data-tgl="<?php echo date('d-m-Y',$row['peserta_tgl']) ?>" data-kls="<?php echo $row['peserta_kls']; ?>" data-sekolah="<?php echo $row['peserta_sekolah']; ?>" data-username="<?php echo $row['peserta_username']; ?>" data-lomba="<?php echo $row['lomba_id']; ?>" class="btn btnp btndet" href="#">Detail</a></td>
		</tr>
	</tbody>
	<?php } ?>
</table>

<!-- Modal -->
<div class="modal mo-dpeserta">
	<div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-h2">Detail Data Peserta</h2>
		</div>
		<div class="modal-body">
			<div class="messages"></div>
			<form action="php/epeserta.php" method="POST" class="form" id="fdpeserta">
				<input type="hidden" name="id">
				<input type="text" class="form-control" name="nama" placeholder="Nama Peserta" required>
				<input type="number" class="form-control" name="no" placeholder="Nomor Peserta (max = 999)" max="999" required>
				<input type="text" class="form-control" name="tgl" placeholder="Tanggal Lahir (DD-MM-YYYY)" required>
				<input type="text" class="form-control" name="sekolah" placeholder="Asal Sekolah" required>
				<input type="text" class="form-control" name="username" placeholder="Nama Pengguna" disabled>
				<select name="kelas" class="form-control" required>
					<option disabled selected>Pilih Kelas</option>
					<option value="10">X</option>
					<option value="11">XI</option>
					<option value="12">XII</option>
				</select>
				<select name="lomba" class="form-control" required>
					<option disabled selected>Pilih Bidang Lomba</option>
					<?php
						$sql = "SELECT * FROM lomba";
						$query = $mysql->query($sql);
						while ($row = $query->fetch_assoc()) {
					?>
					<option value="<?php echo $row['lomba_id']; ?>"><?php echo $row['lomba_nama']; ?></option>
					<?php } ?>
				</select>
				<button type="submit" class="btn btnp btn-block">Ubah</button>
			</form>
			<button modal-toggle="mo-depeserta" type="submit" class="btn btne btn-block">Hapus</button>
			<!-- Hapus -->
			<div class="modal mo-depeserta">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-h2">Anda yakin akan menghapus data ini?</h2>
					</div>
					<div class="modal-body">
						<div class="messages messagesdel"></div>
						<form action="php/depeserta.php" method="POST" class="form" id="fdepeserta">
							<input type="hidden" name="id">
							<button type="submit" class="btn btne">Hapus</button>
							<a href="peserta" class="btn btnp">Kembali</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="../assets/js/admin.js"></script>