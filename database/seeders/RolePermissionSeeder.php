<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = Role::create(['name' => User::SUPERADMIN, 'label' => 'Superadmin']);
        $reseller = Role::create(['name' => User::RESELLER, 'label' => 'Reseller']);
        $customer = Role::create(['name' => User::CUSTOMER, 'label' => 'Customer']);
        $agent = Role::create(['name' => User::AGENT, 'label' => 'Agent']);
    }
}
