<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
      /* Permissions */

      // create permissions.
      Permission::create(['name' => 'crear seguimiento']);
      Permission::create(['name' => 'editar seguimiento']);
      Permission::create(['name' => 'eliminar seguimiento']);
      Permission::create(['name' => 'publicar seguimiento']);
      Permission::create(['name' => 'suspender seguimiento']);

      // Crear un Role para administrador y darle permisos.
      $role1 = Role::create(['name' => 'administrador']);
      $role1->givePermissionTo('editar seguimiento');
      $role1->givePermissionTo('eliminar seguimiento');
      $role1->givePermissionTo('publicar seguimiento');
      $role1->givePermissionTo('suspender seguimiento');

      // Crear un Role para asesor y darle permisos.
      $role2 = Role::create(['name' => 'asesor']);
      $role2->givePermissionTo('crear seguimiento');
      $role2->givePermissionTo('editar seguimiento');
      $role2->givePermissionTo('eliminar seguimiento');


      // Crear los usuarios y asignarles sus Roles
      $userAdmin = User::create([
        'name' => "John",
        'email' => "dev@dev.com",
        'password' => bcrypt("password"),
      ]);
      $userAdmin->assignRole( $role1 );

      $userAdvisor = User::create([
        'name' => "Vincent",
        'email' => "vega@dev.com",
        'password' => bcrypt("password"),
      ]);
      $userAdvisor->assignRole( $role2 );


      Project::factory()->times(40)->create();
      Contact::factory(40)->create();
    }
}
