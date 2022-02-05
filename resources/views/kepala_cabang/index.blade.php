@extends('layouts.template')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3>Haloo, {{\Auth::user()->name}}</h3>
	</div>
</div>
<!-- live test card in template -->
@endsection