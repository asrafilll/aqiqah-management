@php
    $kk = null;
    $ktp = null;
    if($order != "") {
        $kk = $order->kk_img;
        $ktp = $order->ktp_img;
    }
@endphp
<div class="col-4">
    <label for="">Foto KTP</label>
    <input type="file"  name="ktp" id="input-file-max-fs" class="dropify" data-max-file-size="2M"
        data-allowed-file-extensions="png gif jpg jpeg" data-default-file="{{ asset($ktp) }}"
        data-show-remove="false"/>
</div>
<div class="col-4">
    <label for="">Foto KK</label>
    <input type="file"  name="kk" id="input-file-max-fs" class="dropify" data-max-file-size="2M"
        data-allowed-file-extensions="png gif jpg jpeg" data-default-file="{{ asset($kk) }}"
        data-show-remove="false"/>
</div>