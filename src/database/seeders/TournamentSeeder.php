<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tournament;
use Illuminate\Support\Str;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['single_elim', 'double_elim', 'group'];
        $games = ['Mobile Legends', 'Valorant', 'PUBG', 'Dota 2', 'Free Fire'];

        foreach (range(1, 10) as $i) {
            Tournament::create([
                'name' => 'MLBB Local Championship',
                'game' => 'Mobile Legends',
                'start_date' => now(),
                'end_date' => now()->addDays(7),
                'type' => 'single_elim',
            ]);
        }
    }
}
