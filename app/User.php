<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\RolePermissions;
use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole($id)
    {
        $role = Role::find($id);
        return $role->name;
    }

    static public function havePermission($permission, $role_id)
    {
        $permission = Permission::where('name', $permission)->first();
        if(isset($permission->id))
        {
                $role_permission = RolePermissions::where(['role_id' => $role_id, 'permission_id' => $permission->id])->first();
                if(isset($role_permission->role_id))
                {
                    return true;
                }
        }
        return false;
    }

    public static function sendEmail($toAddress, $subject, $body, $attachment=false)
    {
        $email = array('email_address' => $toAddress, 'subject' => $subject, 'email_body' => $body);
        \Mail::send(array(), array(), function ($message) use ($email, $attachment) {
            $message->from('thedevsforwebapps@gmail.com', 'The Insitute');
            $message->to($email['email_address']);
            $message->subject($email['subject']);
            $message->setBody($email['email_body'], 'text/html');

            if ($attachment != false) {
                $message->attach(storage_path($attachment),
                    [
                        'mime' => 'application/pdf',
                    ]);
            }
        });
    }

    public static function createUserAccount($data, $role_id)
    {
        $token = \Str::random(60);
        $new_user                           = new User();
        $new_user->first_name               = $data['name'] ;
        $new_user->last_name                = $data['last_name'];
        $new_user->username                 = $data['username'];
        $new_user->date_of_birth            = $data['date_of_birth'];
        $new_user->identification_type_id   = $data['identification_type_id'];
        $new_user->id_number                = $data['id_number'];
        $new_user->passport_number          = null;
        $new_user->email                    = $data['email'];
        $new_user->mobile                   = $data['mobile'];
        $new_user->verify_token             = $token;
        $new_user->role_id                  = $role_id;
        $new_user->save();

        $link  = env('APP_URL', 'http://12.0.0.1:8000').'/verify-account?token='.$token;

        $message = '';
        $message .= 'Through student registration, you have created an account as a guardian, to verify your account please click link '.$link.' <br> Regards, <Br><br>'.env('APP_NAME');

        try {
            $new_user::sendEmail($data['email'], 'Verify Account', $message);

        } catch (\Exception $e) {

        }
    }
}
