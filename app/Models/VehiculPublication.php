<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VehiculPublication
 * 
 * @property int $ID_PUBLICATION
 * @property int $ID_VEHICUL
 * @property string|null $NOM
 * @property int|null $PRIX
 * @property string|null $DESCRIPTION
 * @property string|null $PHOTO
 * @property string|null $TYPE
 * @property int|null $IDC
 * 
 * @property Vehicule $vehicule
 * @property Collection|VehiculReservation[] $vehicul_reservations
 *
 * @package App\Models
 */
class VehiculPublication extends Model
{
	protected $table = 'vehicul_publication';
	protected $primaryKey = 'ID_PUBLICATION';
	public $timestamps = false;

	protected $casts = [
		'ID_VEHICUL' => 'int',
		'PRIX' => 'int',
		'IDC' => 'int'
	];

	protected $fillable = [
		'ID_VEHICUL',
		'NOM',
		'PRIX',
		'DESCRIPTION',
		'PHOTO',
		'TYPE',
		'IDC'
	];

	public function vehicule()
	{
		return $this->belongsTo(Vehicule::class, 'ID_VEHICUL');
	}

	public function vehicul_reservations()
	{
		return $this->hasMany(VehiculReservation::class, 'ID_PUBLICATION');
	}
}
