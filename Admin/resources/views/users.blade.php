@extends('masterAdmin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User List</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User List</h3>

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
                                Name User
                            </th>
                            <th>
                                Email User
                            </th>
                            <th style="width: 19%">
                                Phone User
                            </th>
                            <th style="width: 15%">
                                Password User
                            </th>
                            <th style="width: 58%; text-align: center;">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getUser as $key => $getAllUser)
                        <tr>
                            <td>{{ $getAllUser->id }}</td>
                            <td><a>{{ $getAllUser->username }}</a><br /></td>
                            <td class="project_progress">{{ $getAllUser->email }}</td>
                            <td class="project-state">{{ $getAllUser->phone }}</td>
                            <td class="project-state">{{ $getAllUser->password }}</td>
                            <td class="project-actions text-center">
                                <a onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không?')" class="btn btn-danger btn-sm" href="/delete-user/{{ $getAllUser->id }}" style="width: 59px;">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
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
