<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Localisation
 * 
 * @property int $ID_LOCALISATION
 * @property int $ID_AGENCE
 * @property int $ID_HOTEL
 * @property string|null $LONGITUDE
 * @property string|null $LATITUDE
 * 
 * @property Agence $agence
 * @property Hotel $hotel
 *
 * @package App\Models
 */
class Localisation extends Model
{
	protected $table = 'localisation';
	protected $primaryKey = 'ID_LOCALISATION';
	public $timestamps = false;

	protected $casts = [
		'ID_AGENCE' => 'int',
		'ID_HOTEL' => 'int'
	];

	protected $fillable = [
		'ID_AGENCE',
		'ID_HOTEL',
		'LONGITUDE',
		'LATITUDE'
	];

	public function agence()
	{
		return $this->belongsTo(Agence::class, 'ID_AGENCE');
	}

	public function hotel()
	{
		return $this->belongsTo(Hotel::class, 'ID_HOTEL');
	}
}
