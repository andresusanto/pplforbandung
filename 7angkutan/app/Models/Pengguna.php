<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use URL;
use Session;

class Pengguna extends Model implements AuthenticatableContract {

    use Authenticatable;

	protected $table = 'pengguna';
    public $timestamps = false;

    const CLIENT_ID = '2SStDhCkPQJzWNmZ';
    const CLIENT_SECRET = 'YqtdTvKQq9aAUo2g';
    const REDIRECT_URI = 'http://angkutan.pplbandung.biz.tm/oauth/after-authorized';


    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
        // not supported
    }

    public function getRememberTokenName()
    {
    return null; // not supported
    }

    /**
    * Overrides the method to ignore the remember token.
    */
    public function setAttribute($key, $value)
    {
    $isRememberTokenAttribute = $key == $this->getRememberTokenName();
    if (!$isRememberTokenAttribute)
    {
      parent::setAttribute($key, $value);
    }
    }

    public static function getClientId(){
        return self::CLIENT_ID;
    }

    public static function getClientSecret(){
        return self::CLIENT_SECRET;
    }

    public static function getRedirectURI(){
        return self::REDIRECT_URI;
    }

    public static function getAuthorizationCode()
    {
        return Session::get('_oauth_auth_code');
    }
    public static function setAuthorizationCode($value)
    {
        Session::set('_oauth_auth_code',$value);
    }

    public static function setAccessToken($value)
    {
        Session::set('_oauth_access_token',$value);
    }

    public static function getAccessToken()
    {
       return Session::get('_oauth_access_token');
    }

    public static function setAccessTokenExpiry($value)
    {
        Session::set('_oauth_access_token_expiry',intval($value));
    }

    public static function getAccessTokenExpiry()
    {
        return Session::get('_oauth_access_token_expiry');
    }

    public static function validAccessToken()
    {
        return (Session::has('_oauth_access_token')) && (!self::expiredAccessToken());
    }

    public static function expiredAccessToken()
    {
        //gak pake permanen2nan
        return false;
        //return time() > Session::get('_oauth_access_token_expiry');
    }
}
