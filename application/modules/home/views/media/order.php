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
	<?php if (!empty($data)): ?>
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
				<?php elseif($data['tipe'] == 2): ?>
					<div class="form-group">
				   	<div class="row">
				   		<div class="col">
				   			<div class="form-group">
				   				<label for="tipe">Tipe Iklan</label>
				   				<select name="tipe_iklan" class="form-control" id="tipeIklan">
				   					<option value="1">Text</option>
				   					<option value="2">Graphic</option>
				   				</select>
				   			</div>
				   		</div>
				   	</div>
				   	<div class="row" id="bariskolom">
				   		<div class="col">
				   			<div class="form-group">
				   				<label for="tipe">Baris X Kolom</label>
				   				<select class="form-control" id="baris_kolom">
				   					<option value="1">1x1</option>
				   					<option value="2">1x2</option>
				   					<option value="3">2x2</option>
				   				</select>
				   				<div id="bariskolomvalue">
				   					<input type="hidden" name="baris" value="1">
										<input type="hidden" name="kolom" value="1">
				   				</div>
				   			</div>
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col">
				   			<div class="form-group">
				   				<label for="biaya">biaya</label>
				   				<input type="text" readonly class="form-control" id="biaya" value="Rp <?php echo number_format($data['tarif'],0,',','.');?>">
				   			</div>
				   		</div>
				   	</div>
				   	<div class="row">
				   		<div class="col">
				   			<label for="isi">Isi Iklan</label>
				   			<textarea name="isi" id="isiIklan" cols="30" rows="5" class="form-control" required oninvalid="this.setCustomValidity('Isi iklan tidak boleh kosong')" oninput="this.setCustomValidity('')"></textarea>
				   		</div>
				   	</div>
				   	<hr>
				  </div>
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
	function formatMoney(number, decPlaces, decSep, thouSep) {
		decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
		decSep = typeof decSep === "undefined" ? "." : decSep;
		thouSep = typeof thouSep === "undefined" ? "," : thouSep;
		var sign = number < 0 ? "-" : "";
		var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
		var j = (j = i.length) > 3 ? j % 3 : 0;

		return sign +
			(j ? i.substr(0, j) + thouSep : "") +
			i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
			(decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
	}
	let harga = <?php echo $data['tarif'];?>;
	function iklantext(){
		let harga = <?php echo $data['tarif'];?>;
		let baris_kolom = document.getElementById('baris_kolom');
		let bariskolomvalue = document.getElementById('bariskolomvalue');
		document.getElementById('biaya').value = 'Rp '+formatMoney(harga*1,0,',','.');
		if(baris_kolom != null){
			baris_kolom.addEventListener('change',function(e){
				if(this.value == 1){
					let label_harga = formatMoney(harga*1,0,',','.');
					document.getElementById('biaya').value = 'Rp '+label_harga;
					bariskolomvalue.innerHTML = `
						<input type="hidden" name="baris" value="1">
						<input type="hidden" name="kolom" value="1">
					`;
				}else if(this.value == 2){
					let label_harga = formatMoney(harga*2,0,',','.');
					document.getElementById('biaya').value = 'Rp '+label_harga;
					bariskolomvalue.innerHTML = `
						<input type="hidden" name="baris" value="1">
						<input type="hidden" name="kolom" value="2">
					`;
				}else if(this.value == 3){
					let label_harga = formatMoney(harga*4,0,',','.');
					document.getElementById('biaya').value = 'Rp '+label_harga;
					bariskolomvalue.innerHTML = `
						<input type="hidden" name="baris" value="2">
						<input type="hidden" name="kolom" value="2">
					`;
				}
			});
		}
	}
	function iklangraphic()
	{
		let harga = <?php echo $data['tarif'];?>;
		let baris = document.getElementById('baris');
		let kolom = document.getElementById('kolom');
		let bariskolomvalue = document.getElementById('bariskolomvalue');
		baris.addEventListener('keyup',function(e){
			let label_harga = formatMoney(harga*baris.value*kolom.value,0,',','.');
			document.getElementById('biaya').value = 'Rp '+label_harga;
			bariskolomvalue.innerHTML = `
						<input type="hidden" name="baris" value="${baris.value}">
						<input type="hidden" name="kolom" value="${kolom.value}">
					`;
		});
		kolom.addEventListener('keyup',function(e){
			let label_harga = formatMoney(harga*baris.value*kolom.value,0,',','.');
			document.getElementById('biaya').value = 'Rp '+label_harga;
			bariskolomvalue.innerHTML = `
						<input type="hidden" name="baris" value="${baris.value}">
						<input type="hidden" name="kolom" value="${kolom.value}">
					`;
		})

	}
	let formSewa = document.getElementById('formSewa');
	let jam_form = document.getElementById('jam_form');
	let jam_del = document.getElementById('jam_del');
	let loading = document.getElementById('order_loading');
	let tipeIklan = document.getElementById('tipeIklan');
	let bariskolom = document.getElementById('bariskolom');
	let isiIklan = document.getElementById('isiIklan');
	iklantext();
	if(tipeIklan != null){
		tipeIklan.addEventListener('change', function(e){
			if(this.value == 1){
				bariskolom.innerHTML = `
					<div class="col">
		   			<div class="form-group">
		   				<label for="tipe">Baris X Kolom</label>
		   				<select class="form-control" id="baris_kolom">
		   					<option value="1">1x1</option>
		   					<option value="2">1x2</option>
		   					<option value="3">2x2</option>
		   				</select>
		   			</div>
		   		</div>
		   		<div id="bariskolomvalue">
   					<input type="hidden" name="baris" value="1">
						<input type="hidden" name="kolom" value="1">
   				</div>
				`;
				iklantext();
			}else{
				document.getElementById('biaya').value = '';

				bariskolom.innerHTML = `
					<div class="col">
		   			<div class="form-group">
		   				<label for="tipe">Baris</label>
		   				<input type="number" min="3" id="baris" required class="form-control" name="baris" oninvalid="this.setCustomValidity('nilai baris harus lebih dari 2')" oninput="this.setCustomValidity('')">
		   			</div>
		   		</div>
		   		<div class="col">
		   			<div class="form-group">
		   				<label for="tipe">Kolom</label>
		   				<input type="number" min="3" id="kolom" required id="kolom" class="form-control" name="kolom" oninvalid="this.setCustomValidity('nilai kolom harus lebih dari 2')" oninput="this.setCustomValidity('')">
		   			</div>
		   		</div>
		   		<div id="bariskolomvalue">
   					<input type="hidden" name="baris" value="3">
						<input type="hidden" name="kolom" value="3">
   				</div>
				`;
				iklangraphic();
			}
		})
	}
	// formSewa.addEventListener('submit',function(e){
	// 	loading.classList.remove('d-none');
	// 	// pageSewa.append('Sedang Mengirim Data ...');
	// 	// setInterval(function(){
	// 	// 	console.log('ok');
	// 	// 	pageSewa.append('.');
	// 	// }, 100);
	// });
	if(jam_form != null){
		jam_form.addEventListener('submit',function(e){
			loading.classList.remove('d-none');
			e.preventDefault;
		});
	}
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