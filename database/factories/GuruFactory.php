<?php

namespace Database\Factories;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    protected $model = Guru::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_guru' => $this->faker->unique()->numberBetween(1000, 9999),
            'nama_guru' => $this->faker->name,
            'tgl_lahir' => $this->faker->date(),
            'no_telp' => $this->faker->phoneNumber,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha', 'Khongucu']),
            'jenis_kelamin' => $this->faker->randomElement(['Laki laki', 'Perempuan']),
            'foto' => $this->faker->imageUrl(200, 200, 'people'),
            'jabatan' => $this->faker->randomElement(['Kepala Sekolah', 'Guru Pelajaran', 'Guru Wali Kelas', 'Admin Tata Usaha']),
            'kelas_id' => Kelas::factory(), // Assuming you have a Kelas factory
        ];
    }
}
