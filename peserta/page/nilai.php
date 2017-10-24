<div class="container">
	<!-- Konten -->
	<div class="konten">
		<div class="kotak">
			
			<?php 
				require_once '../../php/mysql.php';
				$sql = "SELECT * FROM lomba WHERE lomba_id='".$_SESSION['peserta_id_lomba']."' ";
				$query = $mysql->query($sql);
				$row = $query->fetch_assoc();
			?>
			<h2>Nilai Peserta - <?php if (isset($_SESSION['peserta_id_lomba'])) { echo $row['lomba_nama']; } ?></h2>
			<table class="tb">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Peserta</th>
						<th>Nomor Peserta</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<?php 
					$no = 1;
					$sql = "SELECT * FROM nilai INNER JOIN peserta ON nilai.nilai_id_peserta=peserta.peserta_id INNER JOIN lomba ON nilai.nilai_id_lomba=lomba.lomba_id WHERE peserta_id_lomba='".$_SESSION['peserta_id_lomba']."' ";
					$query = $mysql->query($sql);
					while($row=$query->fetch_assoc()) {
				?>
				<tbody>
					<tr <?php if ($_SESSION['nama'] == $row['peserta_nama']) { ?> class="highlight" <?php } ?>>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row['peserta_nama']; ?></td>
						<td><?php echo $row['peserta_no']; ?></td>
						<td><?php echo $row['nilai_jml']; ?></td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
			<p>NB : Tabel yang berbeda warna adalah nilai Anda</p>

		</div>
	</div>
</div>