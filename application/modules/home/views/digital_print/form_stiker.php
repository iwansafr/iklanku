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
				<input type="number" class="form-control custom" id="width" name="width" placeholder="WIDTH" required min="1">
			</div>
			<div class="col-3 pr-0">
				<input type="number" class="form-control custom" id="height" name="height" placeholder="HEIGHT" required min="1">
			</div>
			<div class="col pr-0" style="margin: auto; font-size: 3vw;">
				CM /
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
	<button class="btn btn-sm btn-primary btn-lg" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
		LANJUT
	</button>
</form>
<script>
	const produk = document.querySelector('#produk');
	const bahan = document.querySelector('#bahan');
	const width = document.querySelector('#width');
	const height = document.querySelector('#height');
	const jumlah = document.querySelector('#jumlah');
	const submit = document.querySelector('#submit');

	submit.addEventListener('click',function(){
		produkchange();
		bahanchange();
		widthchange();
		heightchange();
		jumlahchange();
	});

	produk.addEventListener('change',function(){
		produkchange();
	})
	function produkchange(){
		if(produk.validity.valueMissing){
        	produk.setCustomValidity('SILAHKAN PILIH PRODUK');
	    }else{
	        produk.setCustomValidity('');
	    }
	}

	bahan.addEventListener('change',function(){
		bahanchange();
	})
	function bahanchange(){
		if(bahan.validity.valueMissing){
	        bahan.setCustomValidity('SILAHKAN PILIH BAHAN');
	    }else{
	        bahan.setCustomValidity('');
	    }
	}

	width.addEventListener('keyup',function(){
		widthchange();
	})
	function widthchange(){
		if(width.validity.valueMissing){
	        width.setCustomValidity('WIDTH TIDAK BOLEH KOSONG');
	    }else if(width.validity.rangeUnderflow){
	        width.setCustomValidity('WIDTH MINIMAL 1');
	    }else{
	        width.setCustomValidity('');
	    }
	}

	height.addEventListener('keyup',function(){
		heightchange();
	})
	function heightchange(){
		if(height.validity.valueMissing){
	        height.setCustomValidity('HEIGHT TIDAK BOLEH KOSONG');
	    }else if(height.validity.rangeUnderflow){
	        height.setCustomValidity('HEIGHT MINIMAL 1');
	    }else{
	        height.setCustomValidity('');
	    }
	}

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
</script>