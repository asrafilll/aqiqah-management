<table>
    <thead>
        <tr>
            <th colspan="10">
                {{ $title }}
            </th>
        </tr>
        <tr>
            <th></th>
        </tr>
        <tr>
            <th>Nama CS</th>
            <th>Nama Customer</th>
            <th>Tanggal Kirim</th>
            <th>Jam Kirim</th>
            <th>Nama sohibul aqiqah</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Alamat</th>
            <th>Jenis Pembayaran</th>
            <th>Jumlah kambing</th>
            <th>jumlah pesanan</th>
            <th>Jenis paket</th>
            <th>Pilihan Nasi</th>
            <th>Jenis Beras Arab</th>
            <th>Lauk 1</th>
            <th>Lauk 2</th>
            <th>Lauk 3</th>
            <th>Lauk 4</th>
            <th>Lauk 5</th>
        </tr>
    </thead>
    <tbody>
        @php
            $x = 0;
        @endphp
        @foreach ($orders as $order)
            <tr>
                <td>
                    {{ $order->createdBy->name }}
                </td>
                <td>
                    {{ $order->customer->name }}
                </td>
                <td>
                    {{ date('Y-m-d', strtotime($order->send_date)) }}
                </td>
                <td>
                    {{ date('H:i:s', strtotime($order->send_time)) }}
                </td>
                <td>
                    {{ $order->customer->name_of_aqiqah }}
                </td>
                <td>
                    {{ $order->customer->father_name }}
                </td>
                <td>
                    {{ $order->customer->mother_name }}
                </td>
                <td>
                    {{ $order->customer->address . ', ' . $order->customer->village->name . ', ' . $order->customer->district->name . ', ' . $order->customer->postalcode }}
                </td>
                <td>
                    {{ $order->payment->name }}
                </td>
                <td>
                    {{ $order->number_of_goats }}
                </td>
                <td>
                    {{ $order->qty }}
                </td>
                <td>
                    {{ $order->packageMenu }}
                </td>
                <td>
                    {{ $orderPackage[$x]['rices'] }}
                </td>
                <td>
                    {{ $orderPackage[$x]['isArabic'] }}
                </td>
                <td>
                    {{ $orderPackage[$x]['menu1'] }}
                </td>
                <td>
                    {{ $orderPackage[$x]['menu2'] }}
                </td>
                <td>
                    {{ $orderPackage[$x]['menu3'] }}
                </td>
                <td>
                    {{ $orderPackage[$x]['menu4'] }}
                </td>
                <td>
                    {{ $orderPackage[$x]['menu5'] }}
                </td>
            </tr>
            @php
                $x++;
            @endphp
        @endforeach
    </tbody>
</table>