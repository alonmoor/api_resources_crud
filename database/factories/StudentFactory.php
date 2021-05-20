<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;
class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      static $password;
        return [
          'username' => $this->faker->word,
          'fullname' => $this->faker->title,
          'password' => $password ?: $password = bcrypt('secret'),//'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
          'grade' => rand(1, 12),
          'created_at' => now(),
        ];
    }
}
