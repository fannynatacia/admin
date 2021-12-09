<?php

namespace Database\Factories;

use App\Models\Jenis;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jenis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'id' => $this->faker->primary()->id,
                'kode' => $this->faker->kode,
                'kode_berkas' => \App\Models\Produk::factory()->create()->kode_berkas,
                'nama' => $this->faker->nama,
                'keterangan' => $this->faker->keterangan,
                'is_aktif' => $this->faker->is_aktif
        ];
    }
}
