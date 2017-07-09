<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        App\User::create([
          'name' => 'rafael',
          'password' => bcrypt('admin')
        ]);

        // App\Aluno::create([
        //   'name' => 'Pedro Dourado de Souza',
        //   'birth' => '2002-02-01',
        //   'tel' => '(12) 98884-6564',
        //   'ra' => '1763',
        //   'period' => 'tarde',
        //   'year' => '2',
        //   'paid' => '1'
        // ]);
    }
}
