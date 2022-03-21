@php
    $meatId = "";
    $riceId = "";
    $chickenId = "";
    if ($order != "") {
        $packages = $order->orderPackage[$index];
        $meatId = $order->orderPackage[$index]->package->meat_menu[0]->id;
        $riceId = $order->orderPackage[$index]->package->rice_menu[0]->id;
        $chickenId = $order->orderPackage[$index]->package->chicken_menu[0]->id;
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
    <label for="">Oalahan Ayam</label>
    <select name="package[{{ $index }}][chicken_menu]" class="form-control"
        id="" value="{{ $chickenId }}">
        <option value="" selected disabled>-- Pilih Olahan Ayam</option>
        @foreach ($chickens as $chicken)
            <option value="{{ $chicken->id }}"
                {{ $chickenId == $chicken->id ? 'selected' : '' }}>
                {{ $chicken->name }}
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