@extends('layouts.admin')

@section('title')
    Danh sách bộ phận
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Danh sách bộ phận</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <form action="">
                            <div class="input-group input-group-md">
                                <input type="search" class="form-control form-control-md" name="key"
                                    placeholder="Tìm kiếm bộ phận bằng tên bộ phận">
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
                        @can('them-bo-phan')
                            <a href="{{ route('boPhan.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
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
                                    <th>Mã bộ phận</th>
                                    <th>Tên bộ phận</th>
                                    <th>Kí hiệu</th>
                                    <th>Trưởng bộ phận</th>
                                    <th>Trạng thái</th>
                                    <th>Ghi chú</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $bophan)
                                    <tr>
                                        <td style="text-align:center">{{ $bophan->id }}</td>
                                        <td>{{ $bophan->bo_phan }}</td>
                                        <td>{{ $bophan->ki_hieu }}</td>
                                        <td>{{ optional($bophan->truongBoPhan)->name }}</td>
                                        @if ($bophan->trang_thai == 1)
                                            <td style="text-align: center; color:green"> Kích hoạt</td>
                                        @else
                                            <td style="text-align: center; color:red"> Ngừng hoạt động</td>
                                        @endif
                                        <td>{{ $bophan->ghi_chu }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('boPhan.show', ['id' => $bophan->id]) }}"
                                                class="btn btn-info">Xem </a>
                                            @can('sua-bo-phan')
                                                <a href="{{ route('boPhan.edit', ['id' => $bophan->id]) }}"
                                                    class="btn btn-success">Sửa </a>
                                            @endcan
                                            @can('xoa-bo-phan')
                                                <a href="{{ route('boPhan.delete', ['id' => $bophan->id]) }}"
                                                    class="delete btn btn-danger"
                                                    onclick="return confirm('Bạn có muốn xóa bộ phận này ?');">Xóa </a>
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
