@foreach ($data as $d)
    <tr>
        <td>
            <div class="order_details">
                <p class="order_details_text">
                    {{ $d->packageMenu }}
                </p>
                <p class="order_details_helper">
                    Updated 1 day ago
                </p>
            </div>
        </td>
        <td>
            <div class="order_details">
                <p class="order_details_text">
                    {{ $d->customer->name }}
                </p>
                <p class="order_details_helper">
                    {{ $d->customer->phone_1 }}
                </p>
            </div>
        </td>
        <td>
            <div class="order_details">
                <p class="order_details_text">
                    {{ date('F d, Y', strtotime($d->send_date)) }}
                </p>
                <p class="order_details_helper">
                    {{ $d->send_time }}
                </p>
            </div>
        </td>
        <td>
            <div class="order_details">
                <p class="order_details_text">
                    Dikirim
                </p>
            </div>
        </td>
        <td>
            <div id="detail_icon text-success">
                <a href="{{ route('order.show', [$d->id]) }}">
                    <i class="fa fa-eye text-success fa-1x"></i> 
                </a>
            </div>
        </td>
    </tr>
@endforeach