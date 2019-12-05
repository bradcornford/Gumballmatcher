<?php

use App\Faction;
use App\Gumball;
use App\Type;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GumballsTableAbyssRoarFactionSeeder extends Seeder
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
                'name' => 'Vampire',
                'key' => 'AR-VAMP',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/4/4e/Vampire.png/revision/latest',
            ],
            [
                'name' => 'Death Knight',
                'key' => 'AR-DEKN',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/3/32/Death_Knight.png/revision/latest',
            ],
            [
                'name' => 'Demon',
                'key' => 'AR-DEMO',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/c/c4/Demon.png/revision/latest',
            ],
            [
                'name' => 'Red Dragon',
                'key' => 'AR-REDR',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/9/95/Red_Dragon.png/revision/latest',
            ],
            [
                'name' => 'Magic Golem',
                'key' => 'AR-MAGO',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/8/84/Magic_Golem.png/revision/latest',
            ],
            [
                'name' => 'Hellfire',
                'key' => 'AR-HELL',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/4/4e/Hellfire.png/revision/latest',
            ],
            [
                'name' => 'Pharmacist',
                'key' => 'AR-PHAR',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/a/a9/Pharmacist.png/revision/latest',
            ],
            [
                'name' => 'Destroyer',
                'key' => 'AR-DEST',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/3/3a/Destroyer.png/revision/latest',
            ],
            [
                'name' => 'Creator',
                'key' => 'AR-CREA',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/7/76/Creator.png/revision/latest',
            ],
            [
                'name' => 'Medusa',
                'key' => 'AR-MEDU',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/c/c3/Medusa.png/revision/latest',
            ],
            [
                'name' => 'Time Wizard',
                'key' => 'AR-TIWI',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/b/b9/Time_Wizard.png/revision/latest',
            ],
            [
                'name' => 'Predator',
                'key' => 'AR-PRED',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/e/e9/Predator.png/revision/latest',
            ],
            [
                'name' => 'Dark Dragon',
                'key' => 'AR-DADR',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/3/33/Dark_Dragon.png/revision/latest',
            ],
            [
                'name' => 'Captain',
                'key' => 'AR-CAPT',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/a/a9/Captain.png/revision/latest',
            ],
            [
                'name' => 'Commandos',
                'key' => 'AR-COMM',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/f/f6/Commandos.png/revision/latest',
            ],
            [
                'name' => 'Templar',
                'key' => 'AR-TEMP',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/0/0e/Templar.png/revision/latest',
            ],
            [
                'name' => 'Black Warrior',
                'key' => 'AR-BLWA',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/d/d4/Black_Warrior.png/revision/latest',
            ],
            [
                'name' => 'Lich King',
                'key' => 'AR-LIKI',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/3/31/Lich_King.png/revision/latest',
            ],
            [
                'name' => 'Vampire Hunter',
                'key' => 'AR-VAHU',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/c/c8/Vampire_Hunter.png/revision/latest',
            ],
            [
                'name' => 'Hades',
                'key' => 'AR-HADE',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/6/64/Hades.png/revision/latest',
            ],
            [
                'name' => 'Raptor',
                'key' => 'AR-RAPT',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/0/08/Raptor.png/revision/latest',
            ],
            [
                'name' => 'Claw',
                'key' => 'AR-CLAW',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/4/47/Claw.png/revision/latest',
            ],
            [
                'name' => 'Checkers',
                'key' => 'AR-CHEC',
                'description'=> null,
                'type_id' => $adventure,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/c/cc/Checkers.png/revision/latest',
            ],
            [
                'name' => 'Shadow Assassin',
                'key' => 'AR-SHAS',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/8/8a/Shadow_Assassin.png/revision/latest',
            ],
            [
                'name' => 'Skeleton Lord',
                'key' => 'AR-SKLO',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/b/bf/Skeleton_Lord.png/revision/latest',
            ],
            [
                'name' => 'Black & White Queen',
                'key' => 'AR-BLWQ',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/d/d6/Black_%26_White_Queen.png/revision/latest',
            ],
            [
                'name' => 'White Chess Bishop',
                'key' => 'AR-WHCB',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/7/7b/White_Chess_Bishop.png/revision/latest',
            ],
            [
                'name' => 'NO.1 Mutant',
                'key' => 'AR-NO1M',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/b/bd/NO.1_Mutant.png/revision/latest',
            ],
            [
                'name' => 'NO.2 Mutant',
                'key' => 'AR-NO2M',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/7/7d/NO.2_Mutant.png/revision/latest',
            ],
            [
                'name' => 'NO.3 Mutant',
                'key' => 'AR-NO3M',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/a/a4/NO.3_Mutant.png/revision/latest',
            ],
            [
                'name' => 'NO.4 Mutant',
                'key' => 'AR-NO4M',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/4/48/NO.4_Mutant.png/revision/latest',
            ],
            [
                'name' => 'NO.5 Mutant',
                'key' => 'AR-NO5M',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/f/fe/NO.5_Mutant.png/revision/latest',
            ],
            [
                'name' => 'Cosmic Godfather',
                'key' => 'AR-COGO',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/2/23/Cosmic_Godfather.png/revision/latest',
            ],
            [
                'name' => 'Sculptor',
                'key' => 'AR-SCUL',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/5/53/Sculptor.png/revision/latest',
            ],
            [
                'name' => 'Gumiho',
                'key' => 'AR-GUMI',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/1/1a/Gumiho.png/revision/latest',
            ],
            [
                'name' => 'Pandora',
                'key' => 'AR-PAND',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/9/94/Pandora.png/revision/latest',
            ],
            [
                'name' => 'Frost Queen',
                'key' => 'AR-FRQU',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/0/06/Frost_Queen.png/revision/latest',
            ],
            [
                'name' => 'Geisha',
                'key' => 'AR-GEIS',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/a/ab/Geisha.png/revision/latest',
            ],
            [
                'name' => 'Trainer',
                'key' => 'AR-TRAI',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/4/49/Trainer.png/revision/latest',
            ],
            [
                'name' => 'Orc',
                'key' => 'AR-ORC',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/bf/Orc.png/revision/latest',
            ],
            [
                'name' => 'Ninja Frog',
                'type_id' => $melee,
                'key' => 'AR-NIFR',
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/e/e9/Ninja_Frog.png/revision/latest',
            ],
            [
                'name' => 'Satan\'s Son',
                'key' => 'AR-SASO',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/7f/Satan%27s_Son.png/revision/latest',
            ],
            [
                'name' => 'Deemo',
                'key' => 'AR-DEEM',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/d5/Deemo.png/revision/latest',
            ],
            [
                'name' => 'Kairo Monarch',
                'key' => 'AR-KAMO',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/7e/Kairo_Monarch.png/revision/latest',
            ],
            [
                'name' => 'Kairo Concubine',
                'key' => 'AR-KACO',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/73/Kairo_Concubine.png/revision/latest',
            ],
            [
                'name' => 'No.4 Parasite',
                'key' => 'AR-NO4P',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/c5/No.4_Parasite.png/revision/latest',
            ],
            [
                'name' => 'Crypt Lord',
                'key' => 'AR-CRLO',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/e/e7/Crypt_Lord.png/revision/latest',
            ],
            [
                'name' => 'Semi-Finished Product',
                'key' => 'AR-SFPR',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/bc/Semi-Finished_Product.png/revision/latest',
            ],
            [
                'name' => 'Bull Demon King',
                'key' => 'AR-BUDK',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/6/65/Bull_Demon_King.png/revision/latest',
            ],
            [
                'name' => 'Orochi',
                'key' => 'AR-OROC',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/1/12/Orochi.png/revision/latest',
            ],
            [
                'name' => 'Cerebrate',
                'key' => 'AR-CERE',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/b5/Cerebrate.png/revision/latest',
            ],
            [
                'name' => 'Psychic',
                'key' => 'AR-PSYC',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/2/21/Psychic.png/revision/latest',
            ],
            [
                'name' => 'Eternal Titan',
                'key' => 'AR-ETTI',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/4/4f/Eternal_Titan.png/revision/latest',
            ],
            [
                'name' => 'War Giant Creature',
                'key' => 'AR-WAGC',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/4/43/War_Giant_Creature.png/revision/latest',
            ],
            [
                'name' => 'Cthulhu',
                'key' => 'AR-CTHU',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/9/9e/Cthulhu.png/revision/latest',
            ],
            [
                'name' => 'Zombie',
                'key' => 'AR-ZOMB',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/c3/Zombie.png/revision/latest',
            ],
            [
                'name' => 'Plague Doctor',
                'key' => 'AR-PLDO',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/1/17/Plague_Doctor.png/revision/latest',
            ],
            [
                'name' => 'Mechanical Apostle',
                'key' => 'AR-MEAP',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/f/fa/Mechanical_Apostle.png/revision/latest',
            ],
            [
                'name' => 'Diau Charn',
                'key' => 'AR-DICH',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/8/8d/Diau_Charn.png/revision/latest',
            ],
            [
                'name' => 'Lifeguard',
                'key' => 'AR-LIFE',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/4/44/Lifeguard.png/revision/latest',
            ],
            [
                'name' => 'Gargoyle',
                'key' => 'AR-GARG',
                'description'=> null,
                'image' => null,
            ],
            [
                'name' => 'Scarecrow',
                'key' => 'AR-SCAR',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/1/1e/Scarecrow_%28Gumball%29.png/revision/latest',
            ],
            [
                'name' => 'Mad Hatter',
                'key' => 'AR-MAHA',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/9/94/Mad_Hatter.png/revision/latest',
            ],
            [
                'name' => 'Onmyouji',
                'key' => 'AR-ONMY',
                'type_id' => $adventure,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/a8/Berserker.png/revision/latest',
            ],
            [
                'name' => 'Berserker',
                'key' => 'AR-BERS',
                'type_id' => $melee,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/a8/Berserker.png/revision/latest',
            ],
            [
                'name' => 'Angelia',
                'key' => 'AR-ANGE',
                'type_id' => $magic,
                'description'=> null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/cc/Angelia.png/revision/latest',
            ],
        ];

        $faction = Faction::where('key', '=', 'AR')
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
