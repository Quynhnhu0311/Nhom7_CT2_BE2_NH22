@extends('masterAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders List</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-weight:bold;">Buyer Info</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                STT
                            </th>
                            <th style="width: 18%">
                                Name
                            </th>
                            <th style="width: 25%">
                                Email
                            </th>
                            <th style="width: 15%">
                                Phone
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $key => $customers)
                            <?php
                                $i = 1;
                            ?>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $customers->username }}</td>
                                <td>{{ $customers->email }}</td>
                                <td>{{ $customers->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-weight:bold;">Shipping Info</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                STT
                            </th>
                            <th style="width: 15%">
                                Name
                            </th>
                            <th style="width: 20%">
                                Email
                            </th>
                            <th style="width: 15%">
                                Phone
                            </th>
                            <th style="width: 20%">
                                Address
                            </th>
                            <th style="width: 15%">
                                Note
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shippings as $key => $shippings)
                            <?php
                                $i = 1;
                            ?>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $shippings->name }}</td>
                                <td>{{ $shippings->email }}</td>
                                <td>{{ $shippings->phone }}</td>
                                <td>{{ $shippings->address }}</td>
                                <td>{{ $shippings->note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- /.card-body -->

        </div>
        <!-- /.card -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-weight:bold;">Cart Info</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                STT
                            </th>
                            <th style="width: 17%">
                                Product Name
                            </th>
                            <th style="width: 10%">
                                Product Quantity
                            </th>
                            <th style="width: 11%">
                                Discount
                            </th>
                            <th style="width: 15%">
                                Product Price
                            </th>
                            <th style="width: 11%">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_details as $key => $order_details)
                            <?php
                                $i = 1;
                                $total = 0;
                                $subtotal = $order_details->product_price*$order_details->product_qty;
                                $total += $subtotal;

                            ?>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <input type="hidden" value="{{ $order_details->id_SP }}" name="order_product_id">
                                    {{ $order_details->product_name }}
                                </td>
                                <td style="text-align:center">
                                    <input type="hidden" value="{{ $order_details->product_qty }}" name="product_quantity">
                                    {{ $order_details->product_qty }}
                                </td>
                                <td>
                                    @if($order_details->product_coupon != '')
                                        {{ $order_details->product_coupon }}
                                    @else
                                        Không có mã
                                    @endif
                                </td>
                                <td>{{ number_format($order_details->product_price) }} VND</td>
                                <td>
                                    <?php
                                        $total_coupon = 0;
                                    ?>
                                    @if($coupon_condition == 1)
                                        <?php
                                            $total_after_coupon = ($total*$coupon_number)/100;
                                            $total_coupon = $total - $coupon_number;
                                        ?>
                                    @else
                                        <?php
                                            $total_coupon = $total-$coupon_number;
                                        ?>
                                    @endif
                                    {{ number_format($total_coupon) }} VND
                                    <?php
                                        $total_cart = 0;
                                        $total_cart += $total_coupon;
                                    ?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h3 class="card-title" style="font-weight:bold;">Status Cart</h3>
                @foreach($order as $key => $or)
                    @if($or->order_status == 1)
                        <form>
                            @csrf
                            <select class="form-control order_details">
                                <option id="{{ $or->id }}" selected value="1">Chưa xư lý</option>
                                <option id="{{ $or->id }}" value="2">Đã giao hàng</option>
                            </select>
                        </form>
                    @else
                        <form>
                            @csrf
                            <select class="form-control order_details">
                                <option disabled id="{{ $or->id }}" value="1">Chưa xư lý</option>
                                <option id="{{ $or->id }}" selected value="2">Đã giao hàng</option>
                            </select>
                        </form>
                    @endif
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
