<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'Programs';
    protected $fillable=[
        'program_name',
        'program_name_ar',
        'program_code',
        'desc'
    ];
    public $timestamps = true;

    public function Specialisationprograms()
    {
        return $this->hasMany('Specialisation');
    }

    public function Specialisationprogramp()
    {
        return $this->belongsTo('Program');
    }

}
