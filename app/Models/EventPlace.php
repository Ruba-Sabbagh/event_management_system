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
 * Class EventPlace
 * 
 * @property int $id
 * @property string $name
 * @property string $en_name
 * @property string $Sitting_plan
 * @property int|null $call_num
 * @property int|null $row_num
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Event[] $events
 *
 * @package App\Models
 */
class EventPlace extends Model
{
	use SoftDeletes;
	protected $table = 'event_place';

	protected $casts = [
		'call_num' => 'int',
		'row_num' => 'int'
	];

	protected $fillable = [
		'name',
		'en_name',
		'Sitting_plan',
		'call_num',
		'row_num',
		'image'
	];

	public function events()
	{
		return $this->hasMany(Event::class, 'event_place');
	}
}
