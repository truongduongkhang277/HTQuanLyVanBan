<?php
    
    namespace App\Services;

    use Illuminate\Support\Facades\Gate;

    class QuyenTruyCapGateAndPolicy{

        public function setGateAndPolicy(){
            
            $this->defineGateBoPhan();

            $this->defineGateCoQuan();
    
            $this->defineGateDoKhan();
    
            $this->defineGateDoMat();
    
            $this->defineGateHinhThucChuyen();
    
            $this->defineGateHinhThucLuu();
    
            $this->defineGateHinhThuc();
    
            $this->defineGateLinhVuc();
    
            $this->defineGateNguoiDung();
    
            $this->defineGateQuyenTruyCap();
    
            $this->defineGateTheLoai();
    
            $this->defineGateTrangThai();
    
            $this->defineGateVaiTro();
    
            $this->defineGateVanBanDen();
    
            $this->defineGateVanBanDi();
        }

        public function defineGateBoPhan(){
            Gate::define('danh-sach-bo-phan', 'App\Policies\BoPhanPolicy@view');
            Gate::define('them-bo-phan', 'App\Policies\BoPhanPolicy@create');
            Gate::define('sua-bo-phan', 'App\Policies\BoPhanPolicy@update');
            Gate::define('xoa-bo-phan', 'App\Policies\BoPhanPolicy@delete');
        }
    
        public function defineGateCoQuan(){
            Gate::define('danh-sach-co-quan', 'App\Policies\CoQuanPolicy@view');
            Gate::define('them-co-quan', 'App\Policies\CoQuanPolicy@create');
            Gate::define('sua-co-quan', 'App\Policies\CoQuanPolicy@update');
            Gate::define('xoa-co-quan', 'App\Policies\CoQuanPolicy@delete');
        }
    
        public function defineGateDoKhan(){
            Gate::define('danh-sach-do-khan', 'App\Policies\DoKhanPolicy@view');
            Gate::define('them-do-khan', 'App\Policies\DoKhanPolicy@create');
            Gate::define('sua-do-khan', 'App\Policies\DoKhanPolicy@update');
            Gate::define('xoa-do-khan', 'App\Policies\DoKhanPolicy@delete');
        }
    
        public function defineGateDoMat(){
            Gate::define('danh-sach-do-mat', 'App\Policies\DoMatPolicy@view');
            Gate::define('them-do-mat', 'App\Policies\DoMatPolicy@create');
            Gate::define('sua-do-mat', 'App\Policies\DoMatPolicy@update');
            Gate::define('xoa-do-mat', 'App\Policies\DoMatPolicy@delete');
        }
    
        public function defineGateHinhThucChuyen(){
            Gate::define('danh-sach-hinh-thuc-chuyen', 'App\Policies\HinhThucChuyenPolicy@view');
            Gate::define('them-hinh-thuc-chuyen', 'App\Policies\HinhThucChuyenPolicy@create');
            Gate::define('sua-hinh-thuc-chuyen', 'App\Policies\HinhThucChuyenPolicy@update');
            Gate::define('xoa-hinh-thuc-chuyen', 'App\Policies\HinhThucChuyenPolicy@delete');
        }
    
        public function defineGateHinhThucLuu(){
            Gate::define('danh-sach-hinh-thuc-luu', 'App\Policies\HinhThucLuuPolicy@view');
            Gate::define('them-hinh-thuc-luu', 'App\Policies\HinhThucLuuPolicy@create');
            Gate::define('sua-hinh-thuc-luu', 'App\Policies\HinhThucLuuPolicy@update');
            Gate::define('xoa-hinh-thuc-luu', 'App\Policies\HinhThucLuuPolicy@delete');
        }
    
        public function defineGateHinhThuc(){
            Gate::define('danh-sach-hinh-thuc', 'App\Policies\HinhThucPolicy@view');
            Gate::define('them-hinh-thuc', 'App\Policies\HinhThucPolicy@create');
            Gate::define('sua-hinh-thuc', 'App\Policies\HinhThucPolicy@update');
            Gate::define('xoa-hinh-thuc', 'App\Policies\HinhThucPolicy@delete');
        }
    
        public function defineGateLinhVuc(){
            Gate::define('danh-sach-linh-vuc', 'App\Policies\LinhVucPolicy@view');
            Gate::define('them-linh-vuc', 'App\Policies\LinhVucPolicy@create');
            Gate::define('sua-linh-vuc', 'App\Policies\LinhVucPolicy@update');
            Gate::define('xoa-linh-vuc', 'App\Policies\LinhVucPolicy@delete');
        }
    
        public function defineGateNguoiDung(){
            Gate::define('danh-sach-tai-khoan', 'App\Policies\NguoiDungPolicy@view');
            Gate::define('them-nguoi-dung', 'App\Policies\NguoiDungPolicy@create');
            Gate::define('sua-nguoi-dung', 'App\Policies\NguoiDungPolicy@update');
            Gate::define('xoa-nguoi-dung', 'App\Policies\NguoiDungPolicy@delete');
        }
    
        public function defineGateQuyenTruyCap(){
            Gate::define('danh-sach-quyen-truy-cap', 'App\Policies\QuyenTruyCapPolicy@view');
            Gate::define('them-quyen-truy-cap', 'App\Policies\QuyenTruyCapPolicy@create');
            Gate::define('sua-quyen-truy-cap', 'App\Policies\QuyenTruyCapPolicy@update');
            Gate::define('xoa-quyen-truy-cap', 'App\Policies\QuyenTruyCapPolicy@delete');
        }
    
        public function defineGateTheLoai(){
            Gate::define('danh-sach-the-loai', 'App\Policies\TheLoaiPolicy@view');
            Gate::define('them-the-loai', 'App\Policies\TheLoaiPolicy@create');
            Gate::define('sua-the-loai', 'App\Policies\TheLoaiPolicy@update');
            Gate::define('xoa-the-loai', 'App\Policies\TheLoaiPolicy@delete');
        }
    
        public function defineGateTrangThai(){
            Gate::define('danh-sach-trang-thai', 'App\Policies\TrangThaiPolicy@view');
            Gate::define('them-trang-thai', 'App\Policies\TrangThaiPolicy@create');
            Gate::define('sua-trang-thai', 'App\Policies\TrangThaiPolicy@update');
            Gate::define('xoa-trang-thai', 'App\Policies\TrangThaiPolicy@delete');
        }
    
        public function defineGateVaiTro(){
            Gate::define('danh-sach-vai-tro', 'App\Policies\VaiTroPolicy@view');
            Gate::define('them-vai-tro', 'App\Policies\VaiTroPolicy@create');
            Gate::define('sua-vai-tro', 'App\Policies\VaiTroPolicy@update');
            Gate::define('xoa-vai-tro', 'App\Policies\VaiTroPolicy@delete');
        }
    
        public function defineGateVanBanDen(){
            Gate::define('danh-sach-van-ban-den', 'App\Policies\VanBanDenPolicy@view');
            Gate::define('them-van-ban-den', 'App\Policies\VanBanDenPolicy@create');
            Gate::define('sua-van-ban-den', 'App\Policies\VanBanDenPolicy@update');
            Gate::define('xoa-van-ban-den', 'App\Policies\VanBanDenPolicy@delete');
        }
    
        public function defineGateVanBanDi(){
            Gate::define('danh-sach-van-ban-di', 'App\Policies\VanBanDiPolicy@view');
            Gate::define('them-van-ban-di', 'App\Policies\VanBanDiPolicy@create');
            Gate::define('sua-van-ban-di', 'App\Policies\VanBanDiPolicy@update');
            Gate::define('xoa-van-ban-di', 'App\Policies\VanBanDiPolicy@delete');
        }

    }

?>
