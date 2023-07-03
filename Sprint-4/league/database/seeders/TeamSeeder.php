<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams= [
            [
                'name' => "Barcelona",
                'stadium' => "Camp Nou",
                'foundation_year' => 1899,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/b8/37/fc-barcelona-la-liga_1jxdxq19a7z4i1mdvawqvnk2js.jpg?t=-2107146871&quality=60&w=1080",
            ],
            [
                'name'=> "Sevilla",
                'stadium' => "Ramón Sánchez-Pizjuán",
                'foundation_year' => 1890,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/ac/bf/sevilla-la-liga_1lfxc6fbl9u1h1mn6htlg44v9i.jpg?t=-2107150871&quality=60&w=1080",
            ],
            [
                'name'=> "Real Sociedad",
                'stadium' => "Anoeta",
                'foundation_year' => 1909,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/85/e1/real-sociedad-la-liga_2bpxopvvcbyv1fq2w3r1e5qad.jpg?t=-2107149871&quality=60&w=1080",
            ],
            [
                'name'=> "Real Madrid",
                'stadium' => "Bernabéu",
                'foundation_year' => 1902,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/51/f/real-madrid-la-liga_bigwp0fbntif1tq2zkqit1kwv.jpg?t=-2107148871&quality=60&w=1080",
            ],
            [
                'name'=> "Atlético de Madrid",
                'stadium' => "Metropolitano",
                'foundation_year' => 1903,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/12/b9/atletico-de-madrid-la-liga_h6wph8budj2u1ixc7ij0ttord.jpg?t=-2107144639&quality=60&w=1080",
            ],
            [
                'name'=> "Real Betis",
                'stadium' => "Benito Villamarín",
                'foundation_year' => 1907,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/19/a7/real-betis-la-liga_1uphjaxgy5qoe1e1zw0br2xfu3.jpg?t=-2107145639&quality=60&w=1080",
            ],
            [
                'name'=> "Villareal",
                'stadium' => "Estadio de la Cerámica",
                'foundation_year' => 1923,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/b/60/villarreal-la-liga_qyfbfnhgx4hf1jvft8jw53jl3.jpg?t=-2107152127&quality=60&w=1080",
            ],
            [
                'name'=> "Athletic Club de Bilbao",
                'stadium' => "San Mamés",
                'foundation_year' => 1898,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/6d/fe/athletic-club-la-liga_f9cv6dl680v11cfr56kwikyfi.jpg?t=-2107144639&quality=60&w=1080",
            ],
            [
                'name'=> "Valencia",
                'stadium' => "Mestalla",
                'foundation_year' => 1919,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/46/4b/valencia-la-liga_18fyjfv89rshc1dtd9ll00mnr5.jpg?t=-2107150871&quality=60&w=1080",
            ],
            [
                'name'=> "Osasuna",
                'stadium' => "El Sadar",
                'foundation_year' => 1920,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/66/f8/osasuna-la-liga_1jrg9g16m46tc1bfxoslucwfh6.jpg?t=-2107147871&quality=60&w=1080",
            ],
            [
                'name'=> "Celta de Vigo",
                'stadium' => "Balaídos",
                'foundation_year' => 1923,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/d9/99/celta-de-vigo-la-liga_1bl4zfn03yl8a1ii2u25p67x4p.jpg?t=-2107146639&quality=60&w=1080",
            ],
            [
                'name'=> "Rayo Vallecano",
                'stadium' => "Vallecas",
                'foundation_year' => 1924,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/6f/f4/rayo-vallecano-la-liga_1uvl3nnqfjnh912pp9fcelwv61.jpg?t=-2107149871&quality=60&w=1080",
            ],
            [
                'name'=> "Elche",
                'stadium' => "Manuel Martínez Valero",
                'foundation_year' => 1923,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/6e/84/elche-cf-la-liga_1l3rzlqqg2dh81mfzjhdn015e5.jpg?t=-2107146639&quality=60&w=1080",
            ],
            [
                'name'=> "Español",
                'stadium' => "Cornellà-El Prat",
                'foundation_year' => 1900,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/ea/8e/rcd-espanyol-la-liga_3pc4mqofpma1u3avcdeu2yvh.jpg?t=-2107148871&quality=60&w=1080",
            ],
            [
                'name'=> "Getafe",
                'stadium' => "Coliseum Alfonso Pérez",
                'foundation_year' => 1983,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/1f/fc/getafe-cf-la-liga_r6cil36whc111j808ed9u3f78.jpg?t=-2107146871&quality=60&w=1080",
            ],
            [
                'name'=> "Mallorca",
                'stadium' => "Visit Mallorca Stadium",
                'foundation_year' => 1916,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/c4/e/rcd-mallorca-la-liga_1mikp04zkz4b41rk4e3c6umpw3.jpg?t=-2107147871&quality=60&w=1080",
            ],
            [
                'name'=> "Cádiz",
                'stadium' => "Nuevo Mirandilla",
                'foundation_year' => 1910,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/90/74/cadiz-cf-la-liga_g5pr7qf5uaeb1n6tsip6nmq6y.jpg?t=-2107145639&quality=60&w=1080",
            ],
            [
                'name'=> "Almería",
                'stadium' => "Power Horse Stadium",
                'foundation_year' => 1989,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/d6/42/ud-almeria-la-liga_44l3iadeg2ri1etyju7levqed.jpg?t=-2106943127&quality=60&w=1080",
            ],
            [
                'name'=> "Valladolid",
                'stadium' => "José Zorrilla",
                'foundation_year' => 1928,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/a3/d1/real-valladolid-la-liga_1daj1nnjrz5y1mt0ou5cif49e.jpg?t=-2106943127&quality=60&w=1080",
            ],
            [
                'name'=> "Girona",
                'stadium' => "Montilivi",
                'foundation_year' => 1930,
                'emblem_photo'=> "https://images.daznservices.com/di/library/DAZN_News/eb/c9/girona-fc-la-liga_l0nua4lnoqn11412sbi7lmndr.jpg?t=-2103734871&quality=60&w=1080",
            ],
        ];

        foreach ($teams as $teamData) {
            Team::create($teamData);
        }
    }
}