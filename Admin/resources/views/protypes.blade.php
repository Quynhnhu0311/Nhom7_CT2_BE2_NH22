@extends('masterAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Protype List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item active">Protype List</li>
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
                <h3 class="card-title">Protype List</h3>

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
                        @foreach($getType as $key => $getAllType)
                        <tr>
                            <td>{{ $getAllType->id }}</td>
                            <td><a>{{ $getAllType->type_name }}</a><br /></td>
                            <td><a>{{ $getAllType->qty }}</a><br /></td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/edit-protype/{{ $getAllType->id }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Edit
                                </a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-danger btn-sm" href="/delete-protype/{{ $getAllType->id }}">
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
                    <a class="btn btn-success float-right" href="/addprotype">
                        <i class="fas fa-plus">
                        </i>
                        Create new Protype
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
