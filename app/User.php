<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

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
	protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'created_by',
        'updated_by'
    ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }

    public function getCreated($model_name)
    {
        return $this->hasMany('App\Models\\'.$model_name,'created_by');
    }
    public function getUpdated($model_name)
    {
        return $this->hasMany('App\Models\\'.$model_name,'updated_by');
    }

    public function hasPermission($permission_name)
    {
        $permissions = $this->permissions()->get();
        foreach($permissions as $permission){
            if($permission->name == strtolower($permission_name)){
                return true;
            }
        }

        return false;
    }

    public function getPermissionListAttribute()
    {
        return $this->permissions()->lists('id');
    }

    public function getFullName()
    {
        return "$this->first_name $this->last_name";
    }

    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function updater()
    {
        return $this->belongsTo('App\User','updated_by');
    }

}
