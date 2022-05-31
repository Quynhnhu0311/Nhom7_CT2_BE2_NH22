@extends('masterAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Manufacture</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item active">Update Manufacture</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @foreach($edit_manufacture as $row => $edit_value)
        <form action="/update-manufacture/{{ $edit_value->id }}" method="post" roles="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" class="form-control" name="manuname"
                                    value="{{ $edit_value->manu_name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quality</label>
                                <input type="number" id="inputName" class="form-control" name="soluong"
                                    value="{{ $edit_value->qty }}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-7" style="padding-bottom: 16px;">
                    <input name="update_manufacture" type="submit" value="Update Manufacture"
                        class="btn btn-success float-right">
                </div>
            </div>
        </form>
        @endforeach
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
