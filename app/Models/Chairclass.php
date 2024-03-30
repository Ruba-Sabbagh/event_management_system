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
 * Class Chairclass
 *
 * @property int $id
 * @property string $name
 * @property string|null $img
 * @property string $color
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Chair[] $chairs
 *
 * @package App\Models
 */
class Chairclass extends Model
{
	use SoftDeletes;
	protected $table = 'chairclass';

	protected $fillable = [
		'name',
		'img',
		'color'
	];

	public function chairs()
	{
		return $this->hasMany(Chair::class, 'chairclass');
	}
}
