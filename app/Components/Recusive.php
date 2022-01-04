<?php

namespace App\Components;

class Recusive {

    private $data;
    private $htmlSelect = '';

    // biến data được truyền từ controller sang
    public function __construct($data)
    {
        $this->data = $data;
    }

    // hiển thị chọn đệ quy trong giao diện thêm mới/ chỉnh sửa của quyền truy cập
    public function permissionRecusive($id = 0, $text = '' ){
        foreach($this->data as $value){
            if($value['parent_id'] == $id){
                $this->htmlSelect .= "<option value='" .$value['id']."'>".$text.$value['quyen_truy_cap']."</option>";
                $this->permissionRecusive($value['id'], $text. '--');
            }
        }
        return $this->htmlSelect;
    }
}

?>
