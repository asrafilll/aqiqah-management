<div class="row">
	<div class="col-md-12">
		<label>Pilih Paket</label>
		<select name="jenis_paket" class="form-control">
			<option value="">Pilih</option>
			@foreach($jenis_paket as $jp)
			<option value="{{$jp->id}}" data-olahan_daging="{{$jp->is_olahan_daging}}" data-olahan_jeroan="{{$jp->is_olahan_jeroan}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->jenis_paket_id == $jp->id ? 'selected' : '') : ''}}>{{$jp->nama}}</option>
			@endforeach
		</select>
	</div>
	<div class="col-md-6" id="div-olahan_daging" style="display: none">
		<label>Olahan Daging</label>
		<select name="olahan_daging" class="form-control">

		</select>
	</div>
	<div class="col-md-6" id="div-olahan_jeroan" style="display: none;">
		<label>Olahan Jeroan</label>
		<select name="olahan_jeroan" class="form-control">

		</select>
	</div>
</div>
<div class="row">
	<div class="col-md-6" id="div-menu_pilihan1" style="display: none;">
		<label>Menu Pilihan</label>
		<select name="menu_pilihan1" class="form-control">

		</select>
	</div>
	<div class="col-md-6" id="div-menu_pilihan2" style="display: none;">
		<label>Menu Pilihan 2</label>
		<select name="menu_pilihan2" class="form-control">

		</select>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<label>Nasi</label>
		<select name="nasi" class="form-control">

		</select>
	</div>
</div>