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
                        @can('them-nguoi-dung')
                            <a href="{{ route('nguoiDung.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Tên đăng nhập</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Số điện thoại</th>
                                    <th style="width: 10%">Ảnh</th>
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
                                        @if (!empty($nguoidung->file_path))
                                            <td>
                                                <img style="width: 80px; height: 80px; object-fit: contain;"
                                                    src="{{ $nguoidung->file_path }}" alt="{{ $nguoidung->anh }}">
                                            </td>
                                        @else
                                            <td>
                                                <img style="width: 80px; height= 80px; object-fit:cover"
                                                    src="{{ asset('adminlte/dist/img/noimage.png') }}" alt="No Image">
                                            </td>
                                        @endif

                                        <td>{{ $nguoidung->created_at->format('d-m-Y') }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('nguoiDung.show', ['id' => $nguoidung->id]) }}"
                                                class="btn btn-info">Xem</a>
                                            @can('sua-nguoi-dung')
                                                <a href="{{ route('nguoiDung.edit', ['id' => $nguoidung->id]) }}"
                                                    class="btn btn-success">Sửa </a>
                                            @endcan
                                            @can('xoa-nguoi-dung')
                                                <a href="{{ route('nguoiDung.delete', ['id' => $nguoidung->id]) }}"
                                                    class="delete btn btn-danger"
                                                    onclick="return confirm('Bạn có muốn xóa tài khoản này ?');">Xóa </a>
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
