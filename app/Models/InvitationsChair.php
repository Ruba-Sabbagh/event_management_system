<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InvitationsChair
 * 
 * @property int $id
 * @property int $invitation_id
 * @property int $chair_id
 * @property bool $status
 * @property Carbon $data
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Chair $chair
 * @property Invitation $invitation
 * @property User|null $user
 *
 * @package App\Models
 */
class InvitationsChair extends Model
{
	use SoftDeletes;
	protected $table = 'invitations_chair';

	protected $casts = [
		'invitation_id' => 'int',
		'chair_id' => 'int',
		'status' => 'bool',
		'data' => 'datetime',
		'user_id' => 'int'
	];

	protected $fillable = [
		'invitation_id',
		'chair_id',
		'status',
		'data',
		'user_id'
	];

	public function chair()
	{
		return $this->belongsTo(Chair::class);
	}

	public function invitation()
	{
		return $this->belongsTo(Invitation::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
