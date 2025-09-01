<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Freelancer;
use App\Models\User;
use GuzzleHttp\Promise\Create;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'fullname' => 'Client Test',
        //     'email' => 'ClientTest@example.com',
        //     'password' => Hash::make('ClientTest@example.com'),
        //     'experience' => '1-3',
        //     'specializations' => 'phoneApplications',
        //     'bio' => 'phoneApplications',
        //     'identity' => 'Identity_1756548736_68b2ce80331f2_OIP (11).jpg',
        //     'identity_person' => 'Identity_1756548736_68b2ce80331f2_OIP (11).jpg',
        //     'email_verified_at' => now(),
        // ]);
        // Freelancer::create([
        //     'fullname' => 'Freelancer Test',
        //     'email' => 'FreelancerTest@example.com',
        //     'password' => Hash::make('FreelancerTest@example.com'),
        //     'experience' => '1-3',
        //     'specializations' => 'phoneApplications',
        //     'bio' => 'phoneApplications',
        //     'identity' => 'Identity_1756548736_68b2ce80331f2_OIP (11).jpg',
        //     'identity_person' => 'Identity_1756548736_68b2ce80331f2_OIP (11).jpg',
        //     'email_verified_at' => now(),
        // ]);
        // Admin::create([
        //     'fullname' => 'Admin Test',
        //     'email' => 'AdminTest@example.com',
        //     'password' => Hash::make('AdminTest@example.com'),
        //     'experience' => '1-3',
        //     'specializations' => 'phoneApplications',
        //     'bio' => 'phoneApplications',
        //     'identity' => 'Identity_1756548736_68b2ce80331f2_OIP (11).jpg',
        //     'identity_person' => 'Identity_1756548736_68b2ce80331f2_OIP (11).jpg',
        //     'email_verified_at' => now(),
        // ]);
        // // Cretae permissions
        // Permission::create(['name' => 'users.view', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'users.store', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'users.update', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'users.delete', 'guard_name' => 'admin']);

        // // Create Roles
        // $super = Role::create(['name' => 'super', 'guard_name' => 'admin']);
        // $editor = Role::create(['name' => 'editor', 'guard_name' => 'admin']);
        // $viewer = Role::create(['name' => 'viewer', 'guard_name' => 'admin']);

        // // Given Permission to role
        // // $super->givePermissionTo(['users.view, users.store, users.update, users.delete']);
        // $super->givePermissionTo(Permission::all());
        // $editor->givePermissionTo(['users.view', 'users.update', 'users.delete']);
        // $viewer->givePermissionTo(['users.view']);

        // // Given permission to user
        // $user = Admin::find(1);
        // $user->assignRole('super');
        // $user = Admin::find(1);
        // $user->syncRoles('viewer');

        // $models = ['User'];
        // $actions = ['store', 'view', 'update', 'delete'];

        // $super = Role::firstOrCreate(['name' => 'super', 'guard_name' => 'admin']);

        // foreach ($models as $model) {
        //     foreach ($actions as $action) {
        //         $perName = "$model.$action";
        //         $permission = Permission::firstOrCreate([
        //             'name' => $perName,
        //             'guard_name' => 'admin',
        //         ]);

        //         $super->givePermissionTo($permission);
        //     }
        // }
    }
}
