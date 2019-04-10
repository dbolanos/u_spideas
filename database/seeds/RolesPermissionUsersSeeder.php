<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Student;

class RolesPermissionUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $permissions = [
            [
                'name'          => 'admin',
                'display_name'  => 'Administrador',
                'description'   => 'Acceso total a todas las funciones'
            ],
            [
                'name'          => 'event',
                'display_name'  => 'Administrador Eventos',
                'description'   => 'Gestion de eventos'
            ],
            [
                'name'          => 'infrastructure',
                'display_name'  => 'Administrador Infraestructura',
                'description'   => 'Gestion de infraestructura'
            ],
            [
                'name'          => 'student_requests',
                'display_name'  => 'Gestion de trámites',
                'description'   => 'Gestion de trámites'
            ],
            [
                'name'          => 'create_request_student',
                'display_name'  => 'Crear Solicitud',
                'description'   => 'Crear solicitud'
            ],
        ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }

        $roles =[
            [
                'name'          => 'admin',
                'display_name'  => 'Administrador',
                'description'   => 'Total Dominio'
            ],
            [
                'name'          => 'student',
                'display_name'  => 'Estudiante',
                'description'   => 'Estudiante UTN'
            ]
        ];

        foreach($roles as $role) {
            Role::create($role);
        }

        $permisos_administrador = Permission::all()->except(5);
        $rol_administrator      = Role::find(1);
        foreach($permisos_administrador as $permiso_administrador){
            $rol_administrator->attachPermission($permiso_administrador);
        }

        $student_rol      = Role::find(2);
        $student_rol->attachPermission(Permission::find(5));


        $user_administrator             = new User();
        $user_administrator->name       = 'Administrator';
        $user_administrator->email      = 'admin@test.test';
        $user_administrator->password   = bcrypt('admin');
        $user_administrator->save();
        $user_administrator->roles()->attach($rol_administrator->id);


        $user_student              = new User();
        $user_student->name        = 'Carlos Garcia Lopez';
        $user_student->email       = 'cgarcia@test.test';
        $user_student->password    = bcrypt('testtest');
        $user_student->save();
        $user_student->roles()->attach($student_rol->id);

        $student = new Student();
        $student->first_name            = 'Carlos';
        $student->first_surname         = 'Garcia';
        $student->second_surname        = 'Lopez';
        $student->email                 = 'cgarcia@test.test';
        $student->identification_card   = '203690850';
        $student->user_id               = 2;
        $student->save();

    }
}
