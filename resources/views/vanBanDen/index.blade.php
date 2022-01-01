@extends('layouts.admin')

@section('title')
    Danh sách văn bản đến
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Danh sách văn bản đến</h1>
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
                        <a href="{{ route('vanBanDen.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ngày nhận</th>
                                    <th>Số VB đến</th>
                                    <th>ĐVBH</th>
                                    <th>Ký hiệu</th>
                                    <th>Ngày VB</th>
                                    <th>Trích yếu</th>
                                    <th>Người kí</th>
                                    <th class="text-right">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $vanbanden)
                                    <tr>
                                        <td>{{ $vanbanden->ngay_nhan }}</td>
                                        <td>{{ $vanbanden->so_vb_den }}</td>
                                        <td>{{ $vanbanden->don_vi_ban_hanh }}</td>
                                        <td>{{ $vanbanden->ki_hieu }}</td>
                                        <td>{{ $vanbanden->ngay_vb }}</td>
                                        <td>{{ $vanbanden->trich_yeu }}</td>
                                        <td>{{ $vanbanden->nguoi_ky }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('vanBanDen.edit', ['id' => $vanbanden->id]) }}"
                                                class="btn btn-success">Chỉnh sửa </a>
                                            <a href="{{ route('vanBanDen.delete', ['id' => $vanbanden->id]) }}"
                                                class="delete btn btn-danger"
                                                onclick="return confirm('Bạn có muốn xóa trạng thái này ?');">Xóa </a>
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
