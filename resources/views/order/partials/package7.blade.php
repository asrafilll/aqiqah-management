@php
    $meatId = "";
    $riceId = "";
    $chickenId = "";
    $meatName = "";
    if ($order != "") {
        $packages = $order->orderPackage[$index];
        $meatName = $order->orderPackage[$index]->meat->meat->is_custom == true ?  $order->orderPackage[$index]->meat->meat->name : '';
        if ($order->orderPackage[$index]->meat != '') {
            $meatId = $order->orderPackage[$index]->meat->meat->is_custom == true ? 'free_text' : $order->orderPackage[$index]->meat->meat->id;
        }
        $riceId = $order->orderPackage[$index]->rice->rice->id;
        $chickenId = $order->orderPackage[$index]->chicken->chicken->id;
    }
@endphp
<div class="col-4">
    <label for="">Olahan Daging</label>
    <select name="package[{{ $index }}][meat_menu]" class="form-control"
        id="" value="{{ $meatId }}" onchange="freeTextChange(this.value, 'meat')">
        <option value="" selected disabled>-- Pilih Olahan Daging --</option>
        @foreach ($meats as $d)
            <option value="{{ $d->id }}"
                {{ $meatId == $d->id ? 'selected' : '' }}>
                {{ $d->name }}
            </option>
        @endforeach
        <option value="free_text" {{ $meatId == 'free_text' ? 'selected' : '' }}>Free text</option>
    </select>
</div>
<div class="col-4 {{ $meatId == 'free_text' ? '' : 'd-none' }}" id="meat_menu_input">
    <label for="">Custom Daging</label>
    <input type="text" class="form-control" id="meat_menu_input_text" name="package[{{ $index }}][meat_menu_custom]"
        value="{{ $meatName }}">
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