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
                <h3 class="card-title">Orders List</h3>

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
                            <th style="width: 22%">
                                Code Order
                            </th>
                            <th style="width: 35%">
                                Date Order
                            </th>
                            <th style="width: 25%">
                                Status
                            </th>
                            <th style="width: 58%; text-align: center;">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $key => $ord)
                            <?php
                                $i = 1;
                            ?>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $ord->order_code }}</td>
                                <td>{{ $ord->created_at }}</td>
                                <td class="project_progress">
                                    @if($ord->order_status == 1)
                                        Đơn hàng mới
                                    @elseif($ord->order_status == 2)
                                        Đã xử lý - Đã giao hàng
                                    @endif
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" href="/view-orders/{{  $ord->order_code }}" style="width: 56px;">
                                        <i class="fa fa-eye"></i>
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
