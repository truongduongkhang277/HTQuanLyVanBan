@extends('layouts.admin')

@section('title')
    Trang chủ
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Danh sách cơ quan</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('coQuan.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Mã CQ</th>
                                    <th>Tên cơ quan</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th style="width: 18%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $coquan)
                                    <tr>
                                        <td>{{ $coquan->id }}</td>
                                        <td>{{ $coquan->ten_co_quan }}</td>
                                        <td>{{ $coquan->dia_chi }}</td>
                                        <td>{{ $coquan->trang_thai }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('coQuan.edit', ['id' => $coquan->id]) }}"
                                                class="btn btn-success">Chỉnh sửa </a>
                                            <a href="{{ route('coQuan.delete', ['id' => $coquan->id]) }}"
                                                class="btn btn-danger">Xóa </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="d-grid gap-2 col-4 mx-auto">
                            <div class="col">
                                {{ $data->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
