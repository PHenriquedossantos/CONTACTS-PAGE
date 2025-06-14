<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
	use HasFactory;
	use SoftDeletes;
	
	protected $table = 'contacts';
	
	protected $fillable = [
		'user_id',
		'name',
		'contact',
		'email',
	];
	
	/**
	 * Um contato pode pertencer a um usuário (opcional).
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
