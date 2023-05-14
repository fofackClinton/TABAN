<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VehiculReservation
 * 
 * @property int $ID_RESERVATION
 * @property int $ID_PUBLICATION
 * @property int $ID_USERS
 * @property string|null $NOM
 * @property Carbon|null $DATE_DEBUT
 * @property Carbon|null $DATE_FIN
 * @property int|null $IDC
 * @property int|null $IDD
 * 
 * @property User $user
 * @property VehiculPublication $vehicul_publication
 *
 * @package App\Models
 */
class VehiculReservation extends Model
{
	protected $table = 'vehicul_reservation';
	protected $primaryKey = 'ID_RESERVATION';
	public $timestamps = false;

	protected $casts = [
		'ID_PUBLICATION' => 'int',
		'ID_USERS' => 'int',
		'DATE_DEBUT' => 'datetime',
		'DATE_FIN' => 'datetime',
		'IDC' => 'int',
		'IDD' => 'int'
	];

	protected $fillable = [
		'ID_PUBLICATION',
		'ID_USERS',
		'NOM',
		'DATE_DEBUT',
		'DATE_FIN',
		'IDC',
		'IDD'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_USERS');
	}

	public function vehicul_publication()
	{
		return $this->belongsTo(VehiculPublication::class, 'ID_PUBLICATION');
	}
}
