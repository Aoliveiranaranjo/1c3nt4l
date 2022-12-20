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
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Gerencia']);
        $role3 = Role::create(['name' => 'Administración']);
        $role4 = Role::create(['name' => 'Jefe de Planificación']);
        $role5 = Role::create(['name' => 'Jefe de Mecánico']);
        $role6 = Role::create(['name' => 'Planificación']);
        $role7 = Role::create(['name' => 'Encargada']);
        $role8 = Role::create(['name' => 'Calidad']);
        $role9 = Role::create(['name' => 'Mecánico']);
        $role10 = Role::create(['name' => 'Almacén']);
        $role11 = Role::create(['name' => 'Responsables']);
        $role12 = Role::create(['name' => 'Visita']);

        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.rooms.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.state-changes.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.order-states.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.state-productions.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.type-orders.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.incident-types.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.type-changes.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.sexes.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.charges.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.groups.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.mechanic.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.client-recontrol.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.type-fault.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.type-decrease.index'])->assignRole($role1);

        //vistas y borrar
        Permission::create(['name' => 'admin.delete'])->assignRole($role1);
        Permission::create(['name' => 'admin.view'])->assignRole($role1);
        Permission::create(['name' => 'gerencia.view'])->assignRole($role2);
        Permission::create(['name' => 'administracion.view'])->assignRole($role3);
        Permission::create(['name' => 'jefePlanificacion.view'])->assignRole($role4);
        Permission::create(['name' => 'jefeMecanico.view'])->assignRole($role5);
        Permission::create(['name' => 'planificacion.view'])->assignRole($role6);
        Permission::create(['name' => 'encargada.view'])->assignRole($role7);
        Permission::create(['name' => 'calidad.view'])->assignRole($role8);
        Permission::create(['name' => 'mecanico.view'])->assignRole($role9);
        Permission::create(['name' => 'almacen.view'])->assignRole($role10);
        Permission::create(['name' => 'responsables.view'])->assignRole($role11);
        Permission::create(['name' => 'visitas.view'])->assignRole($role12);

            //vistas mixtas
        Permission::create(['name' => 'adminGerencia.view'])->assignRole($role1, $role2);
        Permission::create(['name' => 'adminGerenciaCalidad.view'])->assignRole($role1, $role2, $role8);
        Permission::create(['name' => 'JefMecMecanicos.view'])->assignRole($role1, $role9, $role5);
        Permission::create(['name' => 'adminGeAdminis.view'])->assignRole($role1, $role2,  $role3);
        Permission::create(['name' => 'adminGeAdmJPlan.view'])->assignRole($role1, $role2,  $role3, $role4);
        Permission::create(['name' => 'adminGeAdmJPlanPlani.view'])->assignRole($role1, $role2,  $role3, $role4, $role6);
        Permission::create(['name' => 'adminGeAdmJPlanPlaniEncar.view'])->assignRole($role1, $role2,  $role3, $role4, $role6, $role7);
        Permission::create(['name' => 'adminGeAdmJPlanPlaniEncarCalidad.view'])->assignRole($role1, $role2,  $role3, $role4, $role6, $role7, $role8);
        Permission::create(['name' => 'adminGeAdmJPlanPlaniEncarResponsable.view'])->assignRole($role1, $role2,  $role3, $role4, $role6, $role7, $role11);
        Permission::create(['name' => 'adminGeAdmJPlanPlaniEncarJefMecaMecanico.view'])->assignRole($role1, $role2,  $role3, $role4, $role6, $role7, $role5, $role9);
        Permission::create(['name' => 'adminGeAdmJPlanPlaniEncarJefMecaMecCali.view'])->assignRole($role1, $role2,  $role3, $role4, $role6, $role7, $role5, $role9, $role8);
        Permission::create(['name' => 'adminGeAdmJPlanPlaniEncarCalAlma.view'])->assignRole($role1, $role2,  $role3, $role4, $role6, $role7, $role8, $role10);


        //sistem
        Permission::create(['name' => 'sistem.customer.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.customers.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.customers.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.customers.export'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.customers.import'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.article.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.articles.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.articles.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.employee.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.employees.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.employees.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.employee.dashboard.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.orders.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.order.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.order.null'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.order.new'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.order.progress'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.order.stop'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.order.closed'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.orders.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.orders.edit.null'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.orders.edit.new'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.orders.edit.progress'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.orders.edit.stop'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.orders.edit.closed'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.productions.view'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.productions.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.productions.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.productions.edit.closed'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.new'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.change'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.active'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.express'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.stop'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.end'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.outsourced'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.production.closed'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.productions.edit.end'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.change.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.changes.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.change.index2'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.change.restore'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.machine.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.machines.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);
        Permission::create(['name' => 'sistem.machines.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7]);

        //factory
        // Inicio  mecanicos fabricación
        Permission::create(['name' => 'factory.mechanic.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,    $role9, $role5]);
        Permission::create(['name' => 'factory.mechanic.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,    $role9, $role5]);
        Permission::create(['name' => 'factory.mechanic.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,    $role9, $role5]);
        Permission::create(['name' => 'Inicio calidad fabricación'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,    $role9, $role5]);

        //Inicio calidad fabricación
        Permission::create(['name' => 'factory.qualities.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role8]);
        Permission::create(['name' => 'factory.productions.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role8]);
        Permission::create(['name' => 'factory.qualities.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role8]);

        //produccion de calidad
        Permission::create(['name' => 'quality.production.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role8]);
        Permission::create(['name' => 'quality.production.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role8]);

        //Producción en fabrica
        Permission::create(['name' => 'factory.production.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role11,  $role10]);
        Permission::create(['name' => 'factory.productions.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role11,  $role10]);
        Permission::create(['name' => 'sistem.production.index2'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role11,  $role10]);

        //Averías
        Permission::create(['name' => 'factory.fault.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role9, $role5]);
        Permission::create(['name' => 'factory.fault.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role9, $role5]);

        //Cambios
        Permission::create(['name' => 'factory.change.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role9, $role5]);
        Permission::create(['name' => 'factory.change.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role9, $role5]);


        //recontroles
        Permission::create(['name' => 'factory.recontrol.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);
        Permission::create(['name' => 'factory.recontrol.show.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);
        Permission::create(['name' => 'factory.recontrol.history.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);
        Permission::create(['name' => 'factory.recontrol.create'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);
        Permission::create(['name' => 'factory.recontrol.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);
        Permission::create(['name' => 'factory.recontrol.edit.puig'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);
        Permission::create(['name' => 'factory.recontrol.edit.loreal'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);
        Permission::create(['name' => 'factory.recontrol.show.index.loreal'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);
        Permission::create(['name' => 'factory.recontrol.show.index.puig'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,       $role8]);

        //Almacén PT
        Permission::create(['name' => 'factory.store.pt.index'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role10, $role8]);
        Permission::create(['name' => 'factory.store.pt.closed'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,      $role10, $role8]);
        Permission::create(['name' => 'factory.store.pt.edit'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,     $role10, $role8]);

        //DELIVERY PT
        Permission::create(['name' => 'deliveryPT'])->assignRole([$role1, $role2, $role3, $role4, $role6, $role7,     $role10]);
    }
}
