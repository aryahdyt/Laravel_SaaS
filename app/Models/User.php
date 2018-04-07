<?php

namespace App\Models;

use App\Models\traits\HasSubscriptions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\traits\HasConfirmationTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable,
        HasConfirmationTokens,
        Billable,
        HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Checks if User account has been activated
     *
     * @return mixed
     */
    public function hasActivated()
    {
        return $this->activated;
    }

    /**
     *  Checks if User account hasn't been activated
     *
     * @return bool
     */
    public function hasNotActivated()
    {
        return !$this->hasActivated();
    }
}
