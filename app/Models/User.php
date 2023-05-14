<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $sexe
 * @property bool $etat
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Agence[] $agences
 * @property Collection|Hotel[] $hotels
 * @property Collection|HotelReservation[] $hotel_reservations
 * @property Collection|VehiculReservation[] $vehicul_reservations
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';

	protected $casts = [
		'etat' => 'bool',
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'sexe',
		'etat',
		'email_verified_at',
		'password',
		'role',
		'remember_token'
	];

	public function agences()
	{
		return $this->hasMany(Agence::class, 'ID_USERS');
	}

	public function hotels()
	{
		return $this->hasMany(Hotel::class, 'ID_USERS');
	}

	public function hotel_reservations()
	{
		return $this->hasMany(HotelReservation::class, 'ID_USERS');
	}

	public function vehicul_reservations()
	{
		return $this->hasMany(VehiculReservation::class, 'ID_USERS');
	}
}
