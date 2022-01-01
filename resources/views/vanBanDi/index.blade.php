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
                        <h1 class="m-0">Danh sách trạng thái</h1>
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
                        <a href="{{ route('vanBanDi.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ngày gửi</th>
                                    <th>Số VB đi</th>
                                    <th>ĐVBH</th>
                                    <th>Ký hiệu</th>
                                    <th>Trích yếu</th>
                                    <th>Người kí</th>
                                    <th>NV phát hành</th>
                                    <th class="text-right">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $vanbandi)
                                    <tr>
                                        <td>{{ $vanbandi->ngay_gui }}</td>
                                        <td>{{ $vanbandi->so_vb_di }}</td>
                                        <td>{{ $vanbandi->noi_gui }}</td>
                                        <td>{{ $vanbandi->ki_hieu }}</td>
                                        <td>{{ $vanbandi->trich_yeu }}</td>
                                        <td>{{ $vanbandi->nguoi_ky }}</td>
                                        <td>{{ $vanbandi->nv_phathanh }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('vanBanDi.edit', ['id' => $vanbandi->id]) }}"
                                                class="btn btn-success">Chỉnh sửa </a>
                                            <a href="{{ route('vanBanDi.delete', ['id' => $vanbandi->id]) }}"
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
