<?php

use App\Faction;
use App\Gumball;
use App\Type;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GumballsTableAoluweisBladeFactionSeeder extends Seeder
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
                'name' => 'Adventurer',
                'key' => 'AB-ADVE',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/c/cc/Adventurer.png/revision/latest',
            ],
            [
                'name' => 'Swordsman',
                'key' => 'AB-SWOR',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/5/5a/Swordsman.png/revision/latest',
            ],
            [
                'name' => 'Gladiator',
                'key' => 'AB-GLAD',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/4/44/Gladiator.png/revision/latest',
            ],
            [
                'name' => 'Machinist',
                'key' => 'AB-MACH',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/e/e0/Machinist.png/revision/latest',
            ],
            [
                'name' => 'Alchemist',
                'key' => 'AB-ALCH',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/5/5b/Alchemist.png/revision/latest',
            ],
            [
                'name' => 'Pirate',
                'key' => 'AB-PIRA',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/7/7d/Pirate.png/revision/latest',
            ],
            [
                'name' => 'Monkey King',
                'key' => 'AB-MOKI',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/f/f4/Monkey_King.png/revision/latest',
            ],
            [
                'name' => 'Warrior',
                'key' => 'AB-WARR',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/9/97/Warrior.png/revision/latest',
            ],
            [
                'name' => 'Night Knight',
                'key' => 'AB-NIKN',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/f/f5/Night_Knight.png/revision/latest',
            ],
            [
                'name' => 'Armor',
                'key' => 'AB-ARMO',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/0/06/Armor.png/revision/latest',
            ],
            [
                'name' => 'Holy Warrior',
                'key' => 'AB-HOWA',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/2/2f/Holy_Warrior.png/revision/latest',
            ],
            [
                'name' => 'Blacksmith',
                'key' => 'AB-BLAC',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/b/be/Blacksmith.png/revision/latest',
            ],
            [
                'name' => 'Sorcerer',
                'key' => 'AB-SORC',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/2/27/Sorcerer.png/revision/latest',
            ],
            [
                'name' => 'Zorro',
                'key' => 'AB-ZORR',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/d/db/Zorro.png/revision/latest',
            ],
            [
                'name' => 'Guardian',
                'key' => 'AB-GUAR',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/f/fd/Guardian.png/revision/latest',
            ],
            [
                'name' => 'Hercules',
                'key' => 'AB-HERC',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/7/76/Hercules.png/revision/latest',
            ],
            [
                'name' => 'Zerg Queen',
                'key' => 'AB-ZEQU',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/a/ad/Zerg_Queen.png/revision/latest',
            ],
            [
                'name' => 'Athena',
                'key' => 'AB-ATHE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/6/68/Athena.png/revision/latest',
            ],
            [
                'name' => 'Spartan',
                'key' => 'AB-SPAR',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/e/e6/Spartan.png/revision/latest',
            ],
            [
                'name' => 'Condottiere',
                'key' => 'AB-COND',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/d/d4/Condottiere.png/revision/latest',
            ],
            [
                'name' => 'Holy Dragon',
                'key' => 'AB-HODR',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/8/82/Holy_Dragon.png/revision/latest',
            ],
            [
                'name' => 'Pinocchio',
                'key' => 'AB-PINO',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/f/f5/Pinocchio.png/revision/latest',
            ],
            [
                'name' => 'Spy',
                'key' => 'AB-SPY',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/3/36/Spy.png/revision/latest',
            ],
            [
                'name' => 'Duelist',
                'key' => 'AB-DUEL',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/5/55/Duelist.png/revision/latest',
            ],
            [
                'name' => 'Angel Deity',
                'key' => 'AB-ANDE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/3/31/Angel_Deity.png/revision/latest',
            ],
            [
                'name' => 'Butcher',
                'key' => 'AB-BUTC',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/f/fb/Butcher.png/revision/latest',
            ],
            [
                'name' => 'Blue Shark',
                'key' => 'AB-BLSH',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/9/9f/Blue_Shark.png/revision/latest',
            ],
            [
                'name' => 'Bomberman',
                'key' => 'AB-BOMB',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/ca/Bomberman.png/revision/latest',
            ],
            [
                'name' => 'Snowman',
                'key' => 'AB-SNOW',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/c/c7/Snowman.png/revision/latest',
            ],
            [
                'name' => 'High Priest',
                'key' => 'AB-HIPR',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/a/ab/High_Priest.png/revision/latest',
            ],
            [
                'name' => 'Heavenly King',
                'key' => 'AB-HEKI',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/2/2b/Heavenly_King.png/revision/latest',
            ],
            [
                'name' => 'Little May',
                'key' => 'AB-LIMA',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/9/90/Little_May.png/revision/latest',
            ],
            [
                'name' => 'Alien',
                'key' => 'AB-ALIE',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/1/12/Alien.png/revision/latest',
            ],
            [
                'name' => 'Goblin',
                'key' => 'AB-GOBL',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/d/d2/Goblin.png/revision/latest',
            ],
            [
                'name' => 'Ripper',
                'key' => 'AB-RIPP',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/4/44/Ripper.png/revision/latest',
            ],
            [
                'name' => 'Paparazzi',
                'key' => 'AB-PAPA',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/7d/Paparazzi.png/revision/latest',
            ],
            [
                'name' => 'Totem Warlock',
                'key' => 'AB-TOWA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/5/5d/Totem_Warlock.png/revision/latest',
            ],
            [
                'name' => 'Gawaine',
                'key' => 'AB-GAWA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/5/52/Gawaine.png/revision/latest',
            ],
            [
                'name' => 'Galahad',
                'key' => 'AB-GALA',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/dc/Galahad.png/revision/latest',
            ],
            [
                'name' => 'Gaheris',
                'key' => 'AB-GAHE',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/8/81/Gaheris.png/revision/latest',
            ],
            [
                'name' => 'Lamorak',
                'key' => 'AB-LAMO',
                'type_id' => $melee,
                'description' => null,
                'image' => 'src="https://vignette.wikia.nocookie.net/gdmaze/images/c/ce/Lamorak.png/revision/latest',
            ],
            [
                'name' => 'Lancelot',
                'key' => 'AB-LANC',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/cd/Lancelot.png/revision/latest',
            ],
            [
                'name' => 'King Arthur',
                'key' => 'AB-KIAR',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/4/40/King_Arthur.png/revision/latest',
            ],
            [
                'name' => 'Avalon',
                'key' => 'AB-AVAL',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/b7/Avalon.png/revision/latest',
            ],
            [
                'name' => 'Zeus',
                'key' => 'AB-ZEUS',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/3/3c/Zeus.png/revision/latest',
            ],
            [
                'name' => 'No.1 Parasite',
                'key' => 'AB-NO1P',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/5/56/No.1_Parasite.png/revision/latest',
            ],
            [
                'name' => 'Alexander',
                'key' => 'AB-ALEX',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/d9/Alexander.png/revision/latest',
            ],
            [
                'name' => 'Tripitaka',
                'key' => 'AB-TRIP',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/9/9e/Tripitaka.png/revision/latest',
            ],
            [
                'name' => 'Architect',
                'key' => 'AB-ARCH',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/f/fb/Architect.png/revision/latest',
            ],
            [
                'name' => 'Driver',
                'key' => 'AB-DRIV',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/d1/Driver.png/revision/latest',
            ],
            [
                'name' => 'Momotaro',
                'key' => 'AB-MOMO',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/cf/Momotaro.png/revision/latest',
            ],
            [
                'name' => 'Joan',
                'key' => 'AB-JOAN',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/4/4d/Joan.png/revision/latest',
            ],
            [
                'name' => 'Hella',
                'key' => 'AB-HELL',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/bd/Hella.png/revision/latest',
            ],
            [
                'name' => 'Phantomrider',
                'key' => 'AB-PHAN',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/1/18/Phantomrider.png/revision/latest',
            ],
            [
                'name' => 'Goodwill Ambassador',
                'key' => 'AB-GOAM',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/0/06/Goodwill_Ambassador.png/revision/latest',
            ],
            [
                'name' => 'Hastur',
                'key' => 'AB-HAST',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/2/27/Hastur.png/revision/latest',
            ],
            [
                'name' => 'Fire Giant',
                'key' => 'AB-FIGI',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/c3/Fire_Giant.png/revision/latest',
            ],
            [
                'name' => 'Darkin',
                'key' => 'AB-DARK',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/3/3d/Darkin.png/revision/latest',
            ],
            [
                'name' => 'Yang Yuhuan',
                'key' => 'AB-YAYU',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/7d/Yang_Yuhuan.png/revision/latest',
            ],
            [
                'name' => 'Paladin',
                'key' => 'AB-PALA',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/b2/Paladin.png/revision/latest',
            ],
            [
                'name' => 'Wondrous Cube',
                'key' => 'AB-WOCU',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/6/6b/Wondrous_Cube.png/revision/latest',
            ],
            [
                'name' => 'Priestess',
                'key' => 'AB-PRIE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/bc/Priestess.png/revision/latest',
            ],
            [
                'name' => 'Siren',
                'key' => 'AB-SIRE',
                'type_id' => null,
                'description' => null,
                'image' => null,
            ],
            [
                'name' => 'Detector',
                'key' => 'AB-DETE',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/ad/Detector.png/revision/latest',
            ],
            [
                'name' => 'Dragonblood Warrior',
                'key' => 'AB-DRWA',
                'type_id' => null,
                'description' => null,
                'image' => null,
            ],
        ];

        $faction = Faction::where('key', '=', 'AB')
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
