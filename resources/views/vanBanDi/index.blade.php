@extends('layouts.admin')

@section('title')
    Danh sách văn bản đi
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Danh sách văn bản đi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <form action="">
                            <div class="input-group input-group-md">
                                <input type="search" class="form-control form-control-md" name="key"
                                    placeholder="Tìm kiếm văn bản đi bằng trích dẫn">
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
                        @can('them-van-ban-di')
                            <a href="{{ route('vanBanDi.create') }}" class="btn btn-info float-right m-2">Thêm mới </a>
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
                                <tr style="text-align: center">
                                    <th>Ngày gửi</th>
                                    <th style="width: 18%">Nơi nhận</th>
                                    <th>Ký hiệu</th>
                                    <th style="width: 20%">Trích yếu</th>
                                    <th style="width: 12%">Danh sách file</th>
                                    <th>Người kí</th>
                                    <th style="width: 18%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $vanbandi)
                                    <tr>
                                        <td>{{ $vanbandi->ngay_gui }}</td>
                                        <td>{{ optional($vanbandi->noiNhan)->ten_co_quan }}</td>
                                        <td style="text-align: center">{{ $vanbandi->ki_hieu }}</td>
                                        <td>{{ $vanbandi->trich_yeu }}</td>
                                        @if (!empty($vanbandi->file_path))
                                            <td style=" word-break: keep-all;"><a
                                                    href="{{ $vanbandi->file_path }}">{{ $vanbandi->ds_file }}</a></td>
                                        @else
                                            <td style="text-align: center; color:red">Không có file đính kèm</td>
                                        @endif
                                        <td>{{ optional($vanbandi->nguoiKy)->name }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('vanBanDi.show', ['id' => $vanbandi->id]) }}"
                                                class="btn btn-info">Xem </a>
                                            @can('sua-van-ban-di')
                                                <a href="{{ route('vanBanDi.edit', ['id' => $vanbandi->id]) }}"
                                                    class="btn btn-success">Sửa </a>
                                            @endcan
                                            @can('xoa-van-ban-di')
                                                <a href="{{ route('vanBanDi.delete', ['id' => $vanbandi->id]) }}"
                                                    class="delete btn btn-danger"
                                                    onclick="return confirm('Bạn có muốn xóa văn bản này ?');">Xóa </a>
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
