<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::firstOrCreate(['name' => 'Admin']);

        // Eliminar los roles de Vendedor y Almacenero si existen
        Role::where('name', 'Vendedor')->delete();
        Role::where('name', 'Almacenero')->delete();

        // Crear nuevos roles
        $roleGerenteVentas = Role::firstOrCreate(['name' => 'Gerente de Ventas']);
        $roleGestorContenido = Role::firstOrCreate(['name' => 'Gestor de Contenido']);
        $roleSoporteCliente = Role::firstOrCreate(['name' => 'Soporte al Cliente']);

       
        Permission::firstOrCreate(['name' => 'admin.home', 'description' => 'Ver Dashboard'])
        ->syncRoles([$roleAdmin, $roleGerenteVentas, $roleGestorContenido, $roleSoporteCliente]);
        
        Permission::firstOrCreate(["name"=> "admin.users.index",
        "description"=>"Ver usuarios"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.users.create",
        "description"=>"Crear usuarios"])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(["name"=> "admin.users.edit",
        "description"=>"Editar usuarios"])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(["name"=> "admin.users.destroy",
        "description"=>"Eliminar usuarios"])->syncRoles([$roleAdmin]);

        Permission::firstOrCreate(["name"=> "admin.categories.index",
        "description"=>"Ver Categorias"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.categories.create",
        "description"=>"Crear categorias"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.categories.edit",
        "description"=>"Editar categorias"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.categories.destroy",
        "description"=>"Eliminar categorias"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);

        Permission::firstOrCreate(["name"=> "admin.roles.index",
        "description"=>"Ver roles"])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(["name"=> "admin.roles.create",
        "description"=>"Crear roles"])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(["name"=> "admin.roles.edit",
        "description"=>"Editar roles"])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(["name"=> "admin.roles.destroy",
        "description"=>"Eliminar roles"])->syncRoles([$roleAdmin]);

        Permission::firstOrCreate(["name"=> "admin.measures.index",
        "description"=>"Ver medidas"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.measures.create",
        "description"=>"Crear medidas"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.measures.edit",
        "description"=>"Editar medidas"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.measures.destroy",
        "description"=>"Eliminar medidas"])->syncRoles([$roleAdmin,$roleGerenteVentas]);

        Permission::firstOrCreate(["name"=> "admin.products.index",
        "description"=>"Ver productos"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.products.create",
        "description"=>"Crear productos"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.products.edit",
        "description"=>"Editar productos"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.products.destroy",
        "description"=>"Eliminar productos"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);

        Permission::firstOrCreate(["name"=> "admin.providers.index",
        "description"=>"Ver proveedores"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.providers.create",
        "description"=>"Crear proveedores"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.providers.edit",
        "description"=>"Editar proveedores"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.providers.destroy",
        "description"=>"Eliminar proveedores"])->syncRoles([$roleAdmin,$roleGerenteVentas]);

        Permission::firstOrCreate(["name"=> "admin.sliders.index",
        "description"=>"Ver sliders"])->syncRoles([$roleAdmin,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.sliders.create",
        "description"=>"Crear sliders"])->syncRoles([$roleAdmin,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.sliders.edit",
        "description"=>"Editar sliders"])->syncRoles([$roleAdmin,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.sliders.destroy",
        "description"=>"Eliminar sliders"])->syncRoles([$roleAdmin,$roleGestorContenido]);

        Permission::firstOrCreate(["name"=> "admin.videos.index",
        "description"=>"Ver videos"])->syncRoles([$roleAdmin,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.videos.create",
        "description"=>"Crear videos"])->syncRoles([$roleAdmin,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.videos.edit",
        "description"=>"Editar videos"])->syncRoles([$roleAdmin,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.videos.destroy",
        "description"=>"Eliminar videos"])->syncRoles([$roleAdmin,$roleGestorContenido]);

        Permission::firstOrCreate(["name"=> "admin.orders.index",
        "description"=>"Ver ordenes"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleSoporteCliente]);
        Permission::firstOrCreate(["name"=> "admin.orders.create",
        "description"=>"Crear ordenes"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.orders.show",
        "description"=>"Mostrar ordenes"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.orders.edit",
        "description"=>"Editar ordenes"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.orders.destroy",
        "description"=>"Eliminar ordenes"])->syncRoles([$roleAdmin,$roleGerenteVentas]);
        Permission::firstOrCreate(["name"=> "admin.orders.pendiente",
        "description"=>"Ver ordenes pendientes"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleSoporteCliente]);
        Permission::firstOrCreate(["name"=> "admin.orders.enviado",
        "description"=>"Ver ordenes enviadas"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleSoporteCliente]);
        Permission::firstOrCreate(["name"=> "admin.orders.cancelado",
        "description"=>"Ver ordenes rechazadas"])->syncRoles([$roleAdmin,$roleGerenteVentas,$roleSoporteCliente]);

        Permission::firstOrCreate(["name"=> "admin.payment_methods.index",
        "description"=>"Ver medios de pago"])->syncRoles([$roleAdmin,$roleGestorContenido,$roleSoporteCliente]);
        Permission::firstOrCreate(["name"=> "admin.payment_methods.create",
        "description"=>"Crear medios de pago"])->syncRoles([$roleAdmin,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.payment_methods.edit",
        "description"=>"Editar medios de pago"])->syncRoles([$roleAdmin,$roleGestorContenido]);
        Permission::firstOrCreate(["name"=> "admin.payment_methods.destroy",
        "description"=>"Eliminar medios de pago"])->syncRoles([$roleAdmin,$roleGestorContenido]);
    }
}
