<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VanBanDi;
use Illuminate\Auth\Access\HandlesAuthorization;

class VanBanDiPolicy
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
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->checkQuyenTruyCap('danh-sach-van-ban-di');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->checkQuyenTruyCap('them-van-ban-di');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->checkQuyenTruyCap('sua-van-ban-di');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->checkQuyenTruyCap('xoa-van-ban-di');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, VanBanDi $vanBanDi)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VanBanDi  $vanBanDi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, VanBanDi $vanBanDi)
    {
        //
    }
}
