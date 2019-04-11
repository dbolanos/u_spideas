<?php

use App\Models\RequestStatus;
use Illuminate\Database\Seeder;

class RequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $request_statuses = [
            ['description' => 'Pendiente'],
            ['description' => 'Aprobado'],
            ['description' => 'Terminado'],
            ['description' => 'Bloqueado'],
        ];
        foreach($request_statuses as $key => $request_status){
            RequestStatus::create($request_status);
        }
    }
}
