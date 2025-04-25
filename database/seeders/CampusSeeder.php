<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campus;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campuses = [
            [
                'name' => 'Aparri',
                'location' => json_encode(['lat' => '18.3562', 'long' => '121.6407']),
                'description' => 'Located at the northern tip, known for fisheries and maritime programs.',
            ],
            [
                'name' => 'Carig',
                'location' => json_encode(['lat' => '17.6153', 'long' => '121.7220']),
                'description' => 'Main administrative and academic hub in Tuguegarao City.',
            ],
            [
                'name' => 'Andrews',
                'location' => json_encode(['lat' => '17.6102', 'long' => '121.7269']),
                'description' => 'Known for programs in law, accountancy, and social sciences.',
            ],
            [
                'name' => 'Gonzaga',
                'location' => json_encode(['lat' => '18.2530', 'long' => '122.0176']),
                'description' => 'Serves the northeastern towns of Cagayan.',
            ],
            [
                'name' => 'Lasam',
                'location' => json_encode(['lat' => '18.0664', 'long' => '121.6183']),
                'description' => 'Caters to central western municipalities.',
            ],
            [
                'name' => 'Lallo',
                'location' => json_encode(['lat' => '18.2000', 'long' => '121.6667']),
                'description' => 'Hosts various agriculture and education programs.',
            ],
            [
                'name' => 'Piat',
                'location' => json_encode(['lat' => '17.7916', 'long' => '121.4861']),
                'description' => 'Famous for religious tourism and teacher education.',
            ],
            [
                'name' => 'Sanchez Mira',
                'location' => json_encode(['lat' => '18.5065', 'long' => '121.2486']),
                'description' => 'Focuses on agricultural and industrial technology programs.',
            ],
        ];

        foreach ($campuses as $campus) {
            Campus::create($campus);
        }
    }
}
