<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dep_id = \App\Models\Department::all(['id'])->random()->id;
        return [
            'team_name' => 'Team-'.$this->faker->jobTitle,
            'dep_id'    => $dep_id
        ];
    }
}
