@php
    $meatId = "";
    $offalId = "";
    if ($order != "") {
        $packages = $order->orderPackage[$index];
        $meatId = $order->orderPackage[$index]->meat->meat->id;
        $offalId = $order->orderPackage[$index]->offal->offal->id;
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
                {{ $offalId == $offal->id ? 'selected' : '' }}>
                {{ $offal->name }}
            </option>
        @endforeach
    </select>
</div>