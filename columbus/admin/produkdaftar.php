<section class="pcoded-main-container">
	<div class="pcoded-content">
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Data Produk</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data Produk</a></li>
						</ul>
						<br><br>
						<a class="btn btn-primary" href="index.php?halaman=produktambah">Tambah Data Produk</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Data Produk</h5>
					</div>
					<div class="card-body table-border-style">
						<div class="table-responsive">
							<table class="table table-hover" id="tabel">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Foto</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; // Inisialisasi nomor
									$produk = $koneksi->query("SELECT * FROM produk");

									while ($data = $produk->fetch_array()) {
									?>
										<tr>
											<td><?= $no++ ?></td> <!-- Nomor otomatis bertambah -->
											<td><?= $data['namaproduk'] ?></td>
											<td><?= $data['hargaproduk'] ?></td>
											<td>
												<img src="../foto/<?= htmlspecialchars($data['foto']) ?>" width="100px" alt="Foto produk">
											</td>
											<td>
												<a class="btn btn-warning" href="index.php?halaman=produkedit&id=<?= $data['idproduk']; ?>">Edit</a>
												<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="index.php?halaman=produkhapus&id=<?= $data['idproduk']; ?>">Hapus</a>
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