@extends('masterAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Discount List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item active">Discount List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Discount List</h3>

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
                        <th style="width: 2%">
                                ID
                            </th>
                            <th style="width:9%">
                                Discount Name
                            </th>
                            <th style="width: 7%">
                                Discount Code
                            </th>
                            <th style="width: 4%;text-align:center">
                                Quantity
                            </th>
                            <th style="width: 5%">
                                Discount Conditions
                            </th>
                            <th style="width: 5%">
                                Decrease Number
                            </th>
                            <th style="width: 8%; text-align: center;">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $key => $cp)
                            <tr>
                                <td>{{ $cp->id }}</td>
                                <td><a>{{ $cp->coupon_name }}</a><br /></td>
                                <td><a>{{ $cp->coupon_code }}</a><br /></td>
                                <td style="text-align:center"><a>{{ $cp->coupon_time }}</a><br /></td>
                                @if($cp->coupon_condition == 2)
                                    <td style="text-align:center"><a>Giảm theo tiền</a><br /></td>
                                @else
                                    <td style="text-align:center"><a>Giảm theo %</a><br /></td>
                                @endif
                                @if($cp->coupon_condition == 2)
                                    <td style="text-align:center"><a>Giảm {{ number_format($cp->coupon_num) }} VND</a><br /></td>
                                @else
                                    <td style="text-align:center"><a>Giảm {{ $cp->coupon_num }} %</a><br /></td>
                                @endif
                                <td class="project-actions text-center">
                                    <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-danger btn-sm" href="/delete-coupon/{{ $cp->id }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-7" style="padding-top: 20px;">
                    <a class="btn btn-success float-right" href="/insert-coupon">
                        <i class="fas fa-plus">
                        </i>
                        Create new Discount
                    </a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
