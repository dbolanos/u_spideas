<?php
use App\Models\Event;
use App\Models\Infrastructure;
use App\Models\Period;
use Illuminate\Database\Seeder;

class ItemsRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $infraestructures = [
            ['description' => 'Aula'],
            ['description' => 'Gimnasio'],
            ['description' => 'Biblioteca'],
            ['description' => 'Auditorio'],
            ['description' => 'Materiales']
        ];
        foreach($infraestructures as $key => $infraestructure){
            Infrastructure::create($infraestructure);
        }

        $events = [
            ['description' => 'Charla Scrum'],
            ['description' => 'Fiesta Tematica'],
            ['description' => 'Reuniones'],
            ['description' => 'Grupos de Estudio'],
            ['description' => 'Fiesta de egresados']
        ];
        foreach($events as $event){
            Event::create($event);
        }

        $periods = [
            ['description' => 'Mañana'],
            ['description' => 'Tarde'],
            ['description' => 'Noche']
        ];
        foreach($periods as $period){
            Period::create($period);
        }
    }
}
