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
					<?php foreach ($ukuran as $key => $value): ?>
						<option value="<?php echo $value ?>"><?php echo $value ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col pr-0" style="margin: auto; font-size: 3vw;">
				/
			</div>
			<div class="col-3 pr-0">
				<select name="sisi" id="sisi" class="form-control custom" required="" style="font-size:9px!important;">
					<option value="">SISI</option>
					<?php foreach ($sisi as $key => $value): ?>
						<option value="<?php echo $value ?>"><?php echo $value ?></option>
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
		<div class="row">
			<div class="col">
				<select name="bahan" id="bahan" class="form-control custom" required="">
					<option value="">BAHAN</option>
					<?php foreach ($bahan as $key => $value): ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col">
				<select name="colour" id="colour" class="form-control custom" required="">
					<option value="">COLOUR</option>
					<?php foreach ($colour as $key => $value): ?>
						<option value="<?php echo $value ?>"><?php echo $value ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col">
				<select name="flipped" id="flipped" class="form-control custom" required="">
					<?php foreach ($flipped as $key => $value): ?>
						<option value="<?php echo $value ?>"><?php echo $value ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="col">
				<div class="form-inline mt-3 mb-3">
					<input autocomplete="off" type="checkbox" style="width: 30px;height: 5vw;" name="potong">
					<div class="text ml-2 font-weight-bold" style="font-size: 3vw; opacity: 0.7 ">
						POTONG
					</div>
				</div>
			</div>
		</div>
	</div>
	<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
		LANJUT
	</button>
</form>
<script>
	const produk = document.querySelector('#produk');
	produk.addEventListener('change',function(){
		produkChange();
	})
	function produkChange(){
		if(produk.validity.valueMissing){
			produk.setCustomValidity('silahkan pilih produk');
		}else{
			produk.setCustomValidity('');
		}
	}
	const bahan = document.querySelector('#bahan');
	bahan.addEventListener('change',function(){
		bahanChange();
	})
	function bahanChange(){
		if(bahan.validity.valueMissing){
			bahan.setCustomValidity('silahkan pilih bahan');
		}else{
			bahan.setCustomValidity('');
		}
	}
	const ukuran = document.querySelector('#ukuran');
	ukuran.addEventListener('change',function(){
		ukuranChange();
	})
	function ukuranChange(){
		if(ukuran.validity.valueMissing){
			ukuran.setCustomValidity('silahkan pilih ukuran');
		}else{
			ukuran.setCustomValidity('');
		}
	}
	const sisi = document.querySelector('#sisi');
	sisi.addEventListener('change',function(){
		sisiChange();
	})
	function sisiChange(){
		if(sisi.validity.valueMissing){
			sisi.setCustomValidity('silahkan pilih sisi');
		}else{
			sisi.setCustomValidity('');
		}
	}
	const colour = document.querySelector('#colour');
	colour.addEventListener('change',function(){
		colourChange();
	})
	function colourChange(){
		if(colour.validity.valueMissing){
			colour.setCustomValidity('silahkan pilih colour');
		}else{
			colour.setCustomValidity('');
		}
	}
	const flipped = document.querySelector('#flipped');
	flipped.addEventListener('change',function(){
		flippedChange();
	})
	function flippedChange(){
		if(flipped.validity.valueMissing){
			flipped.setCustomValidity('silahkan pilih flipped');
		}else{
			flipped.setCustomValidity('');
		}
	}
	const jumlah = document.querySelector('#jumlah');
	jumlah.addEventListener('keyup',function(){
		jumlahchange();
	})
	function jumlahchange(){
		if(jumlah.validity.valueMissing){
	        jumlah.setCustomValidity('JUMLAH TIDAK BOLEH KOSONG');
	    }else if(jumlah.validity.rangeUnderflow){
	        jumlah.setCustomValidity('JUMLAH MINIMAL 1');
	    }else{
	        jumlah.setCustomValidity('');
	    }
	}

	const submit = document.querySelector('#submit');
	submit.addEventListener('click',function(){
		produkChange();
		bahanChange();
		ukuranChange();
		sisiChange();
		colourChange();
		flippedChange();
		jumlahchange();
	})
</script>