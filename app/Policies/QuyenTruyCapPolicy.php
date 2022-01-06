<?php

namespace App\Policies;

use App\Models\QuyenTruyCap;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuyenTruyCapPolicy
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
     * @param  \App\Models\QuyenTruyCap  $quyenTruyCap
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->checkQuyenTruyCap('danh-sach-quyen-truy-cap');
    }
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->checkQuyenTruyCap('them-quyen-truy-cap');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\QuyenTruyCap  $quyenTruyCap
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->checkQuyenTruyCap('sua-quyen-truy-cap');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\QuyenTruyCap  $quyenTruyCap
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->checkQuyenTruyCap('xoa-quyen-truy-cap');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\QuyenTruyCap  $quyenTruyCap
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, QuyenTruyCap $quyenTruyCap)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\QuyenTruyCap  $quyenTruyCap
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, QuyenTruyCap $quyenTruyCap)
    {
        //
    }
}
