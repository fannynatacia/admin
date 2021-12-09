<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProdukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'id' => $this->faker->primary()->id,
                'jenis_kode' => $this->faker->jenis_kode,
                'nomor' => $this->faker->nomor,
                'tahun' => $this->faker->tahun,
                'tentang' => $this->faker->tentang,
                'tanggal_penetapan' => $this->faker->tanggal_penetapan,
                'tanggal_pengundangan' => $this->faker->tanggal_pengundangan,
                'tld' => $this->faker->tld,
                'ld' => $this->faker->ld,
                'll' => $this->faker->ll,
                'abstraksi' => $this->faker->abstraksi,
                'catatan' => $this->faker->catatan,
                'isi' => $this->faker->isi,
                'berkas' => $this->faker->berkas,
                'berkas_lama' => $this->faker->berkas_lama,
                'kata_kunci' => $this->faker->kata_kunci,
                'halaman' => $this->faker->halaman,
                'lampiran' => $this->faker->lampiran,
                'status' => $this->faker->status,
                'keterangan' => $this->faker->keterangan,
                'counter' => $this->faker->counter,
                'pengguna_id' => $this->faker->pengguna_id,
                'is_aktif' => $this->faker->is_aktif,
                'create_at' => now(),
                'updated_at' => now(),
                // 'kode_berkas'=> \App\Models\Jenis::factory()->create()->kode_berkas
                // 'remember_token' => Str::random(10)
        ];
    }
}
