<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class addUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:user {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert random users into the users table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = Faker::create('id_ID');
        $count = $this->argument('count');

        for ($i = 0; $i < $count; $i++) {
            $name = $faker->name;
            $email = $faker->unique()->safeEmail;
            $password = Hash::make('12345678');

            User::create([
                'nama' => $name,
                'email' => $email,
                'password' => $password,
            ]);
            $this->info("User $name with ($email) inserted successfully.");
        }
        $this->newLine();
        $this->info("All $count users inserted successfully !!");
    }
}
