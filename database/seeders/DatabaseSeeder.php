<?php

namespace Database\Seeders;

use App\Models\Additional;
use App\Models\Building;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Project;
use App\Models\State;
use App\Models\Tracking;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\ContactFactory;
use Faker\Provider\Address;
use Faker\Provider\DateTime;
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

      //CRUD users
      Permission::create(['name' => 'crear usuarios']);
      Permission::create(['name' => 'editar usuarios']);
      Permission::create(['name' => 'suspender usuarios']);

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
        'name' => "Admin",
        'email' => "dev@placeme.mx",
        'password' => bcrypt("password"),
      ]);
      $userAdmin->additional()->create([
        'last_name' => 'Dev',
        'second_lastname' => "Smith",
        'phone' => "3318548115",
        'photo_profile' => "photo-profile/user_profile_a.png",
        'change_password' => 1
      ]);
      $userAdmin->assignRole( $role1 );

      $userAdvisor = User::create([
        'name' => "Vincent",
        'email' => "vega@placeme.mx",
        'password' => bcrypt("password"),
      ]);
      $userAdvisor->additional()->create([
        'last_name' => 'Vega',
        'second_lastname' => "Luke",
        'phone' => "3336748029",
        'photo_profile' => "photo-profile/user_profile_a.png",
        'change_password' => 1
      ]);
      $userAdvisor->assignRole( $role2 );
      User::factory()->count(10)->hasAdditional()->create()->each( function ( $user ){
        $user->assignRole('asesor');
      });
      $this->call([
        OperationsTableSeeder::class,
        StateTableSeeder::class,
      ]);
      Building::factory(10)->create();

     Customer::factory(  15)->create();

    /* $trackings = Tracking::factory(150)->create();
      $trackings->each( function ( $tracking){
        for ($i = 1; $i <= 10; $i++) {
          Comment::create([
            'tracking_id' => $tracking->id,
            'state_id' => State::inRandomOrder()->first()->id,
            'tracking_date' => $tracking->created_at,
            'subject' => $i."acercamiento con el cliente",
            'comments' => "Esos son los comentarios de prueba para los comentarios de cada seguimiento imply dummy text
           of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
           when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
           but also the leap into electronic typesetting, remaining essentially unchanged
          . It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with deskt ",
            'created_at' => DateTime::dateTimeBetween('-3 month','now'),
          ]);
        }

      });*/
      //Tracking::factory(100)->create();
      /*$userAdmin = Tracking::create([
        'user_id' => 2,
        'customer_id' => 3,
        'building_id' => 10,
        'operation_id'=> 1,
        'state_id' => 1,
        'contact_type' => "Directo",
      ]);*/

    }
}
