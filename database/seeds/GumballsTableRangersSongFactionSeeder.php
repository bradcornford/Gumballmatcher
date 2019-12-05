<?php

use App\Faction;
use App\Gumball;
use App\Type;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GumballsTableRangersSongFactionSeeder extends Seeder
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
                'name' => 'Bandit',
                'key' => 'RS-BAND',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/1/1f/Bandit.png/revision/latest',
            ],
            [
                'name' => 'Minstrel',
                'key' => 'RS-MINS',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/6/66/Minstrel.png/revision/latest',
            ],
            [
                'name' => 'Bounty Hunter',
                'key' => 'RS-BOHU',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/1/1d/Bounty_Hunter.png/revision/latest',
            ],
            [
                'name' => 'Zeros',
                'key' => 'RS-ZERO',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/1/13/Zeros.png/revision/latest',
            ],
            [
                'name' => 'Divine Dragon',
                'key' => 'RS-DIDR',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/6/67/Divine_Dragon.png/revision/latest',
            ],
            [
                'name' => 'Musashi',
                'key' => 'RS-MUSA',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/4/45/Musashi.png/revision/latest',
            ],
            [
                'name' => 'Crusader',
                'key' => 'RS-CRUS',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/e/eb/Crusader.png/revision/latest',
            ],
            [
                'name' => 'Tarot',
                'key' => 'RS-TARO',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/4/45/Tarot.png/revision/latest',
            ],
            [
                'name' => 'Ghost Captain',
                'key' => 'RS-GHCA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/c/c0/Ghost_Captain.png/revision/latest',
            ],
            [
                'name' => 'Kaito',
                'key' => 'RS-KAIT',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/9/92/Kaito.png/revision/latest',
            ],
            [
                'name' => 'Panda',
                'key' => 'RS-PAND',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/0/00/Panda.png/revision/latest',
            ],
            [
                'name' => 'Sage',
                'key' => 'RS-SAGE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/f/f8/Sage.png/revision/latest',
            ],
            [
                'name' => 'Slave',
                'key' => 'RS-SLAV',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/e/e4/Slave.png/revision/latest',
            ],
            [
                'name' => 'Commander',
                'key' => 'RS-COMM',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/2/2e/Commander.png/revision/latest',
            ],
            [
                'name' => 'Apollo',
                'key' => 'RS-APOL',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/1/14/Apollo.png/revision/latest',
            ],
            [
                'name' => 'Archaeologist',
                'key' => 'RS-ARCH',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/5/5a/Archaeologist.png/revision/latest',
            ],
            [
                'name' => 'Autobots',
                'key' => 'RS-AUTO',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/7/79/Autobots.png/revision/latest',
            ],
            [
                'name' => 'Modificator',
                'key' => 'RS-MODI',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/e/e3/Modificator.png/revision/latest',
            ],
            [
                'name' => 'Nobunaga',
                'key' => 'RS-NOBU',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/1/19/Nobunaga.png/revision/latest',
            ],
            [
                'name' => 'Masamune',
                'key' => 'RS-MASA',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/1/1b/Masamune.png/revision/latest',
            ],
            [
                'name' => 'Kraken Captain',
                'key' => 'RS-KRCA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/d/d9/Kraken_Captain.png/revision/latest',
            ],
            [
                'name' => 'Lionheart King',
                'key' => 'RS-LIKI',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/5/5d/Lionheart_King.png/revision/latest',
            ],
            [
                'name' => 'Saladin',
                'key' => 'RS-SALA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/2/2d/Saladin.png/revision/latest',
            ],
            [
                'name' => 'Starmoon Scholar',
                'key' => 'RS-STSC',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/c/c6/Starmoon_Scholar.png/revision/latest',
            ],
            [
                'name' => 'Pharaoh',
                'key' => 'RS-PHAR',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/2/26/Pharaoh.png/revision/latest',
            ],
            [
                'name' => 'Mammoth',
                'key' => 'RS-MAMM',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/a/a5/Mammoth.png/revision/latest',
            ],
            [
                'name' => 'Peter',
                'key' => 'RS-PETE',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette4.wikia.nocookie.net/gdmaze/images/9/91/Peter.png/revision/latest',
            ],
            [
                'name' => 'Clown',
                'key' => 'RS-CLOW',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/f/ff/Clown.png/revision/latest',
            ],
            [
                'name' => 'Jeweler',
                'key' => 'RS-JEWE',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/c/c0/Jeweler.png/revision/latest',
            ],
            [
                'name' => 'Nalakuvara',
                'key' => 'RS-NALA',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette3.wikia.nocookie.net/gdmaze/images/e/e6/Nalakuvara.png/revision/latest',
            ],
            [
                'name' => 'Nelson',
                'key' => 'RS-NELS',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette2.wikia.nocookie.net/gdmaze/images/0/03/Nelson.png/revision/latest',
            ],
            [
                'name' => 'Merman',
                'key' => 'RS-MERM',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/e/e1/Merman.png/revision/latest',
            ],
            [
                'name' => 'Bunny',
                'key' => 'RS-BUNN',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/8/82/Bunny.png/revision/latest',
            ],
            [
                'name' => 'Puppeteer',
                'key' => 'RS-PUPP',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette1.wikia.nocookie.net/gdmaze/images/7/7a/Puppeteer.png/revision/latest',
            ],
            [
                'name' => 'Flagellant',
                'key' => 'RS-FLAG',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/9/94/Flagellant.png/revision/latest',
            ],
            [
                'name' => 'Junkman',
                'key' => 'RS-JUNK',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/b/bd/Junkman.png/revision/latest',
            ],
            [
                'name' => 'Blade',
                'key' => 'RS-BLAD',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/ad/Blade.png/revision/latest',
            ],
            [
                'name' => 'Chuchu',
                'key' => 'RS-CHUC',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/9/91/Chuchu.png/revision/latest',
            ],
            [
                'name' => 'Space Wizard',
                'key' => 'RS-SPWI',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/0/06/Space_Wizard.png/revision/latest',
            ],
            [
                'name' => 'Great Guardian',
                'key' => 'RS-GRGU',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/3/36/Great_Guardian.png/revision/latest',
            ],
            [
                'name' => 'Catherine',
                'key' => 'RS-CATH',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/a5/Catherine.png/revision/latest',
            ],
            [
                'name' => 'Yaksha',
                'key' => 'RS-YAKS',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/2/21/Yaksha.png/revision/latest',
            ],
            [
                'name' => 'Gandharva',
                'key' => 'RS-GAND',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/0/0d/Gandharva.png/revision/latest',
            ],
            [
                'name' => 'Mahiraga',
                'key' => 'RS-MAHI',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/9/91/Mahiraga.png/revision/latest',
            ],
            [
                'name' => 'Asura',
                'key' => 'RS-ASUR',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/5/52/Asura.png/revision/latest',
            ],
            [
                'name' => 'Garuda',
                'key' => 'RS-GARU',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/78/Garuda.png/revision/latest',
            ],
            [
                'name' => 'Magmatron',
                'key' => 'RS-MAGM',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/8/8e/Magmatron.png/revision/latest',
            ],
            [
                'name' => 'No.3 Parasite',
                'key' => 'RS-NO3P',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/6/66/No.3_Parasite.png/revision/latest',
            ],
            [
                'name' => 'Kusanagi Warrior',
                'key' => 'RS-KUWA',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/8/8c/Kusanagi_Warrior.png/revision/latest',
            ],
            [
                'name' => 'Pigsy',
                'key' => 'RS-PIGS',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/c3/Pigsy.png/revision/latest',
            ],
            [
                'name' => 'Game Talent',
                'key' => 'RS-GATA',
                'type_id' => null,
                'description' => null,
                'image' => null,
            ],
            [
                'name' => 'Dimension Walker',
                'key' => 'RS-DIWA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/8/8d/Dimension_Walker.png/revision/latest',
            ],
            [
                'name' => 'Mischief',
                'key' => 'RS-MISC',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/8/8d/Mischief.png/revision/latest',
            ],
            [
                'name' => 'Cosmic Police',
                'key' => 'RS-COPO',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/cd/Cosmic_Police.png/revision/latest',
            ],
            [
                'name' => 'Wilderness Hunter',
                'key' => 'RS-WIHU',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/0/0d/Wilderness_Hunter.png/revision/latest',
            ],
            [
                'name' => 'Dr. Mad',
                'key' => 'RS-DRMA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/7/7f/Dr._Mad.png/revision/latest',
            ],
            [
                'name' => 'Cyclops',
                'key' => 'RS-CYCL',
                'type_id' => $melee,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/a9/Cyclops.png/revision/latest',
            ],
            [
                'name' => 'Santa Claus',
                'key' => 'RS-SACL',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/5/58/Santa_Claus.png/revision/latest',
            ],
            [
                'name' => 'Philanthropist',
                'key' => 'RS-PHIL',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/f/f2/Philanthropist.png/revision/latest',
            ],
            [
                'name' => 'Wang Zhaojun',
                'key' => 'RS-WAZH',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/1/15/Wang_Zhaojun.png/revision/latest',
            ],
            [
                'name' => 'Great Detective',
                'key' => 'RS-GRDE',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/6/65/Great_Detective.png/revision/latest',
            ],
            [
                'name' => 'Elemental Shaman',
                'key' => 'RS-ELSH',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/e/ee/Elemental_Shaman.png/revision/latest',
            ],
            [
                'name' => 'Revenge Archer',
                'key' => 'RS-REAR',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/d/dd/Revenge_Archer.png/revision/latest',
            ],
            [
                'name' => 'Hestia',
                'key' => 'RS-HEST',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/aa/Hestia.png/revision/latest',
            ],
            [
                'name' => 'Magical Painter',
                'key' => 'RS-MAPA',
                'type_id' => $magic,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/9/9c/Magical_Painter.png/revision/latest',
            ],
            [
                'name' => 'Oracle',
                'key' => 'RS-ORAC',
                'type_id' => null,
                'description' => null,
                'image' => null,
            ],
            [
                'name' => 'Puggi',
                'key' => 'RS-PUGG',
                'type_id' => $adventure,
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/a/a3/Puggi.png/revision/latest',
            ],
            [
                'name' => 'Gun Dealer',
                'key' => 'RS-GUDE',
                'type_id' => null,
                'description' => null,
                'image' => null,
            ],
        ];

        $faction = Faction::where('key', '=', 'RS')
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
