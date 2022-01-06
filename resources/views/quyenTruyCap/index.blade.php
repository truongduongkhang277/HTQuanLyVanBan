@extends('layouts.admin')

@section('title')
    Danh sách quyền truy cập
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Danh sách quyền truy cập</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <form action="">
                            <div class="input-group input-group-md">
                                <input type="search" class="form-control form-control-md" name="key"
                                    placeholder="Tìm kiếm quyền truy cập bằng tên quyền truy cập">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-md btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('them-quyen-truy-cap')
                            <a href="{{ route('quyenTruyCap.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Mã quyền</th>
                                    <th>Quyền truy cập</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $quyenTruyCap)
                                    <tr>
                                        <td style="text-align:center">{{ $quyenTruyCap->id }}</td>
                                        <td>{{ $quyenTruyCap->quyen_truy_cap }}</td>
                                        @if ($quyenTruyCap->trang_thai == 1)
                                            <td style="text-align: center; color:green"> Kích hoạt</td>
                                        @else
                                            <td style="text-align: center; color:red"> Ngừng hoạt động</td>
                                        @endif

                                        <td class="text-center">
                                            <a href="{{ route('quyenTruyCap.show', ['id' => $quyenTruyCap->id]) }}"
                                                class="btn btn-info">Xem </a>
                                            @can('sua-quyen-truy-cap')
                                                <a href="{{ route('quyenTruyCap.edit', ['id' => $quyenTruyCap->id]) }}"
                                                    class="btn btn-success">Sửa </a>
                                            @endcan
                                            @can('xoa-quyen-truy-cap')
                                                <a href="{{ route('quyenTruyCap.delete', ['id' => $quyenTruyCap->id]) }}"
                                                    class="delete btn btn-danger"
                                                    onclick="return confirm('Bạn có muốn xóa quyền truy cập này ?');">Xóa </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="pagination justify-content-center">
                            {{ $data->appends(request()->all())->links() }}
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
