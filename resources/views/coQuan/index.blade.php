@extends('layouts.admin')

@section('title')
    Danh sách cơ quan
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Danh sách cơ quan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <form action="">
                            <div class="input-group input-group-md">
                                <input type="search" class="form-control form-control-md" name="key"
                                    placeholder="Tìm kiếm cơ quan bằng tên cơ quan">
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
                        @can('them-co-quan')
                            <a href="{{ route('coQuan.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr style="text-align:center">
                                    <th>Mã Cơ quan</th>
                                    <th>Tên cơ quan</th>
                                    <th>Địa chỉ</th>
                                    <th style="width: 12%">Trạng thái</th>
                                    <th style="width: 18%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $coquan)
                                    <tr>
                                        <td style="text-align:center">{{ $coquan->id }}</td>
                                        <td>{{ $coquan->ten_co_quan }}</td>
                                        <td>{{ $coquan->dia_chi }}</td>

                                        @if ($coquan->trang_thai == 1)
                                            <td style="text-align: center; color:green"> Kích hoạt</td>
                                        @else
                                            <td style="text-align: center; color:red"> Ngừng hoạt động</td>
                                        @endif

                                        <td style="text-align: center">
                                            <a href="{{ route('coQuan.show', ['id' => $coquan->id]) }}"
                                                class="btn btn-info">Xem </a>
                                            @can('sua-co-quan')
                                                <a href="{{ route('coQuan.edit', ['id' => $coquan->id]) }}"
                                                    class="btn btn-success">Sửa </a>
                                            @endcan
                                            @can('xoa-co-quan')
                                                <a href="{{ route('coQuan.delete', ['id' => $coquan->id]) }}"
                                                    class="delete btn btn-danger"
                                                    onclick="return confirm('Bạn có muốn xóa cơ quan này ?');">Xóa </a>
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
