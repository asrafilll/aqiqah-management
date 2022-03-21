@php
    $meatId = "";
    $riceId = "";
    $vegieId = "";
    if ($order != "") {
        $packages = $order->orderPackage[$index];
        $meatId = $order->orderPackage[$index]->package->meat_menu[0]->id;
        $riceId = $order->orderPackage[$index]->package->rice_menu[0]->id;
        $vegieId = $order->orderPackage[$index]->package->vegetable_menu[0]->id;
    }
@endphp
<div class="col-4">
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
<div class="col-4">
    <label for="">Mix Vegetable</label>
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