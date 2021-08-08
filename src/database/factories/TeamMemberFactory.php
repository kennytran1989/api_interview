<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeamMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeamMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $team_id = \App\Models\Team::all(['id'])->random()->id;
        $user_id = \App\Models\User::all(['id'])->random()->id;
        return [
            'user_id' => $user_id,
            'team_id' => $team_id,
        ];

    }
}
