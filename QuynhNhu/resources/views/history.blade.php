@extends('master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Cart History</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="/">Home</a></li>
                    <li class="active">View Cart History</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="shopping-cart spad">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12" id="list-cart">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="cart-table">
                        <table style="width:100%">
                            <tr>
                                <th class="p-name" style="text-align: center;">STT</th>
                                <th style="text-align: center;">Order Code</th>
                                <th style="text-align: center;">Order Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            <?php
                                $i = 0;
                            ?>
                            @foreach($getOrder as $key => $getod)
                            <tr>
                                <td class="cart-title first-row">
                                    {{ $i++ }}
                                </td>
                                <td class="cart-title first-row">
                                    {{ $getod->order_code }}
                                </td>
                                <td class="p-price first-row">{{ $getod->created_at }}</td>
                                <td class="qua-col first-row">
                                    <a class="btn btn-primary btn-sm" href="/view-history-order/{{ $getod->order_code }}" style="width: 76px;">
                                        <i class="fa fa-eye"></i>
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="list-cart">
                <ul style="margin-bottom: 50px;margin-top: 50px;margin-left: 400px;">
                    {{ $getOrder->links() }}
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
