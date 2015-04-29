<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class OAuthSession extends Model {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'oauth_sessions';

	public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function accessToken()
    {
    	return $this->hasOne('App\OAuthAccessToken', 'session_id');
    }
}
