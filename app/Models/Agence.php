<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agence
 * 
 * @property int $ID_AGENCE
 * @property int $ID_USERS
 * @property string|null $NOM
 * @property string|null $VILLE
 * @property string|null $DOCUMENT
 * @property string|null $RCCM
 * 
 * @property User $user
 * @property Collection|Localisation[] $localisations
 * @property Collection|Vehicule[] $vehicules
 *
 * @package App\Models
 */
class Agence extends Model
{
	protected $table = 'agence';
	protected $primaryKey = 'ID_AGENCE';
	public $timestamps = false;

	protected $casts = [
		'ID_USERS' => 'int'
	];

	protected $fillable = [
		'ID_USERS',
		'NOM',
		'VILLE',
		'DOCUMENT',
		'RCCM'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_USERS');
	}

	public function localisations()
	{
		return $this->hasMany(Localisation::class, 'ID_AGENCE');
	}

	public function vehicules()
	{
		return $this->hasMany(Vehicule::class, 'ID_AGENCE');
	}
}
