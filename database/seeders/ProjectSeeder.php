<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Proyecto 1
        $project1 = Project::create([
            'name' => 'Desarrollo Web',
            'description' => 'Proyecto de desarrollo de una aplicación web.',
            'deadline' => '2024-12-31',
        ]);

        // Tareas para el Proyecto 1
        Task::create([
            'project_id' => $project1->id,
            'title' => 'Diseño de la UI',
            'is_completed' => false,
            'deadline' => '2024-03-01',
        ]);

        Task::create([
            'project_id' => $project1->id,
            'title' => 'Desarrollo del Backend',
            'is_completed' => false,
            'deadline' => '2024-06-01',
        ]);

        Task::create([
            'project_id' => $project1->id,
            'title' => 'Integración y pruebas',
            'is_completed' => false,
            'deadline' => '2024-09-01',
        ]);

        // Proyecto 2
        $project2 = Project::create([
            'name' => 'Marketing Digital',
            'description' => 'Campaña de marketing para nuevo producto.',
            'deadline' => '2024-08-15',
        ]);

        // Tareas para el Proyecto 2
        Task::create([
            'project_id' => $project2->id,
            'title' => 'Investigación de Mercado',
            'is_completed' => false,
            'deadline' => '2024-02-15',
        ]);
        
        Task::create([
            'project_id' => $project2->id,
            'title' => 'Creación de Contenido',
            'is_completed' => false,
            'deadline' => '2024-03-15',
        ]);
        
        Task::create([
            'project_id' => $project2->id,
            'title' => 'Lanzamiento de Campaña',
            'is_completed' => false,
            'deadline' => '2024-04-30',
        ]);

        // Proyecto 3
        $project3 = Project::create([
            'name' => 'Implementación de CRM',
            'description' => 'Proyecto de implementación de sistema CRM en la empresa.',
            'deadline' => '2024-11-30',
        ]);

        // Tareas para el Proyecto 3
        Task::create([
            'project_id' => $project3->id,
            'title' => 'Selección de la Plataforma CRM',
            'is_completed' => false,
            'deadline' => '2024-06-30',
        ]);
        
        Task::create([
            'project_id' => $project3->id,
            'title' => 'Capacitación del Personal',
            'is_completed' => false,
            'deadline' => '2024-08-15',
        ]);
        
        Task::create([
            'project_id' => $project3->id,
            'title' => 'Implementación y Migración de Datos',
            'is_completed' => false,
            'deadline' => '2024-09-30',
        ]);
    }
}
