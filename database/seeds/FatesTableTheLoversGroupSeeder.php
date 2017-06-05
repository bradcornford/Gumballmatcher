<?php
use App\Fate;
use App\Group;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FatesTableTheLoversGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fates = [
            [
                'name' => 'Royal Romantic History I',
                'key' => 'TL-RRH1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-KING',
                    'CE-REHO'
                ]
            ],
            [
                'name' => 'Royal Romantic History I',
                'key' => 'TL-RRH2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-PRIN',
                    'CE-REHO'
                ]
            ],
            [
                'name' => 'Cursed Love',
                'key' => 'TL-CULO',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-MEDU',
                    'CE-POSI'
                ]
            ],
            [
                'name' => 'Bodyguard',
                'key' => 'TL-BODY',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-HOWA',
                    'AB-ATHE'
                ]
            ],
            [
                'name' => 'Love of Nagas',
                'key' => 'TL-LOON',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-HODR',
                    'CE-FADR'
                ]
            ],
            [
                'name' => 'Emperor and Queen',
                'key' => 'TL-EMAQ',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-CHEC',
                    'AR-BLWQ'
                ]
            ],
            [
                'name' => 'Summer Sunshine',
                'key' => 'TL-SUSU',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'CE-SUFL',
                    'CE-CACT'
                ]
            ],
            [
                'name' => 'Old Affection',
                'key' => 'TL-OLAF',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AR-COMM',
                    'AB-ZEQU'
                ]
            ],
            [
                'name' => 'Oriental Romance I',
                'key' => 'TL-ORR1',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-NOBU',
                    'AR-GUMI'
                ]
            ],
            [
                'name' => 'Oriental Romance II',
                'key' => 'TL-ORR2',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'RS-MASA',
                    null
                ]
            ],
            [
                'name' => 'Childhood Friend',
                'key' => 'TL-CF',
                'description' => null,
                'image' => null,
                'gumballs' => [
                    'AB-ADVE',
                    'AB-LIMA'
                ]
            ],

        ];

        $group = Group::where('key', '=', 'TL')
            ->first();

        foreach ($fates as $fate) {
            $gumballs = $fate['gumballs'];
            unset($fate['gumballs']);

            Fate::updateOrCreate(
                $fate,
                array_merge(
                    $fate,
                    [
                        'group_id' => $group->id,
                    ]
                )
            );

            FateGumballsTableSeeder::runExternally($fate['key'], $gumballs);
        }
    }
}