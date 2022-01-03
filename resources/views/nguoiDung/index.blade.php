@extends('layouts.admin')

@section('title')
    Danh sách tài khoản người dùng
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Danh sách tài khoản người dùng</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <form action="">
                            <div class="input-group input-group-md">
                                <input type="search" class="form-control form-control-md" name="key"
                                    placeholder="Tìm kiếm tài khoản bằng tên người dùng">
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
                        <a href="{{route('nguoiDung.create')}}" class="btn btn-info float-right m-2">Thêm mới </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Tên đăng nhập</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Số điện thoại</th>
                                    <th>Ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th style="width: 18%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $nguoidung)
                                    <tr>
                                        <td>{{ $nguoidung->email }}</td>
                                        <td>{{ $nguoidung->name }}</td>
                                        <td>{{ $nguoidung->ngay_sinh }}</td>
                                        <td>{{ $nguoidung->so_dt }}</td>
                                        <td>{{ $nguoidung->anh }}</td>
                                        <td>{{ $nguoidung->created_at->format('d-m-Y') }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('nguoiDung.show', ['id' => $nguoidung->id]) }}"
                                                class="btn btn-info">Xem</a>
                                            <a href="{{ route('nguoiDung.edit', ['id' => $nguoidung->id]) }}"
                                                class="btn btn-success">Sửa </a>
                                            <a href="{{ route('nguoiDung.delete', ['id' => $nguoidung->id]) }}"
                                                class="delete btn btn-danger"
                                                onclick="return confirm('Bạn có muốn xóa tài khoản này ?');">Xóa </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
