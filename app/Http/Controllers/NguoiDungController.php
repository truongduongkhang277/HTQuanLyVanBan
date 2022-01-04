<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChucDanh;
use App\Models\BoPhan;
use App\Models\NguoiDung;
use App\Models\ChucNangNguoiDung;
use App\Traits\StorageFileTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
    use StorageFileTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trỏ đến hàm scopeSearch trong model user để rút gọn code
        $data = User::orderBy('name', 'ASC')->search()->paginate(15);

        return view('nguoiDung.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nguoiDung.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $password = $request->password;
            $hashedPassword = Hash::make($password);
            $data = [
                'name'        => $request->name, 
                'email'       => $request->email,
                'password'    => $hashedPassword,
                'ngay_sinh'   => $request->ngay_sinh,
                'so_dt'       => $request->so_dt,
                'gioi_tinh'   => $request->gioi_tinh,
                'dia_chi'     => $request->dia_chi,
                'trang_thai'  => $request->trang_thai,
                'created_by'  => auth()->id(),
            ];
            
            $fileUpload = $this->storageTraitUpload($request, 'anh', 'avatar');
            
            if(!empty($fileUpload)){                
                $data['anh'] = $fileUpload['file_name'];
                $data['file_path'] = $fileUpload['file_path'];
            }
    
            $add = User::create($data);
            DB::commit();
            if($add){
                return redirect()->route('nguoiDung.index')->with('success', 'Thêm mới thành công');
            }
        } catch (Exception $e) {
            DB::rollback();
        
            return redirect()->back()->with('error', 'Thêm mới không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function show(NguoiDung $nguoiDung, $id)
    {
        $nguoiDung = NguoiDung::find($id);
        return view('nguoiDung.show', compact('nguoiDung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function edit(NguoiDung $nguoiDung, $id)
    {
        // truyền biến nguoiDung đến giao diện edit của người dùng
        //$chucDanh   = ChucDanh::orderBy('ten_quyen', 'ASC')->get();
        //$boPhan     = BoPhan::orderBy('bo_phan', 'ASC')->get();
        $nguoiDung = NguoiDung::find($id);
        return view('nguoiDung.edit', compact('nguoiDung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $nguoiDung, $id)
    {

        try{
            DB::beginTransaction();
            $data = [
                'name'        => $request->name, 
                'ngay_sinh'   => $request->ngay_sinh,
                'so_dt'       => $request->so_dt,
                'gioi_tinh'   => $request->gioi_tinh,
                'dia_chi'     => $request->dia_chi,
                'trang_thai'  => $request->trang_thai,
                'created_by'  => auth()->id(),
            ];
            
            $fileUpload = $this->storageTraitUpload($request, 'anh', 'avatar');
            
            if(!empty($fileUpload)){                
                $data['anh'] = $fileUpload['file_name'];
                $data['file_path'] = $fileUpload['file_path'];
            }
            $add = User::find($id)->update($data);
            DB::commit();
            if($add){
                return redirect()->route('nguoiDung.index')->with('success', 'Cập nhật thành công');
            }
        } catch (Exception $e) {
            DB::rollback();
        
            return redirect()->back()->with('error', 'Cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function destroy(NguoiDung $nguoiDung, $id)
    {
        $nguoiDung->find($id)->delete();
        return redirect()->route('nguoiDung.index')->with('success','Xóa tài khoản thành công');
    }
}
