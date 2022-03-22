@php
    $meatId = "";
    $offalId = "";
    $riceId = "";
    $chickenId = "";
    $vegieId = "";
    if ($order != "") {
        $packages = $order->orderPackage[$index];
        $meatId = $order->orderPackage[$index]->meat->meat->id;
        $offalId = $order->orderPackage[$index]->offal->offal->id;
        $riceId = $order->orderPackage[$index]->rice->rice->id;
        $chickenId = $order->orderPackage[$index]->chicken->chicken->id;
        $vegieId = $order->orderPackage[$index]->vegetable->vegetable->id;
    }
@endphp
<div class="col-6">
    <label for="">Olahan Daging</label>
    <select name="package[{{ $index }}][meat_menu]" class="form-control"
        id="" value="{{ $meatId }}">
        <option value="" selected disabled>-- Pilih Olahan Daging --</option>
        @foreach ($meats as $d)
            <option value="{{ $d->id }}"
                {{ $meatId == $d->id ? 'selected' : '' }}>
                {{ $d->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-6">
    <label for="">Olahan Jeroan</label>
    <select name="package[{{ $index }}][offal_menu]" class="form-control"
        id="" value="{{ $offalId }}">
        <option value="" selected disabled>-- Pilih Olahan Jeroan</option>
        @foreach ($offals as $offal)
            <option value="{{ $offal->id }}"
                {{$offalId == $offal->id ? 'selected' : '' }}>
                {{ $offal->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-4">
    <label for="">Olahan Ayam</label>
    <select name="package[{{ $index }}][chicken_menu]" class="form-control"
        id="" value="{{ $chickenId }}">
        <option value="" selected disabled>-- Pilih Olahan Ayam --</option>
        @foreach ($chickens as $chicken)
            <option value="{{ $chicken->id }}"
                {{ $chickenId == $chicken->id ? 'selected' : '' }}>
                {{ $chicken->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-4">
    <label for="">Mix Vegetables</label>
    <select name="package[{{ $index }}][vegetable_menu]" class="form-control"
        id="" value="{{ $vegieId }}">
        <option value="" selected disabled>-- Pilih Mix Vegetable</option>
        @foreach ($vegies as $vegie)
            <option value="{{ $vegie->id }}"
                {{ $vegieId == $vegie->id ? 'selected' : '' }}>
                {{ $vegie->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-4">
    <label for="">Nasi</label>
    <select name="package[{{ $index }}][rice_menu]" class="form-control"
        id="" value="{{ $riceId }}">
        <option value="" selected disabled>-- Pilih Nasi --</option>
        @foreach ($rices as $rice)
            <option value="{{ $rice->id }}"
                {{ $riceId == $rice->id ? 'selected' : '' }}>
                {{ $rice->name }}
            </option>
        @endforeach
    </select>
</div>