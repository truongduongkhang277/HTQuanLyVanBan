@extends('master')
@section('title', 'Danh sách cơ quan')
@section('main')

    
    <form action="" class="form-inline" >
    
        <div class="form-group">
            <input class="form-control" name="key" placeholder="Tìm kiếm bằng tên cơ quan">
        </div>       

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>

        <!-- Dựa vào chức năng toàn màn hình, sửa thành chức năng thêm -->
        <ul class="navbar-nav ml-auto">
            <a href="{{route('coQuan.create')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i>
            </a>
        </ul>
    </form>
    
    <hr>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã CQ</th>
                <th>Tên cơ quan</th>
                <th>Địa chỉ</th>
                <th class="text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $coquan)
            <tr>
                <td>{{$coquan->id}}</td>
                <td>{{$coquan->ten_co_quan}}</td>
                <td>{{$coquan->dia_chi}}</td>
                <td class="text-right">
                    <form method="POST" action="{{route('coQuan.destroy', $coquan->id)}}">
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
            <div class="col-3"></div>
            <div>
                {{$data->appends(request()->all())->links()}}
            </div>  
        </div>    

@stop();

<!-- @section('js')

    <script>
        // khi mà nút delete được chọn thì sẽ gọi sự kiện
        $('.btndelete').click(function(event){
            event.preventDefault();
            var _href = $(this).attr('href');
            
            alert(_href);
            // gán href vừa lấy được từ click del sang cho form del
            //$('form#form-delete').attr('action', _href);
            
            // if(confirm('Bạn có muốn xóa cơ quan được chọn không ?')){
            //     $('form#form-delete').submit();
            // }
        })
    </script>

@stop -->