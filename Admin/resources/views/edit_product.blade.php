@extends('masterAdmin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/index">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    @foreach($edit_product as $row => $edit_value)
      <form action="/update-product/{{ $edit_value->id }}" method="post" enctype="multipart/form-data">
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
                  <input type="text" id="inputName" class="form-control" name="name" value="{{ $edit_value->name }}">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Manufacture</label>
                  <select id="inputStatus" class="form-control custom-select" name="manu">
                    @foreach($manu_product as $key => $manu)
                    @if($manu->id==$edit_value->manu_id)
                    <option selected value="{{ $manu->id }}">{{ $manu->manu_name }}</option>
                    @else
                    <option value="{{ $manu->id }}">{{ $manu->manu_name }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Protype</label>
                  <select id="inputStatus" class="form-control custom-select" name="type">
                    @foreach($type_product as $key => $type)
                        @if($type->id==$edit_value->type_id)
                            <option selected value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Price</label>
                  <input type="text" id="inputProjectLeader" class="form-control" name="price" value="{{ $edit_value->price }}">
                </div>
                <div class="form-group">
                    <label for="inputClientCompany">Discount</label>
                    <input type="number" id="inputProjectLeader" class="form-control" name="discount" value="{{ $edit_value->discount }}">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Description</label>
                  <textarea id="inputDescription" class="form-control" rows="4" name="discrip">{{ $edit_value->discription }}</textarea>
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Image</label>
                  <input type="file" id="imgInp" class="form-control" name="product_image">
                  <img src="../img/{{ $edit_value->image }}" alt="">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-7" style="padding-bottom: 16px;">
            <input name="update_product" type="submit" value="Update Product" class="btn btn-success float-right">
          </div>
        </div>
      </form>
      @endforeach
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
