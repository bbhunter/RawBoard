<?php

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variables_file = base_path() . "/variables.json";
        $data = file_exists($variables_file) ?
            json_decode(file_get_contents($variables_file)) :
            new stdClass;

        try {
            User::create([
                'name' => $data->name ?? 'John Doe',
                'email' => $data->email ?? 'john@example.com',
                'password' => Hash::make($data->password ?? 'password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch(QueryException $e) {
            return "Probably user already exists";
        }
    }
}
