<?php

namespace App\Policies;

use App\Models\HinhThuc;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HinhThucPolicy
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
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->checkQuyenTruyCap('danh-sach-hinh-thuc');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->checkQuyenTruyCap('them-hinh-thuc');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->checkQuyenTruyCap('sua-hinh-thuc');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->checkQuyenTruyCap('xoa-hinh-thuc');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, HinhThuc $hinhThuc)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HinhThuc  $hinhThuc
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, HinhThuc $hinhThuc)
    {
        //
    }
}
