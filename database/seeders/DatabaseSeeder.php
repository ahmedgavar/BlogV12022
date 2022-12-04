<?php
declare (strict_types = 1);
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // fill user table with relation

        if (app()->environment('local')) {
            $user = User::factory()->count(5)->create();
            // fill post table with relation
            $posts = Post::factory()
                ->count(20)
                ->state(new Sequence(
                    fn($sequence) => ['user_id' => User::all()->random()],
                ))
                ->create();
        }

    }
}
