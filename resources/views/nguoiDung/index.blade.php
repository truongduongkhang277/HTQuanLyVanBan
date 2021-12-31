@extends('layouts.admin')

@section('title')
    Danh sách trạng thái
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
                        <a href="" class="btn btn-info float-right m-2">Thêm mới </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên đăng nhập</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Số điện thoại</th>
                                    <th>Ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th class="text-right">Thao tác</th>
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
                                        <td class="text-right">
                                            <a href="" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i>
                                            </a>
                                            <a href="{{ route('nguoiDung.edit', $nguoidung->id) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
