<?php

namespace Database\Factories;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Produto::class;
    public function definition(): array
    {
        return [
            "nome" => $this->faker->name(),
            "quantidade" => $this->faker->numberBetween(1,10),
            "listas_id" => '1'
        ];
    }
}
