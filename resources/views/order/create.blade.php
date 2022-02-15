@extends('layouts.template')
@section('order', 'active')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3>Haloo, {{\Auth::user()->name}}</h3>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary card-outline card-tabs">
				<div class="card-header p-0 pt-1 border-bottom-0">
					<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="pill" href="#tab-leads" role="tab">Data Leads</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="pill" href="#tab-customer-information" role="tab">Customer Information</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" data-toggle="pill" href="#tab-order-detail" role="tab">Order Information</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="pill" href="#tab-pilihan" role="tab">Pilihan Menu</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="custom-tabs-three-tabContent">
						<div class="tab-pane fade" id="tab-leads" role="tabpanel">
							<div class="col-md-12">
								<form action="{{route('order.store')}}" method="POST" id="form-store-order" enctype="multipart/form-data">
									@csrf
									<input type="hidden" value="{{isset($data) ? $data->id : null}}" name="order_id">
									<div class="card">
										<div class="card-body">
											<div class="row">
												Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quos dolore, quisquam. Voluptatum cum ipsam unde laudantium, ad quis fugit similique totam officiis atque nostrum iure provident eaque nesciunt repellat ullam?
												<div class="col-md-6">
													<label>Nama Customer</label>
													<input type="text" class="form-control" placeholder="Nama Customer" name="nama_customer" value="{{isset($data) ? $data->nama_customer : ''}}">
												</div>
												<div class="col-md-6">
													<label>No. Telpon</label>
													<input type="number" class="form-control" placeholder="No. Telpon" name="no_telp" value="{{isset($data) ? $data->no_telp : ''}}">
												</div>
												<div class="col-md-6">
													<label>Source Order</label>
													<select name="source_order" class="form-control">
														<option value="">Pilih</option>
														@foreach($source as $c)
														<option value="{{$c}}" {{isset($data) ? ($data->source_order == $c ? 'selected' : '') : ''}}>{{$c}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-sm float-right">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-customer-information" role="tabpanel">
							<div class="col-md-12">
								<form action="{{route('order.store-customer-information')}}" method="POST" id="form-customer-information">
									@csrf
									<input type="hidden" value="{{isset($data) ? $data->id : null}}" name="order_id">
									<div class="card">
										<div class="card-body">
											<div class="row">
												Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quos dolore, quisquam. Voluptatum cum ipsam unde laudantium, ad quis fugit similique totam officiis atque nostrum iure provident eaque nesciunt repellat ullam?
												<div class="col-md-4">
													<label>Nama Sohibul Aqiqah</label>
													<input type="text" class="form-control" placeholder="Nama Sohibul Aqiqah" name="nama_sohilbul_aqiqah" value="{{isset($data) && $data->custInformation ? ($data->custInformation->nama_sohilbul_aqiqah ?? '') : ''}}">
												</div>
												<div class="col-md-2">
													<label>Jenis Kelamin</label>
													<select name="gender_sohilbul_aqiqah" class="form-control">
														<?php $gender = ['Pria', 'Wanita']; ?>
														<option value="">Pilih</option>
														@foreach($gender as $g)
														<option value="{{$g}}" {{isset($data) && $data->custInformation ? ($data->custInformation->gender_sohilbul_aqiqah == $g ? 'selected' : '') : ''}} >{{$g}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-3">
													<label>Tanggal Lahir</label>
													<input type="number" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{isset($data) && $data->custInformation ? ($data->custInformation->tanggal_lahir ?? '') : ''}}">
												</div>
												<div class="col-md-3">
													<label>Tanggal Kirim</label>
													<input type="number" class="form-control" placeholder="Tanggal Kirim" name="tanggal_kirim" value="{{isset($data) && $data->custInformation ? ($data->custInformation->tanggal_kirim ?? '') : ''}}">
												</div>
												<div class="col-md-6">
													<label>Nama Ayah</label>
													<input type="show" class="form-control" placeholder="Nama Ayah" name="nama_ayah" value="{{isset($data) && $data->custInformation ? ($data->custInformation->nama_ayah ?? '') : ''}}">
												</div>
												<div class="col-md-6">
													<label>Nama Ibu</label>
													<input type="show" class="form-control" placeholder="Nama Ibu" name="nama_ibu" value="{{isset($data) && $data->custInformation ? ($data->custInformation->nama_ibu ?? '') : ''}}">
												</div>
												<div class="col-md-6">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control" rows="2">{{isset($data) && $data->custInformation ? ($data->custInformation->alamat ?? '') : ''}}</textarea>
												</div>
												<div class="col-md-6">
													<label>Grup Area</label>
													<select name="grup_area" class="form-control">
														<option value="">Pilih</option>
														@foreach($grup as $g)
														<option value="{{$g}}" {{isset($data) && $data->custInformation ? ($data->custInformation->grup_area == $g ? 'selected' : '') : ''}} >{{$g}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-4">
													<label>Kecamatan</label>
													<input type="number" class="form-control" placeholder="Kecamatan" name="kecamatan" value="{{isset($data) && $data->custInformation ? ($data->custInformation->kecamatan ?? '') : ''}}">
												</div>
												<div class="col-md-4">
													<label>Kelurahan</label>
													<input type="number" class="form-control" placeholder="Kelurahan" name="kelurahan" value="{{isset($data) && $data->custInformation ? ($data->custInformation->kelurahan ?? '') : ''}}">
												</div>
												<div class="col-md-4">
													<label>Kode Pos</label>
													<input type="number" class="form-control" placeholder="Kode Pos" name="kode_pos" value="{{isset($data) && $data->custInformation ? ($data->custInformation->kode_pos ?? '') : ''}}">
												</div>
												<div class="col-md-6">
													<label>No Telpon 2</label>
													<input type="number" class="form-control" placeholder="No Telpon" name="no_telp2" value="{{isset($data) && $data->custInformation ? ($data->custInformation->no_telp2 ?? '') : ''}}">
												</div>												
												<div class="col-md-6">
													<label>Masak dicabang</label>
													<select name="masak_di_cabang" class="form-control">
														<option value="">Pilih</option>
														@foreach($masak_cabang as $mc)
														<option value="{{$mc}}" {{isset($data) && $data->custInformation ? ($data->custInformation->masak_di_cabang == $mc ? 'selected' : '') : ''}} >{{$mc}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-sm float-right">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane fade show active" id="tab-order-detail" role="tabpanel">
							<div class="col-md-12">
								<form action="{{route('order.store-order-information')}}" method="POST" id="form-order-information" enctype="multipart/form-data">
									@csrf
									<input type="hidden" value="{{isset($data) ? $data->id : null}}" name="order_id">
									<div class="card">
										<div class="card-body">
											<div class="row">
												Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quos dolore, quisquam. Voluptatum cum ipsam unde laudantium, ad quis fugit similique totam officiis atque nostrum iure provident eaque nesciunt repellat ullam?
												<div class="col-md-3">
													<label>Cara Pembayaran</label>
													<select name="cara_pembayaran" class="form-control">
														<option value="">Pilih</option>
														@foreach($cara_bayar as $c)
														<option value="{{$c}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->cara_pembayaran == $c ? 'selected' : '') : ''}} >{{$c}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-3" id="div-credit">
													<label>Upload KTP</label>
													<input type="file" class="form-control" name="dokumen_ktp">
												</div>
												<div class="col-md-3" id="div-credit">
													<label>Upload KK</label>
													<input type="file" class="form-control" name="dokumen_kk">
												</div>
												<div class="col-md-3" id="div-tunai">
													<label>Upload Bukti Transfer</label>
													<input type="file" class="form-control" name="dokumen_bukti_tf">
												</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<label>Jumlah Kambing</label>
													<input type="number" class="form-control" placeholder="Jumlah Kambing" name="jumlah_kambing" value="{{isset($data) && $data->orderInformation ? ($data->orderInformation->jumlah_kambing ?? '') : ''}}">
												</div>
												<div class="col-md-3">
													<label>Jenkel Kambing</label>
													<select name="jenis_kelamin_kambing" class="form-control">
														<option value="">Pilih</option>
														<?php $jenkel = ['Betina', 'Jantan']; ?>
														@foreach($jenkel as $jk)
														<option value="{{$jk}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->jenis_kelamin_kambing == $jk ? 'selected' : '') : ''}} >{{$jk}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-3">
													<label>Jenis Pesanan</label>
													<select name="jenis_pesanan" class="form-control">
														<option value="">Pilih</option>
														@foreach($jenis_pesanan as $jp)
														<option value="{{$jp}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->jenis_pesanan == $jp ? 'selected' : '') : ''}} >{{$jp}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-3">
													<label>Maklon / tidak</label>
													<select name="is_maklon" class="form-control">
														<option value="">Pilih</option>
														<?php $maklon = [0, 1]; ?>
														@foreach($maklon as $m)
														<option value="{{$m}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->is_maklon == $m ? 'selected' : '') : ''}} >{{$m}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-6">
													<label>Jenis Paket</label>
													<select name="jenis_paket" class="form-control">
														<option value="">Pilih</option>
														@foreach($jenis_paket as $jp)
														<option value="{{$jp}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->jenis_paket == $jp ? 'selected' : '') : ''}} >{{$jp}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-3">
													<label>Pilihan Nasi</label>
													<select name="pilihan_nasi" class="form-control">
														<option value="">Pilih</option>
														@foreach($pilihan_nasi as $p)
														<option value="{{$p}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->pilihan_nasi == $p ? 'selected' : '') : ''}} >{{$p}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-3">
													<label>Jenis Beras Arab</label>
													<select name="jenis_beras_arab" class="form-control">
														<option value="">Pilih</option>
														@foreach($jenis_beras_arab as $j)
														<option value="{{$j}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->jenis_beras_arab == $j ? 'selected' : '') : ''}} >{{$j}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-12">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control" rows="2">{{isset($data) && $data->orderInformation ? ($data->orderInformation->alamat ?? '') : ''}}
													</textarea>
												</div>
												<div class="col-md-3">
													<label>Jumlah Order</label>
													<input type="number" class="form-control" placeholder="Jumlah Order" name="jumlah_order" value="{{isset($data) && $data->orderInformation ? ($data->orderInformation->jumlah_order ?? '') : ''}}">
												</div>
												<div class="col-md-3">
													<label>Tanggal Kirim</label>
													<input type="text" class="form-control" placeholder="Tanggal Kirim" name="tanggal_kirim" value="{{isset($data) && $data->orderInformation ? ($data->orderInformation->tanggal_kirim ?? '') : ''}}">
												</div>
												<div class="col-md-3">
													<label>Jam Tiba Lokasi</label>
													<input type="text" class="form-control" placeholder="Jam Tiba Lokasi" name="jam_tiba_lokasi" value="{{isset($data) && $data->orderInformation ? ($data->orderInformation->jam_tiba_lokasi ?? '') : ''}}">
												</div>
												<div class="col-md-3">
													<label>Jam Konsumsi</label>
													<input type="number" class="form-control" placeholder="Jam Konsumsi" name="jam_konsumsi" value="{{isset($data) && $data->orderInformation ? ($data->orderInformation->jam_konsumsi ?? '') : ''}}">
												</div>
												<div class="col-md-3">
													<label>Pengiriman</label>
													<select name="pengiriman" class="form-control">
														<option value="">Pilih</option>
														@foreach($pengiriman as $p)
														<option value="{{$p}}" {{isset($data) && $data->orderInformation ? ($data->orderInformation->pengiriman == $p ? 'selected' : '') : ''}} >{{$p}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-md-3">
													<label>Total Harga</label>
													<input type="text" class="form-control" placeholder="Total Harga" name="total_harga" value="{{isset($data) && $data->orderInformation ? ($data->orderInformation->total_harga ?? '') : ''}}">
												</div>
												<div class="col-md-3">
													<label>Adjustment</label>
													<input type="number" class="form-control" placeholder="Adjustment" name="adjusment" value="{{isset($data) && $data->orderInformation ? ($data->orderInformation->adjusment ?? '') : ''}}">
												</div>
												<div class="col-md-3">
													<label>Keterangan</label>
													<input type="text" class="form-control" placeholder="Keterangan" name="keterangan" value="{{isset($data) && $data->orderInformation ? ($data->orderInformation->keterangan ?? '') : ''}}">
												</div>
											</div>
										</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-sm float-right">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-pilihan" role="tabpanel">
							Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
	$(document).ready(function(){
		$('#form-store-order').submit(function(e) {
			e.preventDefault();			

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name="_token"]').val()
				}
			});			

			$.ajax({
				type: 'post',
				url: $(this).attr("action"),
				data: $(this).serialize(),
				beforeSend: function(){
					loadButton($('#form-store-order button[type=submit]'))
				},
				success: function(data) {
					console.log(data)
					if(data.status == "ok"){
						toastr["success"](data.messages);
					}
					setTimeout(function(){
						window.location.href = `/order/${data.data.id}`;
					}, 1500);
				},
				error: function(data){
					console.log(data.responseText)
					var data = data.responseJSON;
					if(data.status == "fail"){
						toastr["error"](data.messages);
					}
				},
				complete: function(){
					loadButton($('#form-store-order button[type=submit]'), false, 'Simpan')
				}
			});	
		})

		$('#form-customer-information').submit(function(e) {
			e.preventDefault();			

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name="_token"]').val()
				}
			});			

			$.ajax({
				type: 'post',
				url: $(this).attr("action"),
				data: $(this).serialize(),
				beforeSend: function(){
					loadButton($('#form-customer-information button[type=submit]'))
				},
				success: function(data) {
					console.log(data)
					if(data.status == "ok"){
						toastr["success"](data.messages);
					}
				},
				error: function(data){
					console.log(data.responseText)
					var data = data.responseJSON;
					if(data.status == "fail"){
						toastr["error"](data.messages);
					}
				},
				complete: function(){
					loadButton($('#form-customer-information button[type=submit]'), false, 'Simpan')
				}
			});	
		})

		$('#form-order-information').submit(function(e) {
			e.preventDefault();			

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('input[name="_token"]').val()
				}
			});	

			var form_data = new FormData($(this)[0]);

			$.ajax({
				type: 'post',
				url: $(this).attr("action"),
				data: form_data,
				dataType: 'json',
				processData: false,
				contentType: false,
				beforeSend: function(){
					loadButton($('#form-order-information button[type=submit]'))
				},
				success: function(data) {
					console.log(data)
					if(data.status == "ok"){
						toastr["success"](data.messages);
					}
				},
				error: function(data){
					console.log(data.responseText)
					var data = data.responseJSON;
					if(data.status == "fail"){
						toastr["error"](data.messages);
					}
				},
				complete: function(){
					loadButton($('#form-order-information button[type=submit]'), false, 'Simpan')
				}
			});	
		})
	})
</script>
@endsection