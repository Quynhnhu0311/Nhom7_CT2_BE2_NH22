@extends('masterAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manufacture List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item active">Manufacture List</li>
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
                <h3 class="card-title">Manufacture List</h3>

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
                            <th style="width: 22%">
                                Name
                            </th>
                            <th style="width: 9%">
                                Quality
                            </th>
                            <th style="width: 8%; text-align: center;">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getManu as $row => $getAllManu)
                        <tr>
                            <td>{{ $getAllManu->id }}</td>
                            <td><a>{{ $getAllManu->manu_name }}</a><br /></td>
                            <td><a>{{ $getAllManu->qty }}</a><br /></td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/edit-manufacture/{{ $getAllManu->id }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Edit
                                </a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-danger btn-sm" href="/delete-manufacture/{{ $getAllManu->id }}">
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
                    <a class="btn btn-success float-right" href="/addmanufacture">
                        <i class="fas fa-plus">
                        </i>
                        Create new Manufacture
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
