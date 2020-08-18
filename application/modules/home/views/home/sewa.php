<style>
	.input{
    border-radius: 0.5rem!important;
    background-color: #bcbcbc!important;
    /*font-size: 4vw;*/
	}
	.select{
    border-radius: 0.5rem!important;
    width: 50%!important;
	}
</style>
<div class="container mt-5 pt-5">
	<h5 class="font-weight-bold mt-5 mb-4">FORM SEWA LOKASI</h5>
	<form action="" method="post">
		<div class="form-group">
			<label for="">Kota / Kabupaten</label>
			<input type="text" disabled class="form-control input" value="<?php echo $data['kota'] ?>">
		</div>
		<div class="form-group">
			<label for="">Nama Jalan</label>
			<input type="text" disabled class="form-control input" value="<?php echo $data['jalan'] ?>">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col">
					<label for="">Jenis</label>
					<input type="text" disabled class="form-control input" value="<?php echo $jenis[$data['jenis']] ?>">
				</div>
				<div class="col">
					<label for="">Dimensi</label>
					<input type="text" disabled class="form-control input" value="<?php echo $dimensi[$data['dimensi']] ?>">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col">
					<label for="">Ukuran</label>
					<input type="text" disabled class="form-control input" value="<?php echo $ukuran[$data['ukuran']] ?> Meter">
				</div>
				<div class="col">
					<label for="">Lightning</label>
					<input type="text" disabled class="form-control input" value="<?php echo $light[$data['light']] ?>">
				</div>
				<div class="col">
					<label for="">Sisi</label>
					<select name="" id="" class="form-control select">
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="">Mulai Tayang</label>
						<input type="date" id="dateTayang" class="form-control" value="<?php echo date('Y-m-d') ?>" style="border-radius: 0.5rem;width: 85%;">
					</div>
					<div class="form-group">
						<label for="">Selesai Tayang</label>
						<input type="date" id="selesaiTayang" readonly class="form-control" value="<?php echo date('Y-m-d',strtotime("+7 days")) ?>" style="border-radius: 0.5rem;width: 85%;">
					</div>
				</div>
				<div class="col">
					<label for="">Durasi</label>
					<select name="" id="durasi" class="form-control" style="border-radius: 0.5rem;">
						<?php foreach ($durasi as $key => $value): ?>
							<option value="<?php echo $key ?>"><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
		</div>
	</form>
</div>