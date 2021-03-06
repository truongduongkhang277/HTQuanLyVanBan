<?php

namespace App\Policies;

use App\Models\TheLoai;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TheLoaiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->checkQuyenTruyCap('danh-sach-the-loai');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->checkQuyenTruyCap('them-the-loai');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->checkQuyenTruyCap('sua-the-loai');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->checkQuyenTruyCap('xoa-the-loai');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TheLoai $theLoai)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TheLoai $theLoai)
    {
        //
    }
}
