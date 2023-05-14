<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicule
 * 
 * @property int $ID_VEHICUL
 * @property int $ID_AGENCE
 * @property string|null $NOM
 * @property string|null $TYPE
 * @property string|null $DESCRIPTION
 * @property int|null $PRIX
 * @property string|null $PHOTO
 * @property int|null $IDC
 * 
 * @property Agence $agence
 * @property Collection|VehiculPublication[] $vehicul_publications
 *
 * @package App\Models
 */
class Vehicule extends Model
{
	protected $table = 'vehicule';
	protected $primaryKey = 'ID_VEHICUL';
	public $timestamps = false;

	protected $casts = [
		'ID_AGENCE' => 'int',
		'PRIX' => 'int',
		'IDC' => 'int'
	];

	protected $fillable = [
		'ID_AGENCE',
		'NOM',
		'TYPE',
		'DESCRIPTION',
		'PRIX',
		'PHOTO',
		'IDC'
	];

	public function agence()
	{
		return $this->belongsTo(Agence::class, 'ID_AGENCE');
	}

	public function vehicul_publications()
	{
		return $this->hasMany(VehiculPublication::class, 'ID_VEHICUL');
	}
}
