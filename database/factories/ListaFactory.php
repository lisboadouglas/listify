<?php

namespace Database\Factories;
use \App\Models\Lista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lista>
 */
class ListaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Lista::class;
    public function definition(): array
    {
        return [
            //
            "nome" => "Lista de ".$this->faker->name()
        ];
    }
}
