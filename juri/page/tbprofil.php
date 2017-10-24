<?php
	require_once '../../php/mysql.php';
	$search = isset($_POST['search'])?$mysql->real_escape_string($_POST['search']):'';
	$sql = "SELECT * FROM juri LEFT JOIN lomba ON juri.juri_id_lomba=lomba.lomba_id WHERE juri_nama LIKE '%".$search."%' OR lomba_nama LIKE '%".$search."%' ";
	$query = $mysql->query($sql);
?>

<table class="tb">
	<thead>
		<tr>
			<th>Nama Juri</th>
			<th>Nama Pengguna</th>
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
			<td><?php echo $row['juri_nama']; ?></td>
			<td><?php echo $row['juri_username']; ?></td>
			<td><?php echo $row['lomba_nama']; ?></td>
			<td><a modal-toggle="mo-djuri" data-id="<?php echo $row['juri_id'] ?>" data-nama="<?php echo $row['juri_nama']; ?>" data-username="<?php echo $row['juri_username']; ?>" data-lomba="<?php echo $row['juri_id_lomba']; ?>" class="btn btnp btndet" href="#">Detail</a></td>
		</tr>
	</tbody>
	<?php } ?>
</table>

<!-- Modal -->
<div class="modal mo-djuri">
	<div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-h2">Detail Profil</h2>
		</div>
		<div class="modal-body">
			<div class="messages"></div>
			<form action="php/ejuri.php" method="POST" class="form" id="fdjuri">
				<input type="hidden" name="id">
				<input type="text" class="form-control" name="juri_nama" placeholder="Nama Juri" required>
				<input type="text" class="form-control" name="juri_username" placeholder="Nama Pengguna" required>
				<select disabled name="lomba" class="form-control">
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
			<button modal-toggle="mo-epjuri" type="submit" class="btn btne btn-block">Ubah Kata Sandi</button>
			<!-- Edit Password -->
			<div class="modal mo-epjuri">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-h2">Ubah Kata Sandi</h2>
					</div>
					<div class="modal-body">
						<div class="messages messagesdel"></div>
						<form action="php/epjuri.php" method="POST" class="form" id="fepjuri">
							<input type="hidden" name="id">
							<input type="password" class="form-control" name="oldpassword" placeholder="Kata Sandi Lama" pattern=".{8,}" title="Min 8 Huruf" required>
							<input type="password" class="form-control" name="password" placeholder="Kata Sandi Baru" pattern=".{8,}" title="Min 8 Huruf" required>
							<input type="password" class="form-control" name="cpassword" placeholder="Ulangi Kata Sandi Baru" pattern=".{8,}" title="Min 8 Huruf" required>
							<button type="submit" class="btn btnp">Ubah</button>
							<a href="profil" class="btn btne">Kembali</a>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<script src="../assets/js/juri.js"></script>