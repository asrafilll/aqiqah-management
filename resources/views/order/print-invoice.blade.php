<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- jQuery -->
    <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <style>
        .logo-group {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo-group-text-1 {
            font-style: normal;
            font-weight: 700;
            font-size: 16px;
            line-height: 19px;
            color: #000000;
            margin-bottom: 0 !important;
            margin-top: 0;
            margin-left: 20px;
        }

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
    <div class="row">
        <div class="col">
            <div class="logo-group">
                <!-- Brand Logo -->
                <div>
                    <img src="{{asset('img/logo.png')}}" alt="Syamil Aqiqah" class="brand-image img-circle" style="width: 60px;max-height: 60px;">
                </div>
                <div class="logo-group-text">
                    <p class="brand-text logo-group-text-1">Syamil</p>
                    <p class="brand-text logo-group-text-1">Aqiqah & Catering</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
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
                                {{ $data->customer->address . ', ' . $data->customer->village->name . ', ' . $data->customer->district->name . ', ' . $data->customer->postalcode }}
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
                                {{ $data->payment->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            window.print();
        })
    </script>
</body>
</html>