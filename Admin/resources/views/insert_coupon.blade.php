@extends('masterAdmin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Discount</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/index">Home</a></li>
              <li class="breadcrumb-item active">Add Discount</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="/insert-coupon-code" method="post" enctype="multipart/form-data">
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
                  <label for="inputName">Discount Name</label>
                  <input type="text" id="inputName" class="form-control" name="coupon_name">
                </div>
                <div class="form-group">
                  <label for="inputName">Discount Code</label>
                  <input type="text" id="inputName" class="form-control" name="coupon_code">
                </div>
                <div class="form-group">
                  <label for="inputName">Quantity</label>
                  <input type="number" id="inputName" class="form-control" name="coupon_time">
                </div>
                <div class="form-group">
                  <label for="inputName">Options</label>
                  <select name="coupon_condition" id="inputStatus" class="form-control custom-select">
                    <option value="0">-----Select-----</option>
                    <option value="1">Decrease by %</option>
                    <option value="2">Decrease by amount</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputName">Enter % or amount of reduction</label>
                  <input type="number" id="inputName" class="form-control" name="coupon_num">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-7" style="padding-bottom: 16px;">
            <input name="add_protype" type="submit" value="Create new Discount" class="btn btn-success float-right">
          </div>
        </div>
      </form>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
