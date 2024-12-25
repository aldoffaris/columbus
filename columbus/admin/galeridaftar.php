<section class="pcoded-main-container">
	<div class="pcoded-content">
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Data Galeri</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data Galeri</a></li>
						</ul>
						<br><br>
						<a class="btn btn-primary" href="index.php?halaman=galeritambah">Tambah Data Galeri</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Data Galeri</h5>
					</div>
					<div class="card-body table-border-style">
						<div class="table-responsive">
							<table class="table table-hover" id="tabel">
								<thead>
									<tr>
										<th>No</th>
										<th>Foto</th>
										<th>Deskripsi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; // Inisialisasi nomor
									$galeri = $koneksi->query("SELECT * FROM galeri");

									while ($data = $galeri->fetch_array()) {
									?>
										<tr>
											<td><?= $no++ ?></td> <!-- Nomor otomatis bertambah -->
											<td>
												<img src="../foto/<?= htmlspecialchars($data['foto']) ?>" width="100px" alt="Foto Galeri">
											</td>
											<td>
												<p><?= substr($data['deskripsi'], 0, 100) . '...'; ?></p>
											</td>
											<td>
												<a class="btn btn-warning" href="index.php?halaman=galeriedit&id=<?= $data['idgaleri']; ?>">Edit</a>
												<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="index.php?halaman=galerihapus&id=<?= $data['idgaleri']; ?>">Hapus</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>