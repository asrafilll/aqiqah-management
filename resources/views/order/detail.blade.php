@extends('layouts.template')
@section('style')
<style>
    .table-detail > tbody > tr > td {
        padding: .2rem;
    }

    .table-detail > tbody > tr > td:first-child {
        width: 250px;
    }
    .table-detail > tbody > tr > td:nth-child(2) {
        width: 50px;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card card-body">
            <table class="table table-borderless table-detail">
                <thead>
                    <tr>
                        <th>Data Pemesan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama Customer</td>
                        <td>:</td>
                        <td>
                            {{ $data->customer->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td>:</td>
                        <td>
                            {{ $data->customer->phone_1 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Shohubul Aqiqah</td>
                        <td>:</td>
                        <td>
                            {{ $data->customer->name_of_aqiqah }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal lahir</td>
                        <td>:</td>
                        <td>
                            {{ date('Y-m-d', strtotime($data->customer->birth_of_date)) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Kirim</td>
                        <td>:</td>
                        <td>
                            {{ date('Y-m-d H:i', strtotime($data->send_date)) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Ayah</td>
                        <td>:</td>
                        <td>
                            {{ $data->customer->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>:</td>
                        <td>
                            {{ $data->customer->mother_name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            {{ $data->customer->address . ', ' . $data->customer->village->name . ', ' . $data->customer->district->name . ', ' . $data->customer->postalcode }}
                        </td>
                    </tr>
                </tbody>
                
                <thead>
                    <tr>
                        <th>Data Order</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jenis Pembayaran</td>
                        <td>:</td>
                        <td>
                            {{ $data->payment->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah kambing</td>
                        <td>:</td>
                        <td>
                            {{ $data->number_of_goats }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Pesanan</td>
                        <td>:</td>
                        <td>
                            {{ $data->qty }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Paket</td>
                        <td>:</td>
                        <td>
                            {{ $data->packageMenu }}
                        </td>
                    </tr>
                    <tr>
                        <td>Pilihan Nasi</td>
                        <td>:</td>
                        <td>
                            {{ implode(', ', $rices) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Beras Arab</td>
                        <td>:</td>
                        <td>
                            {{ implode(', ', $isArabic) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Menu Pilihan</td>
                        <td>:</td>
                        <td>
                            {{ implode(', ', $allMenu) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Menu Pilihan</td>
                        <td>:</td>
                        <td>
                            {{ $data->qty }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Kirim</td>
                        <td>:</td>
                        <td>
                            {{ date('Y-m-d H:i', strtotime($data->send_date)) }}
                        </td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th>Total Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Harga Pesanan</td>
                        <td>:</td>
                        <td>
                            {{ number_format($data->total + $data->discount_price - $data->additional_price) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Biaya Tambahan</td>
                        <td>:</td>
                        <td>
                            {{ number_format($data->additional_price) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Diskon</td>
                        <td>:</td>
                        <td>
                            {{ number_format($data->discount_price) }}
                        </td>
                    </tr>
                    <tr>    
                        <td>Catatan Tambahan</td>
                        <td>:</td>
                        <td>
                            {{ $data->notes }}
                        </td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>:</td>
                        <td>
                            {{ $data->payment->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // set ajax header
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
</script>
@endsection