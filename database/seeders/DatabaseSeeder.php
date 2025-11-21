<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //1.Création des roles
$adminRole = Role::create(['name'=>'admin']);
$userRole = Role::create(['name'=>'user']);
        //2.Crétion de l'administrateur
  $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@highfive.com',
            'password' => bcrypt('password'),
  ]);
  $admin->assignRole($adminRole);//Attribution du rôle d'administrateur

        //3.Création d'un utilisateur standard pour tester
      $user=  User::factory(10)->create([
            'name'=>'Alice Doe',
            'email'=> 'nad@highfive.com',
            'password'=>bcrypt('password'),
        ]);
        $user->assignRole($userRole);//Attribution du rôle d'utilisateur standard

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
