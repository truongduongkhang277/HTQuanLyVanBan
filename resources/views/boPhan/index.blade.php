@extends('layouts.master')
@section('title', 'Danh sách bộ phận')
@section('main')
<div class="panel panel-primary">
    <div class="panel-body">
        <form action="" class="form-inline">
            <div class="form-group">
                <input class="form-control" name="key" placeholder="Tìm kiếm bằng tên bộ phận" style="width: 300px; text-align:center;">&emsp;
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
            <!-- Dựa vào chức năng toàn màn hình, sửa thành chức năng thêm -->
            <ul class="navbar-nav ml-auto">
                <a href="{{route('bophan.create')}}" class="btn btn-primary">
                    <i class="fas fa-plus">&ensp;Thêm mới</i>
                </a>
            </ul>
        </form>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã bộ phận</th>
                    <th>Tên bộ phận</th>
                    <th>Kí hiệu</th>
                    <th>Trưởng bộ phận</th>
                    <th>Trạng thái</th>
                    <th>Ghi chú</th>
                    <th class="text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $bophan)
                <tr>
                    <td>{{$bophan->id}}</td>
                    <td>{{$bophan->bo_phan}}</td>
                    <td>{{$bophan->ki_hieu}}</td>
                    <td>{{$bophan->truong_bo_phan}}</td>
                    <td>{{$bophan->trang_thai}}</td>
                    <td>{{$bophan->ghi_chu}}</td>
                    <td class="text-right">
                        <a href="{{route('bophan.edit', $bophan->id)}}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('bophan.show', $bophan->id)}}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="row">
            <div class="col-5"></div>
            <div class="col-6">
                {{$data->appends(request()->all())->links()}}
            </div>
        </div>
    </div>
</div>
@stop();