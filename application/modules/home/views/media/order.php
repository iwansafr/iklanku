<style>
	.input{
    border-radius: 0.5rem!important;
    background-color: #bcbcbc!important;
    font-size: 3vw;
	}
	.form-control{
		font-size: 3vw!important;
	}
	.select{
    border-radius: 0.5rem!important;
	}
</style>
<div class="container mt-5 pt-5 " id="pageSewa">
	<h5 class="font-weight-bold mt-5 mb-4">FORM PENGAJUAN IKLAN</h5>
	<?php if (!empty($data) && $data['tipe'] == 1): ?>
		<div class="form-group">
			<label for="">Nama</label>
			<input type="text" disabled class="form-control input" value="<?php echo $data['nama'] ?>">
		</div>
		<div class="form-group">
			<label for="">Alamat</label>
			<input type="text" disabled class="form-control input" value="<?php echo $data['alamat'] ?>">
		</div>
		<?php if ($data['tipe'] == 1): ?>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<div class="justify-content-center d-none" id="order_loading" style="height: 100%; position: fixed;padding-left:45%;padding-right: 50%;z-index: 9999;">
						  <div class="spinner-border" role="status">
						    <span class="sr-only">Loading...</span>
						  </div>
						</div>
						<a href="#" data-toggle="modal" data-target="#sosmedModal" class="btn btn-sm btn-primary" style="border-radius: 1.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
							<i class="fa fa-plus"></i> Tambah Jam Tayang
						</a>
						<form action="" id="jam_form" method="post">
							<div class="modal fade" id="sosmedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<div class="row">
												<div class="col">
													<div class="form-group">
														<label for="">Tayang Pukul</label>
														<select name="jam_tayang" id="jam_tayang" class='form-control'>
															<?php for($i=1;$i<25;$i++):?>
																<?php if (!empty($jam_tayang)): ?>
																	<?php if (!in_array($i,$jam_tayang)): ?>
																		<option value="<?php echo $i;?>"><?php echo $i<10 ? '0' : '' ;?><?php echo $i;?>.00</option>
																	<?php endif ?>
																<?php else: ?>
																	<option value="<?php echo $i;?>"><?php echo $i<10 ? '0' : '' ;?><?php echo $i;?>.00</option>
																<?php endif ?>
															<?php endfor ?>
														</select>
													</div>
												</div>
											</div>
							      </div>
							      <div class="modal-footer">
							        <button class="btn btn-sm btn-primary">Tambah</button>
							      </div>
							    </div>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col">
						<?php if (!empty($jam_tayang)): ?>
							<div class="bg-white" style="border-radius: 1rem;">
								<table class="table">
										<?php ksort($jam_tayang); ?>
										<?php $i = 1; ?>
										<form action="" method="post" id="jam_del">
											<?php foreach ($jam_tayang as $value): ?>
												<tr>
													<td><?php echo $i++; ?></td>
													<td>Jam</td>
													<td>: <?php echo $value < 10 ? '0' : ''; ?><?php echo $value;?>.00</td>
													<td>
															<button type="submit" class="btn btn-sm btn-danger">
																<input type="hidden" name="del_jam_tayang" value="<?php echo $value;?>">
																<i class="fa fa-trash"></i>
															</button>
													</td>
												</tr>
											<?php endforeach ?>
										</form>
								</table>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		<?php elseif ($data['tipe'] == 2): ?>
		  <div class="form-group">
		   	<div class="row">
		   		<div class="col">
		   			<div class="form-group">
		   				<label for="tipe">Tipe Iklan</label>
		   				<select name="tipe_iklan" class="form-control" id="tipeIklan">
		   					<option value="1">Text</option>
		   					<option value="2">Gambar</option>
		   				</select>
		   			</div>
		   		</div>
		   		<div class="col">
		   			<div class="form-group">
		   				<label for="jumlah tayang">Jumlah Tayang</label>
		   				<input type="number" class='form-control' name="jml_tayang">
		   			</div>
		   		</div>
		   	</div>
		  </div>
		<?php endif ?>
		<form action="" method="post" id="formSewa">
			<div class="form-group">
				<div id="dataSewa">
					<input type="hidden" name="media_id" value="<?php echo $data['id'] ?>">
					<input type="hidden" name="nama_media" value="<?php echo $data['nama'] ?>">
					<input type="hidden" name="alamat_media" value="<?php echo $data['alamat'] ?>">
					<?php $user = $_SESSION[base_url().'_logged_in']; ?>
					<?php if (!empty($user['username'])): ?>
						<input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
						<input type="hidden" name="username" value="<?php echo $user['username'] ?>">
						<input type="hidden" name="role" value="<?php echo $user['role'] ?>">
						<input type="hidden" name="email" value="<?php echo $user['email'] ?>">
						<input type="hidden" name="hp" value="<?php echo $user['phone'] ?>">
					<?php else: ?>
						<?php 
						redirect(base_url()) 
						?>
					<?php endif ?>
				</div>
				<?php if (!empty($jam_tayang) && $data['tipe'] == 1): ?>
					<?php $total_tarif = count($jam_tayang)*$data['tarif']; ?>
					<input type="hidden" name="biaya" value="<?php echo $total_tarif ?>">
					<?php 
					$jam_text = '';
					foreach ($jam_tayang as $value) {
						$jam_text .= $value < 10 ? '0'.$value.'.00, ' : $value.'.00, ';
					}
					?>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="durasi">Durasi</label>
								<input type="number" required class="form-control" name="durasi" placeholder="detik">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="tarif">Tarif</label>
								<input type="text" class="form-control" readonly value="Rp. <?php echo number_format($total_tarif,0,',','.');?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="judul">Judul Iklan</label>
								<input type="text" name="judul" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="isi">Isi Iklan</label>
								<textarea type="text" name="isi" class="form-control" required></textarea>
							</div>
						</div>
					</div>
					<input type="hidden" name="jam_tayang" value="<?php echo substr_replace($jam_text,'',-2);?>">
					<button class="btn btn-sm btn-primary btn-lg" style="border-radius: 1.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
						SELESAI
					</button>
				<?php endif ?>
			</div>
		</form>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>
<script>
	let formSewa = document.getElementById('formSewa');
	let jam_form = document.getElementById('jam_form');
	let jam_del = document.getElementById('jam_del');
	let loading = document.getElementById('order_loading');
	// formSewa.addEventListener('submit',function(e){
	// 	loading.classList.remove('d-none');
	// 	// pageSewa.append('Sedang Mengirim Data ...');
	// 	// setInterval(function(){
	// 	// 	console.log('ok');
	// 	// 	pageSewa.append('.');
	// 	// }, 100);
	// });
	jam_form.addEventListener('submit',function(e){
		loading.classList.remove('d-none');
		e.preventDefault;
	});
	if(jam_del!=null){
		jam_del.addEventListener('submit',function(e){
			loading.classList.remove('d-none');
			e.preventDefault;
		});
	}
	if(formSewa!=null){
		formSewa.addEventListener('submit',function(e){
			loading.classList.remove('d-none');
			e.preventDefault;
		});
	}
</script>