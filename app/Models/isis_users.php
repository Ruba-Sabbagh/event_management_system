<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_first_name_eng
 * @property string $user_father_name_eng
 * @property string $user_last_name_eng
 * @property string $user_full_name_eng
 * @property string $user_first_name_ar
 * @property string $user_father_name_ar
 * @property string $user_last_name_ar
 * @property string $user_full_name_ar
 * @property string $program_id
 * @property string $user_pass
 * @property string $last_pass_1
 * @property string $last_pass_2
 * @property string $user_gender
 * @property string $user_address
 * @property string $user_phone
 * @property string $user_mbl
 * @property string $user_email
 * @property boolean $user_active
 * @property string $user_last_login
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
 * @property string $user_sid
 * @property string $photo
 * @property string $sid_photo
 * @property string $user_personal_email
 */
class isis_users extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var array
     */
    protected $fillable = ['user_name', 'user_first_name_eng', 'user_father_name_eng', 'user_last_name_eng', 'user_full_name_eng', 'user_first_name_ar', 'user_father_name_ar', 'user_last_name_ar', 'user_full_name_ar', 'program_id', 'user_pass', 'last_pass_1', 'last_pass_2', 'user_gender', 'user_address', 'user_phone', 'user_mbl', 'user_email', 'user_active', 'user_last_login', 'group_id', 'last_pass_modified', 'user_trusted', 'coordinator', 'super_admin', 'nfc', 'pass_crypt', 'archive_sys_role', 'auth_level', 'course_bank', 'create_date', 'archive_file', 'user_sid', 'photo', 'sid_photo', 'user_personal_email'];
}
