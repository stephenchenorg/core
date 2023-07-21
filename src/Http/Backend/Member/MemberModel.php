<?php

namespace Stephenchen\Core\Http\Backend\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Stephenchen\Core\Traits\Model\SerializeDateTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;

class MemberModel extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;
    use HasFactory;
    use SerializeDateTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "members";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'account',
        'email',
        'password',
        'display_name',
        'status',
        'referrer_id',
        'latest_ip',
        'latest_login_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'latest_login_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Mutator Password
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
