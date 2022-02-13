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
							<a class="nav-link active" data-toggle="pill" href="#tab-customer-information" role="tab">Customer Information</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="pill" href="#tab-order-detail" role="tab">Order Information</a>
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
								<div class="card">
									<div class="card-body">
										<div class="row">
											Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quos dolore, quisquam. Voluptatum cum ipsam unde laudantium, ad quis fugit similique totam officiis atque nostrum iure provident eaque nesciunt repellat ullam?
											<div class="col-md-6">
												<label>Nama Customer</label>
												<input type="text" class="form-control" placeholder="Nama Customer" name="nama_customer">
											</div>
											<div class="col-md-6">
												<label>No. Telpon</label>
												<input type="number" class="form-control" placeholder="No. Telpon" name="no_telp">
											</div>
											<div class="col-md-6">
												<label>Source Order</label>
												<select name="source_order" class="form-control">
												<option value="">Pilih</option>
												@foreach($source as $c)
												<option value="{{$c}}">{{$c}}</option>
												@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary btn-sm float-right">Simpan</button>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade show active" id="tab-customer-information" role="tabpanel">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quos dolore, quisquam. Voluptatum cum ipsam unde laudantium, ad quis fugit similique totam officiis atque nostrum iure provident eaque nesciunt repellat ullam?
											<div class="col-md-6">
												<label>Nama Sohibul Aqiqah</label>
												<input type="text" class="form-control" placeholder="Nama Sohibul Aqiqah" name="nama_customer">
											</div>
											<div class="col-md-3">
												<label>Tanggal Lahir</label>
												<input type="number" class="form-control" placeholder="Tanggal Lahir" name="no_telp">
											</div>
											<div class="col-md-3">
												<label>Tanggal Kirim</label>
												<input type="number" class="form-control" placeholder="Tanggal Kirim" name="no_telp">
											</div>
											<div class="col-md-6">
												<label>Nama Ayah</label>
												<input type="number" class="form-control" placeholder="Nama Ayah" name="no_telp">
											</div>
											<div class="col-md-6">
												<label>Nama Ibu</label>
												<input type="number" class="form-control" placeholder="Nama Ibu" name="no_telp">
											</div>
											<div class="col-md-6">
												<label>Alamat</label>
												<textarea name="alamat" class="form-control" rows="2"></textarea>
											</div>
											<div class="col-md-6">
												<label>Grup Area</label>
												<select name="source_order" class="form-control">
												<option value="">Pilih</option>
												@foreach($grup as $g)
												<option value="{{$g}}">{{$g}}</option>
												@endforeach
												</select>
											</div>
											<div class="col-md-4">
												<label>Kecamatan</label>
												<input type="number" class="form-control" placeholder="Kecamatan" name="no_telp">
											</div>
											<div class="col-md-4">
												<label>Kelurahan</label>
												<input type="number" class="form-control" placeholder="Kelurahan" name="no_telp">
											</div>
											<div class="col-md-4">
												<label>Kode Pos</label>
												<input type="number" class="form-control" placeholder="Kode Pos" name="no_telp">
											</div>
											<div class="col-md-6">
												<label>No Telpon</label>
												<input type="number" class="form-control" placeholder="No Telpon" name="no_telp">
											</div>
											<div class="col-md-6">
												<label>Jenis Kelamin Sohibul Aqiqah</label>
												<select name="source_order" class="form-control">
												<option value="">Pilih</option>
												<option value="Pria">Pria</option>
												<option value="Wanita">Wanita</option>
												</select>
											</div>
											<div class="col-md-6">
												<label>Masak dicabang</label>
												<select name="source_order" class="form-control">
												<option value="">Pilih</option>
												@foreach($masak_cabang as $mc)
												<option value="{{$mc}}">{{$mc}}</option>
												@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary btn-sm float-right">Simpan</button>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-order-detail" role="tabpanel">
							Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
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