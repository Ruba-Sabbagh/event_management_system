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
 * Class Event
 *
 * @property int $id
 * @property string $title
 * @property Carbon $date
 * @property Carbon $time
 * @property int $event_place
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Chair[] $chairs
 * @property Collection|Invitation[] $invitations
 *
 * @package App\Models
 */
class Event extends Model
{
	use SoftDeletes;
	protected $table = 'event';

	protected $casts = [
		'date' => 'datetime',
		'time' => 'datetime',
		'event_place' => 'int'
	];

	protected $fillable = [
		'title',
		'date',
		'time',
		'event_place',
		'image1',
		'image2',
		'image3'
	];

	public function event_places()
	{
		return $this->belongsTo(EventPlace::class, 'event_place');
	}

	public function chairs()
	{
		return $this->hasMany(Chair::class);
	}

	public function invitations()
	{
		return $this->hasMany(Invitation::class);
	}
}
