@extends('layouts.admin')

@section('title')
    Danh sách hình thức
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Danh sách hình thức</h1>
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
                        <a href="{{ route('hinhThuc.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Mã</th>
                                    <th>Hình thức</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $hinhThuc)
                                    <tr>
                                        <td style="text-align:center">{{ $hinhThuc->id }}</td>
                                        <td>{{ $hinhThuc->hinh_thuc }}</td>
                                        @if ($hinhThuc->trang_thai == 1)
                                            <td style="text-align: center; color:green"> Kích hoạt</td>
                                        @else
                                            <td style="text-align: center; color:red"> Ngừng hoạt động</td>
                                        @endif

                                        <td style="text-align: center">
                                            <a href="{{ route('hinhThuc.edit', ['id' => $hinhThuc->id]) }}"
                                                class="btn btn-success">Chỉnh sửa </a>
                                            <a href="{{ route('hinhThuc.delete', ['id' => $hinhThuc->id]) }}"
                                                class="delete btn btn-danger"
                                                onclick="return confirm('Bạn có muốn xóa hình thức này ?');">Xóa </a>
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
