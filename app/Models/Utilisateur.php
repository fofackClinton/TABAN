<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 * 
 * @property int $ID_USERS
 * @property string|null $ROLE
 * @property string|null $NOM
 * @property string|null $PRENOM
 * @property string|null $STATUT
 *
 * @package App\Models
 */
class Utilisateur extends Model
{
	protected $table = 'utilisateur';
	protected $primaryKey = 'ID_USERS';
	public $timestamps = false;

	protected $fillable = [
		'ROLE',
		'NOM',
		'PRENOM',
		'STATUT'
	];
}
