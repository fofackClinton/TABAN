<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelReservation
 * 
 * @property int $ID_RESERVATION
 * @property int $ID_C_PUB
 * @property int $ID_USERS
 * @property string|null $NOM
 * @property Carbon|null $DATE_DEBUT
 * @property Carbon|null $DATE_FIN
 * @property int|null $IDC
 * @property int|null $IDD
 * 
 * @property ChambrePublication $chambre_publication
 * @property User $user
 *
 * @package App\Models
 */
class HotelReservation extends Model
{
	protected $table = 'hotel_reservation';
	protected $primaryKey = 'ID_RESERVATION';
	public $timestamps = false;

	protected $casts = [
		'ID_C_PUB' => 'int',
		'ID_USERS' => 'int',
		'DATE_DEBUT' => 'datetime',
		'DATE_FIN' => 'datetime',
		'IDC' => 'int',
		'IDD' => 'int'
	];

	protected $fillable = [
		'ID_C_PUB',
		'ID_USERS',
		'NOM',
		'DATE_DEBUT',
		'DATE_FIN',
		'IDC',
		'IDD'
	];

	public function chambre_publication()
	{
		return $this->belongsTo(ChambrePublication::class, 'ID_C_PUB');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_USERS');
	}
}
