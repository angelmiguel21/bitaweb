<?php 

namespace App;

use Esensi\Model\Contracts\HashingModelInterface;
use Esensi\Model\Contracts\PurgingModelInterface;
use Esensi\Model\Contracts\ValidatingModelInterface;
use Esensi\Model\Traits\HashingModelTrait;
use Esensi\Model\Traits\PurgingModelTrait;
use Esensi\Model\Traits\ValidatingModelTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, ValidatingModelInterface, HashingModelInterface, PurgingModelInterface
{
    use Authenticatable, CanResetPassword, ValidatingModelTrait, EntrustUserTrait, PurgingModelTrait, HashingModelTrait;

    protected $throwValidationExceptions = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'telefono', 'unidad', 'usuario', 'password_confirmation'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $purgeable = [
        'password_confirmation',
    ];

    protected $hashable = ['password'];

    protected $rulesets = [

        'creating' => [
            'email'      => 'required|email|unique:users',
            'password'   => 'required|confirmed',
        ],

        'updating' => [
            'email'      => 'required|email|unique:users',
            'password'   => 'confirmed',
        ],
    ];

}





