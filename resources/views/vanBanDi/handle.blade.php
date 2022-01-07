@extends('layouts.admin')

@section('title')
    Chuyển xử lý văn bản đi
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Chuyển xử lý văn bản đi</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('vanBanDi.handlePost', $vanBanDi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf @method('PUT')
                            @include('partials.alert')
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="my-input">Văn bản cần chuyển</label>
                                        <textarea class="form-control" type="text" name="trich_yeu" rows="3"
                                            placeholder="Trích yếu của văn bản đi"> {{ $vanBanDi->trich_yeu }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        @if (!empty($vanBanDi->file_path))
                                            <td style=" word-break: keep-all;"><a
                                                    href="{{ $vanBanDi->file_path }}">{{ $vanBanDi->ds_file }}</a>
                                            </td>
                                        @else
                                            <td style="text-align: center">Không có file đính kèm</td>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="my-input">Nhân viên</label>
                                        <select class="form-control" type="text" name="nguoi_dung" required>
                                            <option value="">Chọn một</option>
                                            @foreach ($nguoiDung as $nguoi_dung)
                                                <option value="{{ $nguoi_dung->id }}">{{ $nguoi_dung->name }}

                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <a href="{{ route('vanBanDi.index') }}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
