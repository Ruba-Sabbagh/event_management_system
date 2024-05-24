<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Invitation
 *
 * @property int $id
 * @property int $event_id
 * @property int|null $nickname
 * @property int $nickname2
 * @property int|null $class
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string|null $additional_email
 * @property string $side
 * @property string $orgnisation
 * @property string $position
 * @property string $lang
 * @property bool $type
 * @property string $status
 * @property bool $attendance
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Event $event
 * @property Nicknames2 $nicknames2
 * @property Collection|Chair[] $chairs
 *
 * @package App\Models
 */
class Invitation extends Model
{
	use SoftDeletes;
	protected $table = 'invitations';

	protected $casts = [
		'event_id' => 'int',
		'nickname' => 'int',
		'nickname2' => 'int',
		'class' => 'int',
		'type' => 'bool',
		'attendance' => 'bool'
	];

	protected $fillable = [
		'event_id',
		'nickname',
		'nickname2',
		'class',
		'name',
		'email',
        'mobile',
		'additional_email',
		'side',
        'orgnisation',
		'position',
		'lang',
		'type',
		'status',
		'attendance'
	];

	public function classes()
	{
		return $this->belongsTo(Classes::class, 'class');
	}

	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function nicknames2()
	{
		return $this->belongsTo(Nicknames2::class, 'nickname2');
	}

	public function nickname1()
	{
		return $this->belongsTo(Nickname::class, 'nickname');
	}

	public function chairs()
	{
		return $this->belongsToMany(Chair::class, 'invitations_chair')->join('users','users.id','=','user_id')
					->withPivot('invitations_chair.id', 'status',  'user_id', 'deleted_at','users.name')
					->withTimestamps();

	}
}
