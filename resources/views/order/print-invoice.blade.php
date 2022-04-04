<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $fileName }}</title>

    <style>
        .custom-header-table > th {
            border-bottom: 3px solid #000 !important;
            text-align: left;
            padding-bottom: 10px;
        }

        .custom-header-table {
            margin-bottom: 20px;
        }

        .custom-td {
            padding-top: 20px;
        }

        .custom-td-1 {
            padding-bottom: 20px;
        }

        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
        }
    </style>
</head>
<body>
    <div style="padding: 0 25px">
        <div class="col">
            <div class="logo-group">
                <!-- Brand Logo -->
                {{-- <div>
                    <img src="{{asset('img/logo.png')}}" alt="Syamil Aqiqah" class="brand-image img-circle" style="width: 60px;max-height: 60px;">
                </div> --}}
                <p class="brand-text" style="font-size: 36px">Syamil Aqiqah & Catering</p>
            </div>
        </div>
    </div>
    <div style="padding: 0 25px">
        <div class="col">
            <div class="card card-body">
                <table class="table table-borderless table-detail">
                    <thead>
                        <tr class="custom-header-table">
                            <th colspan="2">Data Pemesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="custom-td">Nama Customer</td>
                            <td class="custom-td">:</td>
                            <td class="custom-td">
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
                            <td class="custom-td-1">Alamat</td>
                            <td class="custom-td-1">:</td>
                            <td class="custom-td-1">
                                @php
                                    $addresses = [];
                                    if (!is_null($data->customer->address)) {
                                        $addresses[] = $data->customer->address;
                                    }
                                    if (!is_null($data->customer->village)) {
                                        $addresses[] = $data->customer->village->name;
                                    }
                                    if (!is_null($data->customer->district)) {
                                        $addresses[] = $data->customer->district->name;
                                    }
                                    if (!is_null($data->customer->postalcode)) {
                                        $addresses[] = $data->customer->postalcode;
                                    }
                                @endphp
                                {{ implode(', ', $addresses) }}
                            </td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="custom-header-table">
                            <th>Data Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="custom-td">Jenis Pembayaran</td>
                            <td class="custom-td">:</td>
                            <td class="custom-td">
                                {{ $data->payment->name ?? '-' }}
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
                            <td class="custom-td-1">Tanggal Kirim</td>
                            <td class="custom-td-1">:</td>
                            <td class="custom-td-1">
                                {{ date('Y-m-d H:i', strtotime($data->send_date)) }}
                            </td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="custom-header-table">
                            <th>Total Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="custom-td">Harga Pesanan</td>
                            <td class="custom-td">:</td>
                            <td class="custom-td">
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
                                {{ $data->payment->name ?? '-' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
