<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chambre
 * 
 * @property int $ID_CHAMBRE
 * @property int $ID_HOTEL
 * @property int|null $PRIX
 * @property string|null $CATEGORI
 * @property string|null $TYPE
 * @property string|null $DESCRIPTION
 * @property string|null $PHOTO_CHAMBRE
 * @property int|null $IDC
 * 
 * @property Hotel $hotel
 * @property Collection|ChambrePublication[] $chambre_publications
 *
 * @package App\Models
 */
class Chambre extends Model
{
	protected $table = 'chambre';
	protected $primaryKey = 'ID_CHAMBRE';
	public $timestamps = false;

	protected $casts = [
		'ID_HOTEL' => 'int',
		'PRIX' => 'int',
		'IDC' => 'int'
	];

	protected $fillable = [
		'ID_HOTEL',
		'PRIX',
		'CATEGORI',
		'TYPE',
		'DESCRIPTION',
		'PHOTO_CHAMBRE',
		'IDC'
	];

	public function hotel()
	{
		return $this->belongsTo(Hotel::class, 'ID_HOTEL');
	}

	public function chambre_publications()
	{
		return $this->hasMany(ChambrePublication::class, 'ID_CHAMBRE');
	}
}
