@extends('master')

@section('title', 'Danh sách văn bản đi')
@section('main')

    
    <form action="" class="form-inline" >
    
        <div class="form-group">
            <input class="form-control" name="key" placeholder="Tìm kiếm bằng tên văn bản đi">
        </div>       

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>

        <!-- Dựa vào chức năng toàn màn hình, sửa thành chức năng thêm -->
        <ul class="navbar-nav ml-auto">
            <a href="{{route('vanBanDi.create')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i>
            </a>
        </ul>
    </form>
    
    <hr>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ngày gửi</th>
                <th>Số VB đi</th>
                <th>ĐVBH</th>
                <th>Ký hiệu</th>
                <th>Trích yếu</th>
                <th>Người kí</th>
                <th>NV phát hành</th>
                <th class="text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $vanbandi)
            <tr>
                <td>{{$vanbandi->ngay_gui}}</td>
                <td>{{$vanbandi->so_vb_di}}</td>
                <td>{{$vanbandi->noi_gui}}</td>
                <td>{{$vanbandi->ki_hieu}}</td>
                <td>{{$vanbandi->trich_yeu}}</td>
                <td>{{$vanbandi->nguoi_ky}}</td>
                <td>{{$vanbandi->nv_phathanh}}</td>
                <td class="text-right">
                    <form method="POST" action="{{route('vanBanDi.destroy', $vanbandi->id)}}">
                        @csrf @method('DELETE')
                        <a class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>   

    <hr>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-6">
            {{$data->appends(request()->all())->links()}}
        </div>  
    </div>    

@stop();
