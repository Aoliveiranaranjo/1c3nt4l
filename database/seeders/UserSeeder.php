<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'Armando Oliveira',
            'email' => 'oliveiranaranjo@gmail.com',
            'password' => bcrypt('12345678'),


        ])->assignRole('Admin');
        User::create([

            'name' => 'Gerencia',
            'email' => 'gerencia@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Gerencia');
        User::create([

            'name' => 'Administración',
            'email' => 'Administracion@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Administración');
        User::create([

            'name' => 'Jefe de Planificación',
            'email' => 'jefedeplanificación@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Jefe de Planificación');
        User::create([

            'name' => 'Jefe de Mecánico',
            'email' => 'jefedemecanico@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Jefe de Mecánico');
        User::create([

            'name' => 'Planificación',
            'email' => 'Planificacion@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Planificación');
        User::create([

            'name' => 'Encargada',
            'email' => 'encargada@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Encargada');
        User::create([

            'name' => 'Calidad',
            'email' => 'calidad@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Calidad');
        User::create([

            'name' => 'Mecánico',
            'email' => 'Mecanico@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Mecánico');
        User::create([

            'name' => 'Almacén',
            'email' => 'almacen@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Almacén');
        User::create([

            'name' => 'Responsables',
            'email' => 'responsables@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Responsables');
        User::create([

            'name' => 'Visita',
            'email' => 'visita@prueba.com',
            'password' => bcrypt('central1234'),


        ])->assignRole('Visita');

    }
}
