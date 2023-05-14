<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChambrePublication
 * 
 * @property int $ID_C_PUB
 * @property int $ID_CHAMBRE
 * @property string|null $TYPE
 * @property int|null $PRIX
 * @property string|null $DESCRIPTION
 * @property string|null $PHOTO
 * @property string|null $VILLE
 * @property int|null $IDC
 * 
 * @property Chambre $chambre
 * @property Collection|HotelReservation[] $hotel_reservations
 *
 * @package App\Models
 */
class ChambrePublication extends Model
{
	protected $table = 'chambre_publication';
	protected $primaryKey = 'ID_C_PUB';
	public $timestamps = false;

	protected $casts = [
		'ID_CHAMBRE' => 'int',
		'PRIX' => 'int',
		'IDC' => 'int'
	];

	protected $fillable = [
		'ID_CHAMBRE',
		'TYPE',
		'PRIX',
		'DESCRIPTION',
		'PHOTO',
		'VILLE',
		'IDC'
	];

	public function chambre()
	{
		return $this->belongsTo(Chambre::class, 'ID_CHAMBRE');
	}

	public function hotel_reservations()
	{
		return $this->hasMany(HotelReservation::class, 'ID_C_PUB');
	}
}
