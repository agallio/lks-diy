<?php
	require_once '../../php/mysql.php';
	$search = isset($_POST['search'])?$mysql->real_escape_string($_POST['search']):'';
	$sql = "SELECT * FROM nilai INNER JOIN peserta ON nilai.nilai_id_peserta=peserta.peserta_id INNER JOIN lomba ON nilai.nilai_id_lomba=lomba.lomba_id WHERE peserta_nama LIKE '%".$search."%' OR lomba_nama LIKE '%".$search."%' ";
	$query = $mysql->query($sql);
?>

<table class="tb">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Peserta</th>
			<th>Bidang Lomba</th>
			<th>Nilai</th>
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
			<td><?php echo $row['lomba_nama']; ?></td>
			<td><?php echo $row['nilai_jml']; ?></td>
			<td><a modal-toggle="mo-dnilai" data-id="<?php echo $row['nilai_id']; ?>" data-nama="<?php echo $row['peserta_id']; ?>" data-lomba="<?php echo $row['lomba_id']; ?>" data-nilai="<?php echo $row['nilai_jml']; ?>" class="btn btnp btndet" href="#">Detail</a></td>
		</tr>
	</tbody>
	<?php } ?>
</table>

<!-- Modal -->
<div class="modal mo-cnilai">
	<div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-h2">Tambah Data Nilai</h2>
		</div>
		<div class="modal-body">
			<div class="messages"></div>
			<form action="php/cnilai.php" method="POST" class="form" id="fcnilai">
				<select name="peserta" class="form-control" required>
					<option disabled selected>Pilih Nama Peserta</option>
					<?php
						$sql = "SELECT * FROM peserta WHERE peserta_id_lomba='".$_SESSION['lomba_id']."' ";
						$query = $mysql->query($sql);
						while ($row=$query->fetch_assoc()) {
					?>
					<option value="<?php echo $row['peserta_id']; ?>"><?php echo $row['peserta_nama']; ?></option>
					<?php } ?>
				</select>
				<select name="lomba" class="form-control" required>
					<option disabled selected>Pilih Bidang Lomba</option>
					<?php
						$sql = "SELECT * FROM lomba WHERE lomba_id='".$_SESSION['lomba_id']."' ";
						$query = $mysql->query($sql);
						while ($row = $query->fetch_assoc()) {
					?>
					<option selected value="<?php echo $row['lomba_id']; ?>"><?php echo $row['lomba_nama']; ?></option>
					<?php } ?>
				</select>
				<input type="number" class="form-control" name="nilai" placeholder="Masukan Nilai (0-100)" max="100" required>
				<button type="submit" class="btn btnp btn-block">Tambah</button>
			</form>
		</div>
	</div>
</div>

<div class="modal mo-dnilai">
	<div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-h2">Detail Data Nilai</h2>
		</div>
		<div class="modal-body">
			<div class="messages"></div>
			<form action="php/enilai.php" method="POST" class="form" id="fdnilai">
				<input type="hidden" name="id">
				<select name="peserta" class="form-control" disabled selected>
					<option disabled selected>Pilih Nama Peserta</option>
					<?php
						$sql = "SELECT * FROM peserta";
						$query = $mysql->query($sql);
						while ($row=$query->fetch_assoc()) {
					?>
					<option value="<?php echo $row['peserta_id']; ?>"><?php echo $row['peserta_nama']; ?></option>
					<?php } ?>
				</select>
				<select name="lomba" class="form-control" disabled selected>
					<option disabled selected>Pilih Bidang Lomba</option>
					<?php
						$sql = "SELECT * FROM lomba";
						$query = $mysql->query($sql);
						while ($row = $query->fetch_assoc()) {
					?>
					<option value="<?php echo $row['lomba_id']; ?>"><?php echo $row['lomba_nama']; ?></option>
					<?php } ?>
				</select>
				<input type="number" class="form-control" name="nilai" placeholder="Masukan Nilai (0-100)" max="100" required>
				<button type="submit" class="btn btnp btn-block">Ubah</button>
			</form>
			<button modal-toggle="mo-denilai" type="submit" class="btn btne btn-block">Hapus</button>
			<!-- Hapus -->
			<div class="modal mo-denilai">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-h2">Anda yakin akan menghapus data ini?</h2>
					</div>
					<div class="modal-body">
						<div class="messages messagesdel"></div>
						<form action="php/denilai.php" method="POST" class="form" id="fdenilai">
							<input type="hidden" name="id">
							<button type="submit" class="btn btne">Hapus</button>
							<a href="nilai" class="btn btnp">Kembali</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="../assets/js/admin.js"></script>