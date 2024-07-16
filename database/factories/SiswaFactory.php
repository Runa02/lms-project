<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Siswa::class;
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'nis' => $this->faker->unique()->numberBetween(1000, 9999),
            'username' => $this->faker->unique()->userName,
            'name' => $this->faker->name,
            'kelas' => $this->faker->word,
            'password' => '1234',
            'status' => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
        ];
    }
}
