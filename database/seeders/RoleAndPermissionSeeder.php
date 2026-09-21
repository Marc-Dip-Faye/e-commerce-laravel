<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Réinitialiser le cache des permissions (important)
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions pour les produits
        $productPermissions = [
            'view products',
            'create products',
            'edit products',
            'delete products',
        ];

        // Permissions pour les catégories
        $categoryPermissions = [
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',
        ];

        // Permissions pour les commandes
        $orderPermissions = [
            'view orders',
            'edit orders',
            'delete orders',
        ];

        // Permissions pour les clients
        $customerPermissions = [
            'view customers',
            'edit customers',
            'delete customers',
        ];

        // Permissions pour les utilisateurs admin
        $userPermissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
        ];

        // Permissions pour les paramètres
        $settingPermissions = [
            'view settings',
            'edit settings',
        ];

        // Permission pour le dashboard
        $dashboardPermissions = [
            'view dashboard',
        ];

        // Créer toutes les permissions
        $allPermissions = array_merge(
            $productPermissions,
            $categoryPermissions,
            $orderPermissions,
            $customerPermissions,
            $userPermissions,
            $settingPermissions,
            $dashboardPermissions
        );

        // Créer toutes les permissions avec le guard admin
        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'admin']);
        }

        // Créer le rôle Super Admin avec toutes les permissions
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $superAdmin->syncPermissions($allPermissions);
        }
}
