<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'manage users',
            'manage lembaga',
            'manage logistik-item',
            'view santri',
            'create santri',
            'edit santri full',
            'edit santri kedatangan',
            'edit santri verifikasi',
            'view santri-logistik',
            'edit santri-logistik penyerahan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Admin — all permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions(Permission::all());

        // Pengasramaan — view santri + update kedatangan only
        $pengasramaan = Role::firstOrCreate(['name' => 'pengasramaan']);
        $pengasramaan->syncPermissions(['view santri', 'edit santri kedatangan']);

        // PSB — view + full edit santri + view logistik
        $psb = Role::firstOrCreate(['name' => 'psb']);
        $psb->syncPermissions(['view santri', 'edit santri full', 'edit santri verifikasi', 'view santri-logistik']);

        // Logistik — view + mark penyerahan
        $logistik = Role::firstOrCreate(['name' => 'logistik']);
        $logistik->syncPermissions(['view santri', 'view santri-logistik', 'edit santri-logistik penyerahan']);
    }
}
