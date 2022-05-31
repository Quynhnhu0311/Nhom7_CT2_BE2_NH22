@extends('masterAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="/save-product" method="post" enctype="multipart/form-data">
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
                                <input type="text" id="inputName" class="form-control" name="add_name">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Manufacture</label>
                                <select id="inputStatus" class="form-control custom-select" name="add_manu">
                                    <option selected disabled>Select one</option>
                                    @foreach($getManufactures as $getManufactures)
                                    <option value="{{ $getManufactures->id }}">{{ $getManufactures->manu_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Protype</label>
                                <select id="inputStatus" class="form-control custom-select" name="add_type">
                                    <option selected disabled>Select one</option>
                                    @foreach($getProtypes as $getProtypes)
                                    <option value="{{ $getProtypes->id }}">{{ $getProtypes->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Price</label>
                                <input type="number" id="inputProjectLeader" class="form-control" name="add_price">
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Discount</label>
                                <input type="number" id="inputProjectLeader" class="form-control" name="add_discount">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Description</label>
                                <textarea id="inputDescription" class="form-control" rows="4" name="add_discrip"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Image</label>
                                <input type="file" id="inputClientCompany" class="form-control" name="add_product_image">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-7" style="padding-bottom: 16px;">
                    <input name="submit" type="submit" value="Create new Porduct" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
