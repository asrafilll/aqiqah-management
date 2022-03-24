@extends('layouts.template')
@section('style')
<style>
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

    .card_title_text {
        font-style: normal;
        font-weight: 700;
        font-size: 19px;
        line-height: 24px;
        letter-spacing: 0.4px;
        color: #252733;
        margin-bottom: 0 !important;
    }

    .table_action {
        margin-left: 10px;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card card-body">
            <p class="card_title_text mb-0">Users List</p>

            <table class="table" id="table_list_user">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Roles</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @php
                        $branch = '';
                        $role = '';
                        if ($user->branches == null) {
                            $branch = 'HO';
                        } else {
                            $branch = $user->branches->branch->name;
                        }
                        if ($user->roles == null) {
                            $role = '-';
                        } else {
                            $role = $user->roles->nama;
                        }
                    @endphp
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $branch }}
                            </td>
                            <td>
                                {{ $role }}
                            </td>
                            <td>
                                <div id="detail_icon text-success">
                                    <a href="{{ route('order.show', [$user->id]) }}" class="table_action">
                                        <i class="fa fa-eye text-success fa-1x"></i> 
                                    </a>
                                    <a href="{{ route('order.edit', [$user->id]) }}" class="table_action">
                                        <i class="fa fa-pencil-square-o text-primary"></i> 
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // init table sort
        let table = $('#table_list_order');
        new Tablesort(document.getElementById('table_list_user'), {
            descending: true
        });
    })
</script>
@endsection