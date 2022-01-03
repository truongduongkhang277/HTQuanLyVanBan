<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageFileTrait{
    // để có thể tối ưu code tối đa
    
    public function storageTraitUpload($request, $fieldName, $folderName){
    // lấy tên file truyền vào
        $file = request()->file($fieldName); 
        if($file) { 
            $fileNameOrigin = $file->getClientOriginalName(); 
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension(); 
            // lưu tại public.vanBanDi
            // lấy id của người dùng upload file
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath),
            ];
            return $dataUploadTrait;
        }      
        return null;   


    }
}
