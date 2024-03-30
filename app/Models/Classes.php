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
 * Class Class
 *
 * @property int $id
 * @property string $name
 * @property string $color
 * @property string $lang
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Invitation[] $invitations
 *
 * @package App\Models
 */
class Classes extends Model
{
	use SoftDeletes;
	protected $table = 'classes';

	protected $fillable = [
		'name',
		'color',
		'lang'
	];

	public function invitations()
	{
		return $this->hasMany(Invitation::class, 'class');
	}
}
