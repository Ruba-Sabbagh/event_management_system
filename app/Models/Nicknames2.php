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
 * Class Nicknames2
 * 
 * @property int $id
 * @property string $name
 * @property string $lang
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Invitation[] $invitations
 *
 * @package App\Models
 */
class Nicknames2 extends Model
{
	use SoftDeletes;
	protected $table = 'nicknames2';

	protected $fillable = [
		'name',
		'lang'
	];

	public function invitations()
	{
		return $this->hasMany(Invitation::class, 'nickname2');
	}
}
