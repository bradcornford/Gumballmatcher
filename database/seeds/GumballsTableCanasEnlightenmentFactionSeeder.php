<?php

use App\Faction;
use App\Gumball;
use App\Type;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GumballsTableCanasEnlightenmentFactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adventure = Type::where('key', '=', 'AD')
            ->first()
            ->id;
        $magic = Type::where('key', '=', 'MA')
            ->first()
            ->id;
        $melee = Type::where('key', '=', 'ME')
            ->first()
            ->id;

        $gumballs = [
            [
                'name' => 'Priest',
                'key' => 'CE-PRIE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/1/14/Priest.png/revision/latest',
            ],
            [
                'name' => 'Mage',
                'key' => 'CE-MAGE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/2/20/Mage.png/revision/latest',
            ],
            [
                'name' => 'Witch',
                'key' => 'CE-WITC',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/e/e6/Witch.png/revision/latest',
            ],
            [
                'name' => 'Fallen Angel',
                'key' => 'CE-FAAN',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/1/1d/Fallen_Angel.png/revision/latest',
            ],
            [
                'name' => 'Merchant',
                'key' => 'CE-MERC',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/1/19/Merchant.png/revision/latest',
            ],
            [
                'name' => 'King',
                'key' => 'CE-KING',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/1/1d/King.png/revision/latest',
            ],
            [
                'name' => 'Soul Reaper',
                'key' => 'CE-SORE',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/4/4c/Soul_Reaper.png/revision/latest',
            ],
            [
                'name' => 'World Tree',
                'key' => 'CE-WOTR',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/3/38/World_Tree.png/revision/latest',
            ],
            [
                'name' => 'Demon Hunter',
                'key' => 'CE-DEHU',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/b/bf/Demon_Hunter.png/revision/latest',
            ],
            [
                'name' => 'Dwarf King',
                'key' => 'CE-DWKI',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/3/3b/Dwarves_King.png/revision/latest',
            ],
            [
                'name' => 'Terminator',
                'key' => 'CE-TERM',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/8/81/Terminator.png/revision/latest',
            ],
            [
                'name' => 'Machine Herald',
                'key' => 'CE-MAHE',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/2/2d/Machine_Herald.png/revision/latest',
            ],
            [
                'name' => 'Odin',
                'key' => 'CE-ODIN',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/5/58/Odin.png/revision/latest',
            ],
            [
                'name' => 'Justice Herald',
                'key' => 'CE-JUHE',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/5/52/Justice_Herald.png/revision/latest',
            ],
            [
                'name' => 'Prince',
                'key' => 'CE-PRIN',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/b/b4/Prince.png/revision/latest',
            ],
            [
                'name' => 'Lamp',
                'key' => 'CE-LAMP',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/3/37/Lamp.png/revision/latest',
            ],
            [
                'name' => 'Future Cat',
                'key' => 'CE-FUCA',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/f/f8/Future_Cat.png/revision/latest',
            ],
            [
                'name' => 'Cyborg',
                'key' => 'CE-CYBO',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/a/a3/Cyborg.png/revision/latest',
            ],
            [
                'name' => 'Sunflower',
                'key' => 'CE-SUFL',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/8/81/Sunflower.png/revision/latest',
            ],
            [
                'name' => 'Golden Titan',
                'key' => 'CE-GOTI',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/6/6b/Golden_Titan.png/revision/latest',
            ],
            [
                'name' => 'Poseidon',
                'key' => 'CE-POSI',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/4/43/Poseidon.png/revision/latest',
            ],
            [
                'name' => 'Red Hood',
                'key' => 'CE-REHO',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/d/da/Red_Hood.png/revision/latest',
            ],
            [
                'name' => 'Magic Boy',
                'key' => 'CE-MABO',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/0/02/Magic_Boy.png/revision/latest',
            ],
            [
                'name' => 'Explosive Pumpkin',
                'key' => 'CE-EXPU',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/8/8c/Explosive_Pumpkin.png/revision/latest',
            ],
            [
                'name' => 'Cactus',
                'key' => 'CE-CACT',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/a/a6/Cactus.png/revision/latest',
            ],
            [
                'name' => 'Faerie Dragon',
                'key' => 'CE-FADR',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/8/84/Faerie_Dragon.png/revision/latest',
            ],
            [
                'name' => 'Earth Elemental',
                'key' => 'CE-EAEL',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/8/87/Earth_Elemental.png/revision/latest',
            ],
            [
                'name' => 'Water Elemental',
                'key' => 'CE-WAEL',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/5/5d/Water_Elemental.png/revision/latest',
            ],
            [
                'name' => 'Fire Elemental',
                'key' => 'CE-FIEL',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/a/a8/Fire_Elemental.png/revision/latest',
            ],
            [
                'name' => 'Air Elemental',
                'key' => 'CE-AIEL',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/3/3f/Air_Elemental.png/revision/latest',
            ],
            [
                'name' => 'Light Elemental',
                'key' => 'CE-LIEL',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/8/88/Light_Elemental.png/revision/latest',
            ],
            [
                'name' => 'Dark Elemental',
                'key' => 'CE-DAEL',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/1/1c/Dark_Elemental.png/revision/latest',
            ],
            [
                'name' => 'Phoenix',
                'key' => 'CE-PHOE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/c/c1/Phoenix.png/revision/latest',
            ],
            [
                'name' => 'Bloody Wolf',
                'key' => 'CE-BLWO',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/6/6f/Bloody_Wolf.png/revision/latest',
            ],
            [
                'name' => 'Doctor Octopus',
                'key' => 'CE-DOCO',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/7d/Doctor_Octopus.png/revision/latest',
            ],
            [
                'name' => 'Three-eye King',
                'key' => 'CE-THKI',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/3/3e/Three-eye_King.png/revision/latest',
            ],
            [
                'name' => 'Cupid',
                'key' => 'CE-CUPI',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/0/06/Cupid.png/revision/latest',
            ],
            [
                'name' => 'DJ',
                'key' => 'CE-DJDJ',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/5/5b/DJ.png/revision/latest',
            ],
            [
                'name' => 'Chef',
                'key' => 'CE-CHEF',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/e/e5/Chef.png/revision/latest',
            ],
            [
                'name' => 'Gang Cadre',
                'key' => 'CE-GACA',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/b4/Gang_Cadre.png/revision/latest',
            ],
            [
                'name' => 'Hamster',
                'key' => 'CE-HAMS',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/1/1e/Hamster.png/revision/latest',
            ],
            [
                'name' => 'Franken',
                'key' => 'CE-FRAN',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/f/fb/Franken.png/revision/latest',
            ],
            [
                'name' => 'Cytus',
                'key' => 'CE-CYTU',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/cd/Cytus.png/revision/latest',
            ],
            [
                'name' => 'No.2 Parasite',
                'key' => 'CE-NO2P',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/aa/No.2_Parasite.png/revision/latest',
            ],
            [
                'name' => 'Exorcist',
                'key' => 'CE-EXOR',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/ac/Exorcist.png/revision/latest',
            ],
            [
                'name' => 'Sandy',
                'key' => 'CE-SAND',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/4/4e/Sandy.png/revision/latest',
            ],
            [
                'name' => 'Miser',
                'key' => 'CE-MISE',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/ad/Miser.png/revision/latest',
            ],
            [
                'name' => 'Star',
                'key' => 'CE-STAR',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/2/2e/Star.png/revision/latest',
            ],
            [
                'name' => 'Referee',
                'key' => 'CE-REFE',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/d1/Referee.png/revision/latest',
            ],
            [
                'name' => 'Ray Adas',
                'key' => 'CE-RAAD',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/2/20/Ray_Adas.png/revision/latest',
            ],
            [
                'name' => 'Sugar',
                'key' => 'CE-SUGA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/a9/Sugar.png/revision/latest',
            ],
            [
                'name' => 'Experiment Subject No.1',
                'key' => 'CE-ESN1',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/d7/Experiment_Subject_No.1.png/revision/latest',
            ],
            [
                'name' => 'Experiment Subject No.2',
                'key' => 'CE-ESN2',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/aa/Experiment_Subject_No.2.png/revision/latest',
            ],
            [
                'name' => 'Experiment Subject No.3',
                'key' => 'CE-ESN3',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/7b/Experiment_Subject_No.3.png/revision/latest',
            ],
            [
                'name' => 'Watchman',
                'key' => 'CE-WATC',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/5/55/Watchman.png/revision/latest',
            ],
            [
                'name' => 'Spiritual Elemental',
                'key' => 'CE-SPEL',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/ba/Spiritual_Elemental.png/revision/latest',
            ],
            [
                'name' => 'Noble',
                'key' => 'CE-NOBL',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/5/59/Noble.png/revision/latest',
            ],
            [
                'name' => 'Rune Master',
                'key' => 'CE-RUMA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/d7/Rune_Master_%28Gumball%29.png/revision/latest',
            ],
            [
                'name' => 'Omega',
                'key' => 'CE-OMEG',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/b2/Omega.png/revision/latest',
            ],
            [
                'name' => 'Xi Shi',
                'key' => 'CE-XISH',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/c3/Xi_Shi.png/revision/latest',
            ],
            [
                'name' => 'Bloodthirst Vine',
                'key' => 'CE-BLVI',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/e/e8/Bloodthirst_Vine.png/revision/latest',
            ],
            [
                'name' => 'Lord of Ender',
                'key' => 'CE-LOOE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/6/60/Lord_of_Ender.png/revision/latest',
            ],
            [
                'name' => 'Shadow Priest',
                'key' => 'CE-SHPR',
                'type_id' => null,
                'description' => null,
                'image' => null,
            ],
            [
                'name' => 'Principal',
                'key' => 'CE-PRAL',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/e/ea/Principal.png/revision/latest',
            ],
            [
                'name' => 'Courier',
                'key' => 'CE-COUR',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/e/e5/Courier.png/revision/latest',
            ],
            [
                'name' => 'Artemis',
                'key' => 'CE-ARTE',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/d2/Artemis.png/revision/latest',
            ],
        ];

        $faction = Faction::where('key', '=', 'CE')
            ->first()
            ->id;

        foreach ($gumballs as $gumball) {
            Gumball::updateOrCreate(
                $gumball,
                array_merge(
                    $gumball,
                    [
                        'faction_id' => $faction,
                    ]
                )
            );
        }
    }
}
