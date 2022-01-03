@extends('layouts.admin')

@section('title')
    Danh sách độ mật
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Danh sách hình thức lưu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <form action="">
                            <div class="input-group input-group-md">
                                <input type="search" class="form-control form-control-md" name="key" placeholder="Tìm kiếm hình thức lưu bằng tên hình thức lưu">
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
                        <a href="{{ route('hinhThucLuu.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Mã</th>
                                    <th>hình thức lưu</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $hinhThucLuu)
                                    <tr>
                                        <td style="text-align:center">{{ $hinhThucLuu->id }}</td>
                                        <td>{{ $hinhThucLuu->hinh_thuc_luu}}</td>
                                        @if ($hinhThucLuu->trang_thai == 1)
                                            <td style="text-align: center; color:green"> Kích hoạt</td>
                                        @else
                                            <td style="text-align: center; color:red"> Ngừng hoạt động</td>
                                        @endif

                                        <td style="text-align: center">
                                            <a href="{{ route('hinhThucLuu.edit', ['id' => $hinhThucLuu->id]) }}"
                                                class="btn btn-success">Chỉnh sửa </a>
                                            <a href="{{ route('hinhThucLuu.delete', ['id' => $hinhThucLuu->id]) }}"
                                                class="delete btn btn-danger"
                                                onclick="return confirm('Bạn có muốn xóa hình thức lưu này ?');">Xóa </a>
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
