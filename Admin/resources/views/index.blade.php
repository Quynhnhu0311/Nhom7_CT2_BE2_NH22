@extends('masterAdmin')
@section('content')

<!-- Main content -->
<section class="content">


    <div class="container" style="margin-bottom: 50px;">
        <h3 style="font-weight:bold;color:#dc3545;padding-left: 570px;padding-top: 45px;">Thống kê doanh số</h3><br>
        <form autocomplete="off">
            @csrf
            <div class="row" style="margin-left: 265px;">
                <div class="col">
                    <p>Từ ngày : <input type="text" id="datepicker" class="form-control"></p>
                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary" value="Lọc kết quả" style="margin-left: 315px;">
                </div>
                <div class="col">
                    <p>Đến ngày : <input type="text" id="datepicker2" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <div id="myfirstchart" style="height: 250px"></div>
                </div>
            </div>
        </form>
    </div>

    <div class="container-fluid" style="margin-left: 200px;margin-left: 645px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
                <div class="col-md-4" style="margin-top: 30px;">
                    <div id="donut"></div>
                </div>
        </div>
        <!-- /.row -->
    </div>

</section>
<!-- /.content -->
</div>

@endsection

