@extends('layouts.admin')

@section('title')
    Danh sách hình thức chuyển
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Danh sách hình thức chuyển</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <form action="">
                            <div class="input-group input-group-md">
                                <input type="search" class="form-control form-control-md" name="key"
                                    placeholder="Tìm kiếm hình thức chuyển bằng tên hình thức chuyển">
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
                        @can('them-hinh-thuc-chuyen')
                            <a href="{{ route('hinhThucChuyen.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Mã</th>
                                    <th>Hình thức chuyển</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $hinhThucChuyen)
                                    <tr>
                                        <td style="text-align:center">{{ $hinhThucChuyen->id }}</td>
                                        <td>{{ $hinhThucChuyen->hinh_thuc_chuyen }}</td>
                                        @if ($hinhThucChuyen->trang_thai == 1)
                                            <td style="text-align: center; color:green"> Kích hoạt</td>
                                        @else
                                            <td style="text-align: center; color:red"> Ngừng hoạt động</td>
                                        @endif

                                        <td style="text-align: center">
                                            <a href="{{ route('hinhThucChuyen.show', ['id' => $hinhThucChuyen->id]) }}"
                                                class="btn btn-info">Xem </a>
                                            @can('sua-hinh-thuc-chuyen')
                                                <a href="{{ route('hinhThucChuyen.edit', ['id' => $hinhThucChuyen->id]) }}"
                                                    class="btn btn-success">Sửa </a>
                                            @endcan
                                            @can('xoa-hinh-thuc-chuyen')
                                                <a href="{{ route('hinhThucChuyen.delete', ['id' => $hinhThucChuyen->id]) }}"
                                                    class="delete btn btn-danger"
                                                    onclick="return confirm('Bạn có muốn xóa hình thức chuyển này ?');">Xóa </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="d-grid gap-2 col-2 mx-auto">
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
