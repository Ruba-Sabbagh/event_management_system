<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $program_id
 * @property string $program_code
 * @property string $program_name
 * @property string $program_name_ar
 * @property string $program_desc
 * @property integer $admission_display
 * @property integer $mandatory_specs
 * @property string $registration_url
 * @property integer $registration_active
 * @property string $registration_guide_url
 * @property integer $payment_active
 * @property integer $registration_failed_active
 * @property integer $visible_marks
 * @property integer $display
 * @property boolean $display_wd
 * @property boolean $is_master
 * @property string $program_code_mail_list
 * @property integer $ex_admission_display
 * @property boolean $admission_enabled
 * @property boolean $training_program
 * @property IsisConditionGraduation[] $isisConditionGraduations
 * @property IsisMentionGraduation[] $isisMentionGraduations
 */
class isis_programs extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'program_id';

    /**
     * @var array
     */
    protected $fillable = ['program_code', 'program_name', 'program_name_ar', 'program_desc', 'admission_display', 'mandatory_specs', 'registration_url', 'registration_active', 'registration_guide_url', 'payment_active', 'registration_failed_active', 'visible_marks', 'display', 'display_wd', 'is_master', 'program_code_mail_list', 'ex_admission_display', 'admission_enabled', 'training_program'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function isisConditionGraduations()
    {
        return $this->hasMany('App\Models\IsisConditionGraduation', 'program_id', 'program_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function isisMentionGraduations()
    {
        return $this->hasMany('App\Models\IsisMentionGraduation', 'pid', 'program_id');
    }
}
