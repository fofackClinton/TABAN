<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hotel
 * 
 * @property int $ID_HOTEL
 * @property int $ID_USERS
 * @property string|null $NOM_HOTEL
 * @property string|null $CATEGORIE_HOTEL
 * @property string|null $LOCALISATION
 * @property string|null $DOCUMENT
 * @property string|null $RCCM
 * @property string|null $VILLE
 * 
 * @property User $user
 * @property Collection|Chambre[] $chambres
 * @property Collection|Localisation[] $localisations
 *
 * @package App\Models
 */
class Hotel extends Model
{
	protected $table = 'hotel';
	protected $primaryKey = 'ID_HOTEL';
	public $timestamps = false;

	protected $casts = [
		'ID_USERS' => 'int'
	];

	protected $fillable = [
		'ID_USERS',
		'NOM_HOTEL',
		'CATEGORIE_HOTEL',
		'LOCALISATION',
		'DOCUMENT',
		'RCCM',
		'VILLE'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_USERS');
	}

	public function chambres()
	{
		return $this->hasMany(Chambre::class, 'ID_HOTEL');
	}

	public function localisations()
	{
		return $this->hasMany(Localisation::class, 'ID_HOTEL');
	}
}
