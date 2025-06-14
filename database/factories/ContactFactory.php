<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
	protected $model = Contact::class;

	public function definition(): array
	{
		return [
			'user_id' => null,
			'name'    => $this->faker->name(),
			'contact' => $this->faker->unique()->numerify('#########'),
			'email'   => $this->faker->unique()->safeEmail(),
			'created_at' => now(),
			'updated_at' => now(),
		];
	}
}
