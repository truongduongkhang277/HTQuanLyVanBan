<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChucDanh;
use App\Models\BoPhan;
use App\Models\NguoiDung;
use App\Models\ChucNangNguoiDung;
use App\Models\QuyenTruyCap;
use App\Models\VaiTro;
use App\Traits\StorageFileTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
    use StorageFileTrait;

    private $nguoiDung;

    public function __construct(User $nguoiDung){
        $this->nguoiDung = $nguoiDung;
    }
    
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
        $vaiTro   = VaiTro::orderBy('id', 'ASC')->get();
        $boPhan   = BoPhan::orderBy('bo_phan', 'ASC')->get();
        return view('nguoiDung.add', compact('vaiTro', 'boPhan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',            
            'password' => 'required|min:6|max:50',
            'ngay_sinh' => 'required',            
            'gioi_tinh' => 'required',
            'dia_chi' => 'required',
        ], [
            'name.required'      => 'Tên người dùng không được để trống !!',
            'email.required'     => 'Tên đăng nhập không được để trống !!',
            'password.required'  => 'Mật khẩu không được để trống !!',
            'password.min'       => 'Mật khẩu dài tối thiểu 6 kí tự !!',
            'password.max'       => 'Mật khẩu dài tối đa 50 kí tự !!',
            'ngay_sinh.required' => 'Ngày sinh không được để trống !!',
            'gioi_tinh.required' => 'Giới tính không được để trống !!',
            'dia_chi.required'   => 'Địa chỉ không được để trống !!',
        ]);

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
                'bo_phan'     => $request->bo_phan,
                'vai_tro'     => $request->vai_tro,
                'created_by'  => auth()->id(),
            ];
            
            $fileUpload = $this->storageTraitUpload($request, 'anh', 'avatar');
            
            if(!empty($fileUpload)){                
                $data['anh'] = $fileUpload['file_name'];
                $data['file_path'] = $fileUpload['file_path'];
            }
    
            $add = User::create($data);
            // khi tạo mới user hoàn tất, đưa dữ liệu vào bảng vaitro_nguoidung 
            $add->cacVaiTro()->attach($request->vai_tro);
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
     * @param  \App\Models\User  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function show(User $nguoiDung, $id)
    {
        $nguoiDung = User::find($id);
        return view('nguoiDung.show', compact('nguoiDung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function edit(User $nguoiDung, $id)
    {
        // truyền biến nguoiDung đến giao diện edit của người dùng
        $nguoiDung = User::find($id);
        $vaiTro   = VaiTro::orderBy('id', 'ASC')->get();
        $boPhan   = BoPhan::orderBy('bo_phan', 'ASC')->get();
        $vaiTroNguoiDung = $nguoiDung->cacVaiTro;
        
        return view('nguoiDung.edit', compact('nguoiDung', 'vaiTro', 'boPhan', 'vaiTroNguoiDung'));
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
        //validate
        $request->validate([
            'name' => 'required',
            'ngay_sinh' => 'required',            
            'gioi_tinh' => 'required',
            'dia_chi' => 'required',
            'so_dt' => 'required',
            'bo_phan' => 'required',
        ], [
            'name.required'      => 'Tên người dùng không được để trống !!',
            'password.min'       => 'Mật khẩu dài tối thiểu 6 kí tự !!',
            'password.max'       => 'Mật khẩu dài tối đa 50 kí tự !!',
            'ngay_sinh.required' => 'Ngày sinh không được để trống !!',
            'gioi_tinh.required' => 'Giới tính không được để trống !!',
            'dia_chi.required'   => 'Địa chỉ không được để trống !!',
            'so_dt.required'     => 'Số điện thoại không được để trống !!',
            'bo_phan.required'     => 'Bộ phận không được để trống !!',
        ]);

        try{
            DB::beginTransaction();
            $data = [
                'name'        => $request->name, 
                'ngay_sinh'   => $request->ngay_sinh,
                'so_dt'       => $request->so_dt,
                'gioi_tinh'   => $request->gioi_tinh,
                'dia_chi'     => $request->dia_chi,
                'trang_thai'  => $request->trang_thai,
                'bo_phan'     => $request->bo_phan,
                'vai_tro'     => $request->vai_tro,
            ];
            
            $fileUpload = $this->storageTraitUpload($request, 'anh', 'avatar');
            
            if(!empty($fileUpload)){                
                $data['anh'] = $fileUpload['file_name'];
                $data['file_path'] = $fileUpload['file_path'];
            }
            $nguoiDung = User::find($id);
            
            $nguoiDung->update($data);

            $nguoiDung->cacVaiTro()->sync($request->vai_tro);
            DB::commit();
            return redirect()->route('nguoiDung.index')->with('success', 'Cập nhật thành công');;
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
    public function destroy(User $nguoiDung, $id)
    {
        $nguoiDung->find($id)->delete();
        return redirect()->route('nguoiDung.index')->with('success','Xóa tài khoản thành công');
    }

    public function editInfo(User $nguoiDung){
        $nguoiDung = User::find(auth()->user()->id);
        $boPhan   = BoPhan::orderBy('bo_phan', 'ASC')->get();
        return view('nguoiDung.editInfo', compact('nguoiDung', 'boPhan'));
    }

    public function updateInfo(Request $request, User $nguoiDung){
//validate
        $request->validate([
            'name' => 'required',          
            'ngay_sinh' => 'required',            
            'gioi_tinh' => 'required',
            'dia_chi' => 'required',
            'so_dt' => 'required',
            'bo_phan' => 'required',
        ], [
            'name.required'      => 'Tên người dùng không được để trống !!',
            'ngay_sinh.required' => 'Ngày sinh không được để trống !!',
            'gioi_tinh.required' => 'Giới tính không được để trống !!',
            'dia_chi.required'   => 'Địa chỉ không được để trống !!',
            'so_dt.required'     => 'Số điện thoại không được để trống !!',
            'bo_phan.required'     => 'Bộ phận không được để trống !!',
        ]);
        try{
            DB::beginTransaction();
            $data = [
                'name'        => $request->name, 
                'ngay_sinh'   => $request->ngay_sinh,
                'so_dt'       => $request->so_dt,
                'gioi_tinh'   => $request->gioi_tinh,
                'dia_chi'     => $request->dia_chi,
                'bo_phan'     => $request->bo_phan,
            ];
            
            $fileUpload = $this->storageTraitUpload($request, 'anh', 'avatar');
            
            if(!empty($fileUpload)){                
                $data['anh'] = $fileUpload['file_name'];
                $data['file_path'] = $fileUpload['file_path'];
            }
            $nguoiDung = User::find(auth()->user()->id);
            
            $nguoiDung->update($data);

            DB::commit();
            return redirect()->route('profile')->with('success', 'Cập nhật thành công');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Cập nhật không thành công');
        }

    }

    public function changePassword(User $nguoiDung){
        $nguoiDung = User::find(auth()->user()->id);
        return view('nguoiDung.changePassword', compact('nguoiDung'));
    }

    public function updatePassword(Request $request){        
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Mật khẩu không đúng. Vui lòng thử lại");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","Mật khẩu mới không thể giống mật khẩu cũ. Vui lòng thử lại.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ], [
            'current-password.required' => 'Mật khẩu hiện tại không được để trống !!!',
            'new-password.required' => 'Mật khẩu mới không được để trống !!!',
            'new-password.min' => 'Mật khẩu mới dài tối thiểu 8 kí tự !!!',
            'new-password.confirmed' => 'Mật khẩu mới không trùng nhau !!!',
        ]);

        //Change Password
        $newpassword = bcrypt($request->get('new-password'));
        User::find(auth()->user()->id)->update(['password'=>$newpassword]);

        return redirect()->route('profile')->with('success', 'Cập nhật mật khẩu thành công');
    }
}
