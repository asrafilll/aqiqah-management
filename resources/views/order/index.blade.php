@extends('layouts.template')
@section('style')
<style>
    .card_title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.25rem;
    }

    .card_title_text {
        font-style: normal;
        font-weight: 700;
        font-size: 19px;
        line-height: 24px;
        letter-spacing: 0.4px;
        color: #252733;
    }

    .filter_group {
        display: flex;
        align-items: center;
    }

    .search,
    .sort,
    .filter {
        display: flex;
        align-items: center;
        margin-left: 20px;
    }

    .search_text,
    .sort_text,
    .filter_text {
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 0.2px;
        color: #4B506D;
        margin-bottom: 0 !important;
        margin-left: 10px;
    }

    .card_list_order > .card-body {
        padding: 0;
    }

    .table_list_order > thead > tr > th {
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 18px;
        letter-spacing: 0.2px;
        color: #9FA2B4;
    }

    .table_list_order > tbody > tr {
        cursor: pointer;
    }

    .order_details > .order_details_text {
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 0.2px;
        color: #252733;
        margin-bottom: 0 !important;
        text-transform: capitalize;
        width: 200px;
    }

    .order_details > .order_details_helper {
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 0.1px;
        color: #C5C7CD;
    }

    .table_action {
        margin-left: 15px;
    }

    th[role=columnheader]:not(.no-sort) {
        cursor: pointer;
    }

    th[role=columnheader]:not(.no-sort):after {
        content: '';
        float: right;
        margin-top: 7px;
        border-width: 0 4px 4px;
        border-style: solid;
        border-color: #404040 transparent;
        visibility: hidden;
        opacity: 0;
        -ms-user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    th[aria-sort=ascending]:not(.no-sort):after {
        border-bottom: none;
        border-width: 4px 4px 0;
    }

    th[aria-sort]:not(.no-sort):after {
        visibility: visible;
        opacity: 0.4;
    }

    th[role=columnheader]:not(.no-sort):hover:after {
        visibility: visible;
        opacity: 1;
    }
</style>
@endsection
@section('content')
<div class="card card_list_order">
    <div class="card-body">
        <div class="card_title">
            <div class="text_group">
                <p class="card_title_text">All Order List</p>
            </div>
            <div class="filter_group">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <p class="search_text">Search</p>
                </div>
                <div class="sort">
                    <p class="sort_text" id="sort-filter">Sort</p>
                </div>
                <div class="filter">
                    <p class="filter_text">filter</p>
                </div>
            </div>
        </div>

        <table class="table table_list_order" id="table_list_order">
            <thead>
                <tr>
                    <th>Order Details</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Priority</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="target-body-order"></tbody>
        </table>
        {{-- pagination --}}
        {{-- <div style="display: flex; justify-content: end; margin-right: 30px;">
            <nav aria-label="...">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item" aria-current="page">
                    <span class="page-link">2</span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
            </nav>
        </div> --}}
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            getData(0,100);

            // init table sort
            let table = $('#table_list_order');
            new Tablesort(document.getElementById('table_list_order'), {
                descending: true
            });
        })
        function getData(page = 0, limit = 1) {
            let uri = {!! json_encode(url('order/json')) !!}
            let url = uri + '/' + page + '/' + limit;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "JSON",
                beforeSend: function() {
                    // set loading
                    let loading = `<tr>
                        <td colspan="5" class="text-center">
                            Processing data ...
                        </td>
                        </tr>`
                    $('#target-body-order').html(loading);
                },
                success: function(res) {
                    console.log(res);
                    $('#target-body-order').html(res.data.view);
                }
            })
        }
    </script>
@endsection