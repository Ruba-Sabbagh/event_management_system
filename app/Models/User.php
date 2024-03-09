<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * @property integer $id
 * @property string $name
 * @property string $first_name_eng
 * @property string $father_name_eng
 * @property string $last_name_eng
 * @property string $full_name_eng
 * @property string $first_name_ar
 * @property string $father_name_ar
 * @property string $last_name_ar
 * @property string $full_name_ar
 * @property string $password
 * @property string $gender
 * @property string $address
 * @property string $phone
 * @property string $mbl
 * @property string $email
 * @property boolean $active
 * @property string $last_login
 * @property integer $group_id
 * @property integer $last_pass_modified
 * @property boolean $user_trusted
 * @property integer $coordinator
 * @property boolean $super_admin
 * @property string $nfc
 * @property string $pass_crypt
 * @property string $archive_sys_role
 * @property boolean $auth_level
 * @property string $course_bank
 * @property string $create_date
 * @property string $archive_file
 * @property string $sid
 * @property string $photo
 * @property string $sid_photo
 * @property string $personal_email
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'first_name_eng', 'father_name_eng', 'last_name_eng', 'full_name_eng', 'first_name_ar', 'father_name_ar',
     'last_name_ar', 'full_name_ar','password',
     'gender', 'address', 'phone',
     'mbl', 'email', 'active', 'last_login', 'group_id', 'last_pass_modified', 'user_trusted',
     'coordinator', 'super_admin', 'nfc', 'pass_crypt',
     'archive_sys_role', 'auth_level', 'course_bank', 'create_date', 'archive_file', 'sid',
     'photo', 'sid_photo', 'personal_email'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Groups::class);
    }
}
