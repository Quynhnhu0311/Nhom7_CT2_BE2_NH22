@extends('masterAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product List</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product List</h3>

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
                                ID
                            </th>
                            <th style="width: 25%">
                                Name
                            </th>
                            <th>
                                Image
                            </th>
                            <th style="width: 19%">
                                Price
                            </th>
                            <th style="width: 3%">
                                Manufacture
                            </th>
                            <th style="width: 3%">
                                Protype
                            </th>
                            <th style="width: 10%; text-align: center;">
                                Description
                            </th>
                            <th style="width: 58%; text-align: center;">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getProducts as $key => $getAllProduct)
                        <tr>
                            <td>{{ $getAllProduct->id }}</td>
                            <td><a>{{ $getAllProduct->name }}</a><br /></td>
                            <td><img src="{{ asset('./img/'.$getAllProduct->image) }}" alt="" style="width: 80px;"></td>
                            <td class="project_progress">{{ number_format($getAllProduct->price) }} VND</td>
                            <td class="project-state">{{ $getAllProduct->manufacture->manu_name }}</td>
                            <td class="project-state">{{ $getAllProduct->protype->type_name }}</td>
                            <td class="project-state"
                                style="width: 432px; overflow: hidden; text-overflow: ellipsis; line-height: 22px; -webkit-line-clamp: 3; height: 75px; display: -webkit-box; -webkit-box-orient: vertical;">
                                {{ $getAllProduct->discription }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/edit-product/{{ $getAllProduct->id }}" style="width: 56px;">
                                    <i class="fas fa-folder">
                                    </i>
                                    Edit
                                </a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-danger btn-sm" href="/delete-product/{{ $getAllProduct->id }}" style="width: 59px;">
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
                    <a class="btn btn-success float-right" href="/addproduct">
                        <i class="fas fa-plus">
                        </i>
                        Create new Product
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
