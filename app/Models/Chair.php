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
 * Class Chair
 *
 * @property int $id
 * @property string $code
 * @property string $firstcode
 * @property int $chairclass
 * @property int $event_place
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Event $event
 * @property Collection|Invitation[] $invitations
 *
 * @package App\Models
 */
class Chair extends Model
{
	use SoftDeletes;
	protected $table = 'chair';

	protected $casts = [
		'chairclass' => 'int',
		'event_place' => 'int'
	];

	protected $fillable = [
		'code',
		'firstcode',
		'chairclass',
		'event_place'
	];

	public function chairclasses()
	{
		return $this->belongsTo(Chairclass::class, 'chairclass');
	}

	public function event_places()
	{
		return $this->belongsTo(EventPlace::class,'event_place');
	}

	public function invitations()
	{
		return $this->belongsToMany(Invitation::class, 'invitations_chair')
					->withPivot('id', 'status',  'user_id', 'deleted_at')
					->withTimestamps();
	}
}
