<form action="<?php echo base_url('home/digital_print/confirmation_order/') ?>" method="get">
	<input type="hidden" name="digital_print_id" value="<?php echo $data['id'] ?>">
	<div class="form-group">
		<select name="produk" id="produk" class="form-control custom" required="">
			<option value="">NAMA PRODUK</option>
			<?php foreach ($produk as $key => $value): ?>
				<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-3 pr-0">
				<select name="ukuran" id="ukuran" class="form-control custom" required="" style="font-size:9px!important;">
					<option value="">UKURAN</option>
					<?php foreach ($produk as $key => $value): ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col pr-0" style="margin: auto; font-size: 3vw;">
				/
			</div>
			<div class="col-3 pr-0">
				<select name="sisi" id="sisi" class="form-control custom" required="" style="font-size:9px!important;">
					<option value="">SISI</option>
					<?php foreach ($produk as $key => $value): ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col pr-0" style="margin: auto; font-size: 3vw;">
				/
			</div>
			<div class="col-3 pl-0 pr-1">
				<input type="number" class="form-control custom" placeholder="JUMLAH" id="jumlah" name="jumlah" required min="1">
			</div>
			<div class="col pl-0" style="margin: auto; font-size: 3vw;">
				UNIT
			</div>
		</div>
	</div>
	<div class="form-group">
		<select name="bahan" id="bahan" class="form-control custom" required="">
			<option value="">BAHAN</option>
			<?php foreach ($bahan as $key => $value): ?>
				<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<select name="finishing" id="finishing" class="form-control custom" required="">
			<option value="">FINISHING</option>
			<?php foreach ($finishing as $key => $value): ?>
				<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-inline mt-3 mb-3">
		<input autocomplete="off" type="checkbox" style="width: 30px;height: 5vw;" name="include">
		<div class="text ml-2 font-weight-bold" style="font-size: 3vw; opacity: 0.7 ">
			INCLUDE ALAT
		</div>
	</div>
	<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
		LANJUT
	</button>
</form>