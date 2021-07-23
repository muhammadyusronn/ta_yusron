		<!-- partial -->
		<?php
		$current_year = date('Y');
		$current_month = date('m');
		$arrNamaBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
		?>
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<?php echo $this->session->flashdata('msg'); ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h3>Sistem Pendukung Keputusan Evaluasi Kinerja Pegawai</h3>
									<div class="row">
										<div class="col-md-10 mx-auto">
											<ul class="nav nav-pills nav-pills-custom" id="pills-tab-custom" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#data-penilaian" role="tab" aria-controls="pills-home" aria-selected="true">
														Home
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#penilaian" role="tab" aria-controls="pills-profile" aria-selected="false">
														Penilaian
													</a>
												</li>
												<!-- <li class="nav-item">
													<a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
														Music
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-vibes-tab-custom" data-toggle="pill" href="#pills-vibes" role="tab" aria-controls="pills-contact" aria-selected="false">
														Vibes
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-energy-tab-custom" data-toggle="pill" href="#pills-energy" role="tab" aria-controls="pills-contact" aria-selected="false">
														Energy
													</a>
												</li> -->
											</ul>
											<div class="tab-content tab-content-custom-pill" id="pills-tabContent-custom">
												<div class="tab-pane fade show active" id="data-penilaian" role="tabpanel" aria-labelledby="pills-home-tab-custom">
													<form class="cmxform" id="kriteria-create" method="post" action="<?= base_url('evaluasi/result'); ?>">
														<fieldset>
															<div class="form-group">
																<label for="periode_bulan">Periode Bulan</label>
																<select id="periode_bulan" class="form-control" name="periode_bulan" required>
																	<option selected disabled>Pilih periode bulan</option>
																	<?php for ($i = 1; $i <= 12; $i++) { ?>
																		<option value="<?= $i ?>"><?php if ($i > 9) {
																										echo $arrNamaBulan[$i];
																									} else {
																										echo $arrNamaBulan['0' . $i];
																									} ?></option>

																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label for="periode_tahun">Periode Tahun</label>
																<select id="periode_tahun" class="form-control" name="periode_tahun">
																	<option disabled selected>Pilih Periode Tahun</option>
																	<?php for ($i = $current_year - 5; $i <= $current_year + 5; $i++) { ?>
																		<option value="<?= $i ?>"><?= $i ?></option>
																	<?php } ?>
																</select>
															</div>
															<!-- <div class="form-group">
																<label for="departement_id">Departemen</label>
																<select id="departement_id" class="form-control" name="departement_id">
																	<option value="0" selected>Semua Departemen</option>
																	<?php foreach ($data_departement as $x) : ?>
																		<option value="<?= $x->id_departement ?>"><?= $x->namadepartement ?></option>
																	<?php endforeach ?>
																</select>
															</div> -->
															<input class="btn btn-primary" type="submit" value="LIHAT HASIL EVALUASI">
														</fieldset>
													</form>
												</div>
												<div class="tab-pane fade" id="penilaian" role="tabpanel" aria-labelledby="pills-profile-tab-custom">
													<div class="media">
														<div class="media-body">
															<div class="row">
																<div class="col-lg-12">
																	<?php if (count($data_pegawai) == 0) { ?>
																		<h3>Anda sudah melakukan evaluasi periode bulan <?= $arrNamaBulan[$current_month] ?> tahun <?= $current_year ?></h3>
																		<a href="<?= base_url() ?>" class="btn btn-primary"><i class="fas fa-envelope"></i> Broadcast Hasil Evaluasi</a>
																	<?php } else {
																	?>
																		<form class="cmxform" id="jabatan-create" method="post" action="<?= base_url('evaluasi/save') ?>">
																			<fieldset>
																				<div class="form-group row">
																					<div class="col">
																						<label for="periode_bulan">Priode Bulan</label>
																						<input id="periode_bulan_text" value="<?= $arrNamaBulan[$current_month] ?>" class="form-control" name="periode_bulan_text" readonly>
																						<input type="hidden" id="periode_bulan" value="<?= $current_month ?>" class="form-control" name="periode_bulan" readonly>
																					</div>
																					<div class="col">
																						<label for="periode_tahun">Priode Tahun</label>
																						<input id="periode_tahun" value="<?= $current_year ?>" class="form-control" name="periode_tahun" readonly>
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="pegawai_id">Nama Pegawai</label>
																					<select id="pegawai_id" class="form-control" name="pegawai_id">
																						<?php foreach ($data_pegawai as $i) : ?>
																							<option value="<?= $i->id_pegawai ?>"><?= $i->nama; ?></option>
																						<?php endforeach; ?>
																					</select>
																				</div>
																			</fieldset>
																			<h4>Formulir Penilaian</h4>
																			<div class="table-responsive pt-3">
																				<table class="table table-bordered">
																					<thead>
																						<tr>
																							<th>#</th>
																							<th>Pernyataan</th>
																							<th>Sifat</th>
																							<th>Jawaban</th>
																						</tr>
																					</thead>
																					<tbody>
																						<?php
																						$no = 1;
																						foreach ($data_kriteria as $i) : ?>
																							<tr>
																								<td><?= $no++; ?></td>
																								<td>
																									<?= $i->kriteria_nama; ?>
																									<input type="hidden" name="kriteria_id[]" value="<?= $i->kriteria_id ?>" readonly>
																								</td>
																								<td><?= $i->namakategori; ?></td>
																								<td>
																									<div class="form-group">
																										<select class="form-control" name="jawaban[]">
																											<option value="1">Sangat Tidak Setuju</option>
																											<option value="2">Tidak Setuju</option>
																											<option value="3" selected>Netral</option>
																											<option value="4">Setuju</option>
																											<option value="5">Sangat Setuju</option>
																										</select>
																									</div>
																								</td>
																							</tr>
																						<?php endforeach; ?>
																					</tbody>
																				</table>
																			</div>
																			<div class="mt-4">
																				<input class="btn btn-primary" type="submit" value="Submit">
																			</div>
																		</form>
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
													<div class="media">
														<img class="mr-3 w-25 rounded" src="<?= base_url('assets/') ?>images/samples/300x300/14.jpg" alt="sample image">
														<div class="media-body">
															<p>
																I'm really more an apartment person. This man is a knight in shining armor. Oh I beg to differ,
																I think we have a lot to discuss. After all, you are a client. You all right, Dexter?
															</p>
															<p>
																I'm generally confused most of the time. Cops, another community I'm not part of. You're a killer.
																I catch killers. Hello, Dexter Morgan.
															</p>
														</div>
													</div>
												</div> -->
												<!-- <div class="tab-pane fade" id="pills-vibes" role="tabpanel" aria-labelledby="pills-vibes-tab-custom">
													<div class="media">
														<img class="mr-3 w-25 rounded" src="<?= base_url('assets/') ?>images/samples/300x300/15.jpg" alt="sample image">
														<div class="media-body">
															<p>
																This man is a knight in shining armor. I feel like a jigsaw puzzle missing a piece. And I'm not
																even sure what the picture should be. Somehow, I doubt that. You have a good heart, Dexter. Keep your mind limber.
															</p>
														</div>
													</div>
												</div> -->
												<!-- <div class="tab-pane fade" id="pills-energy" role="tabpanel" aria-labelledby="pills-energy-tab-custom">
													<div class="media">
														<img class="mr-3 w-25 rounded" src="<?= base_url('assets/') ?>images/samples/300x300/11.jpg" alt="sample image">
														<div class="media-body">
															<p>
																Finding a needle in a haystack isn't hard when every straw is computerized. You're a killer. I catch killers.
																I will not kill my sister. I will not kill my sister. I will not kill my sister. Rorschach would say you have a hard time relating to others.
															</p>
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->