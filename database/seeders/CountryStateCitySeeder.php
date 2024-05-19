<?php

namespace Database\Seeders;

use App\Models\{City, Country, State};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CountryStateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::truncate();
        State::truncate();
        Country::truncate();
        $data = [
            [
                'code' => 'PK',
                'name' => 'Pakistan',
                'phone_code' => 92,
                'states' => [
                    [
                        'name' => 'Azad kashmir',
                        'cities' => [
                            [
                                'name' => 'Bhimber'
                            ],
                            [
                                'name' => 'Kotli'
                            ],
                            [
                                'name' => 'Mirpur'
                            ],
                            [
                                'name' => 'Muzaffarabad'
                            ],
                            [
                                'name' => 'Hattian'
                            ],
                            [
                                'name' => 'Neelum'
                            ],
                            [
                                'name' => 'Poonch'
                            ],
                            [
                                'name' => 'Haveli'
                            ],
                            [
                                'name' => 'Bagh'
                            ],
                            [
                                'name' => 'Sudhnati'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Balochistan',
                        'cities' => [
                            [
                                'name' => 'Khuzdar'
                            ],
                            [
                                'name' => 'Turbat'
                            ],
                            [
                                'name' => 'Chaman'
                            ],
                            [
                                'name' => 'Hub'
                            ],
                            [
                                'name' => 'Sibi'
                            ],
                            [
                                'name' => 'Zhob'
                            ],
                            [
                                'name' => 'Gwadar'
                            ],
                            [
                                'name' => 'Dera Murad Jamali'
                            ],
                            [
                                'name' => 'Dera Allah Yar'
                            ],
                            [
                                'name' => 'Usta Mohammad'
                            ],
                            [
                                'name' => 'Loralai'
                            ],
                            [
                                'name' => 'Kharan'
                            ],
                            [
                                'name' => 'Mastung'
                            ],
                            [
                                'name' => 'Nushki'
                            ],
                            [
                                'name' => 'Kalat'
                            ],
                            [
                                'name' => 'Pasni'
                            ],
                            [
                                'name' => 'Quetta'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Gilgit Baltistan',
                        'cities' => [
                            [
                                'name' => 'Gilgit'
                            ],
                            [
                                'name' => 'Skardu'
                            ],
                            [
                                'name' => 'Khaplu'
                            ],
                            [
                                'name' => 'Dambudas'
                            ],
                            [
                                'name' => 'Tolti'
                            ],
                            [
                                'name' => 'Eidghah'
                            ],
                            [
                                'name' => 'Shigar'
                            ],
                            [
                                'name' => 'Nagarkhas'
                            ],
                            [
                                'name' => 'Ishkoman'
                            ],
                            [
                                'name' => 'Juglot'
                            ],
                            [
                                'name' => 'Danyor'
                            ],
                            [
                                'name' => 'Karimabad'
                            ],
                            [
                                'name' => 'Aliabad'
                            ],
                            [
                                'name' => 'Chilas'
                            ],
                            [
                                'name' => 'Gahkuch'
                            ],
                            [
                                'name' => 'Tangir'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Khyber Pakhtunkhwa',
                        'cities' => [
                            [
                                'name' => 'Abbottabad'
                            ],
                            [
                                'name' => 'Adezai'
                            ],
                            [
                                'name' => 'Alpuri'
                            ],
                            [
                                'name' => 'Ayubia'
                            ],
                            [
                                'name' => 'Banda Daud Shah'
                            ],
                            [
                                'name' => 'Bannu'
                            ],
                            [
                                'name' => 'Batkhela'
                            ],
                            [
                                'name' => 'Battagram'
                            ],
                            [
                                'name' => 'Birote'
                            ],
                            [
                                'name' => 'Chakdara'
                            ],
                            [
                                'name' => 'Charsadda'
                            ],
                            [
                                'name' => 'Chitral'
                            ],
                            [
                                'name' => 'Daggar'
                            ],
                            [
                                'name' => 'Dargai'
                            ],
                            [
                                'name' => 'Darya Khan'
                            ],
                            [
                                'name' => 'Dera Ismail Khan'
                            ],
                            [
                                'name' => 'Dir'
                            ],
                            [
                                'name' => 'Drosh'
                            ],
                            [
                                'name' => 'Hangu'
                            ],
                            [
                                'name' => 'Haripur'
                            ],
                            [
                                'name' => 'Karak'
                            ],
                            [
                                'name' => 'Kohat'
                            ],
                            [
                                'name' => 'Lakki Marwat'
                            ],
                            [
                                'name' => 'Latamber'
                            ],
                            [
                                'name' => 'Madyan'
                            ],
                            [
                                'name' => 'Mansehra'
                            ],
                            [
                                'name' => 'Mardan'
                            ],
                            [
                                'name' => 'Mastuj'
                            ],
                            [
                                'name' => 'Nowshera'
                            ],
                            [
                                'name' => 'Paharpur'
                            ],
                            [
                                'name' => 'Saidu Sharif'
                            ],
                            [
                                'name' => 'Swabi'
                            ],
                            [
                                'name' => 'Swat'
                            ],
                            [
                                'name' => 'Tangi'
                            ],
                            [
                                'name' => 'Tank'
                            ],
                            [
                                'name' => 'Thall'
                            ],
                            [
                                'name' => 'Timergara'
                            ],
                            [
                                'name' => 'Tordher'
                            ],
                            [
                                'name' => 'Bajaur Agency'
                            ],
                            [
                                'name' => 'Mohmand Agency'
                            ],
                            [
                                'name' => 'Khyber Agency'
                            ],
                            [
                                'name' => 'Frontier Region Peshawar'
                            ],
                            [
                                'name' => 'Frontier Region Kohat'
                            ],
                            [
                                'name' => 'Orakzai Agency'
                            ],
                            [
                                'name' => 'Kurram Agency'
                            ],
                            [
                                'name' => 'Frontier Region Bannu'
                            ],
                            [
                                'name' => 'North Waziristan Agency'
                            ],
                            [
                                'name' => 'Frontier Region Lakki Marwat'
                            ],
                            [
                                'name' => 'Frontier Region Tank'
                            ],
                            [
                                'name' => 'South Waziristan Agency'
                            ],
                            [
                                'name' => 'Frontier Region Dera Ismail Khan'
                            ],
                            [
                                'name' => 'Mingora'
                            ],
                            [
                                'name' => 'Peshawar'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Punjab',
                        'cities' => [
                            [
                                'name' => 'Ahmed Nager Chatha'
                            ],
                            [
                                'name' => 'Alipur'
                            ],
                            [
                                'name' => 'Arifwala'
                            ],
                            [
                                'name' => 'Attock'
                            ],
                            [
                                'name' => 'Bhalwal'
                            ],
                            [
                                'name' => 'Bahawalpur'
                            ],
                            [
                                'name' => 'Bhakkar'
                            ],
                            [
                                'name' => 'Burewala'
                            ],
                            [
                                'name' => 'Chillianwala'
                            ],
                            [
                                'name' => 'Chakwal'
                            ],
                            [
                                'name' => 'Chiniot'
                            ],
                            [
                                'name' => 'Chishtian'
                            ],
                            [
                                'name' => 'Daska'
                            ],
                            [
                                'name' => 'Darya Khan'
                            ],
                            [
                                'name' => 'Dera Ghazi Khan'
                            ],
                            [
                                'name' => 'Dhaular'
                            ],
                            [
                                'name' => 'Dina'
                            ],
                            [
                                'name' => 'Dinga'
                            ],
                            [
                                'name' => 'Faisalabad'
                            ],
                            [
                                'name' => 'Fateh Jang'
                            ],
                            [
                                'name' => 'Ghakhar Mandi'
                            ],
                            [
                                'name' => 'Gojra'
                            ],
                            [
                                'name' => 'Gujranwala'
                            ],
                            [
                                'name' => 'Gujrat'
                            ],
                            [
                                'name' => 'Hafizabad'
                            ],
                            [
                                'name' => 'Haroonabad'
                            ],
                            [
                                'name' => 'Hasilpur'
                            ],
                            [
                                'name' => 'Haveli Lakha'
                            ],
                            [
                                'name' => 'Jampur'
                            ],
                            [
                                'name' => 'Jaranwala'
                            ],
                            [
                                'name' => 'Jhang'
                            ],
                            [
                                'name' => 'Jhelum'
                            ],
                            [
                                'name' => 'Karor Lal Esan'
                            ],
                            [
                                'name' => 'Kasur'
                            ],
                            [
                                'name' => 'Kāmoke'
                            ],
                            [
                                'name' => 'Khanewal'
                            ],
                            [
                                'name' => 'Khanpur'
                            ],
                            [
                                'name' => 'Kharian'
                            ],
                            [
                                'name' => 'Khushab'
                            ],
                            [
                                'name' => 'Kot Adu'
                            ],
                            [
                                'name' => 'Lahore',
                                'zip_code' => 54000,
                            ],
                            [
                                'name' => 'Lalamusa'
                            ],
                            [
                                'name' => 'Layyah'
                            ],
                            [
                                'name' => 'Liaquat Pur'
                            ],
                            [
                                'name' => 'Lodhran'
                            ],
                            [
                                'name' => 'Mamoori'
                            ],
                            [
                                'name' => 'Mailsi'
                            ],
                            [
                                'name' => 'Mandi Bahauddin'
                            ],
                            [
                                'name' => 'Mianwali'
                            ],
                            [
                                'name' => 'Multan'
                            ],
                            [
                                'name' => 'Muridke'
                            ],
                            [
                                'name' => 'Mianwali Bangla'
                            ],
                            [
                                'name' => 'Muzaffargarh'
                            ],
                            [
                                'name' => 'Narowal'
                            ],
                            [
                                'name' => 'Okara'
                            ],
                            [
                                'name' => 'Pakpattan'
                            ],
                            [
                                'name' => 'Qila Didar Singh'
                            ],
                            [
                                'name' => 'Rabwah'
                            ],
                            [
                                'name' => 'Rajanpur'
                            ],
                            [
                                'name' => 'Rahim Yar Khan'
                            ],
                            [
                                'name' => 'Rawalpindi'
                            ],
                            [
                                'name' => 'Sadiqabad'
                            ],
                            [
                                'name' => 'Safdarabad'
                            ],
                            [
                                'name' => 'Sargodha'
                            ],
                            [
                                'name' => 'Shakargarh'
                            ],
                            [
                                'name' => 'Sheikhupura'
                            ],
                            [
                                'name' => 'Sialkot'
                            ],
                            [
                                'name' => 'Sohawa'
                            ],
                            [
                                'name' => 'Soianwala'
                            ],
                            [
                                'name' => 'Siranwali'
                            ],
                            [
                                'name' => 'Taxila'
                            ],
                            [
                                'name' => 'Toba Tek Singh'
                            ],
                            [
                                'name' => 'Vehari'
                            ],
                            [
                                'name' => 'Wah Cantonment'
                            ],
                            [
                                'name' => 'Wazirabad'
                            ],
                            [
                                'name' => 'Kalabagh'
                            ],
                            [
                                'name' => 'Murree'
                            ],
                            [
                                'name' => 'Raiwind'
                            ],
                            [
                                'name' => 'Pir Mahal'
                            ],
                            [
                                'name' => 'Renala Khurd'
                            ],
                            [
                                'name' => 'Sahiwal'
                            ],
                            [
                                'name' => 'Sarai Alamgir'
                            ],
                            [
                                'name' => 'Talagang'
                            ],
                            [
                                'name' => 'Jauharabad'
                            ],
                            [
                                'name' => 'Sangla Hill'
                            ],
                            [
                                'name' => 'Gujar Khan'
                            ],
                            [
                                'name' => 'Pattoki'
                            ],
                            [
                                'name' => 'Dipalpur'
                            ],
                            [
                                'name' => 'Mian Channu'
                            ],
                            [
                                'name' => 'Chichawatni'
                            ],
                            [
                                'name' => 'Jalalpur Jattan'
                            ],
                            [
                                'name' => 'Kamalia'
                            ],
                            [
                                'name' => 'Ahmadpur East'
                            ],
                            [
                                'name' => 'Bahawalnagar'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Sindh',
                        'cities' => [
                            [
                                'name' => 'Badin'
                            ],
                            [
                                'name' => 'Bhirkan'
                            ],
                            [
                                'name' => 'Chak'
                            ],
                            [
                                'name' => 'Dadu'
                            ],
                            [
                                'name' => 'Dokri'
                            ],
                            [
                                'name' => 'Ghotki'
                            ],
                            [
                                'name' => 'Haala'
                            ],
                            [
                                'name' => 'Hyderabad'
                            ],
                            [
                                'name' => 'Jacobabad'
                            ],
                            [
                                'name' => 'Jamshoro'
                            ],
                            [
                                'name' => 'Jungshahi'
                            ],
                            [
                                'name' => 'Kandhkot'
                            ],
                            [
                                'name' => 'Khairpur'
                            ],
                            [
                                'name' => 'Kotri'
                            ],
                            [
                                'name' => 'Larkana'
                            ],
                            [
                                'name' => 'Matiari'
                            ],
                            [
                                'name' => 'Mehar'
                            ],
                            [
                                'name' => 'Mirpur Khas'
                            ],
                            [
                                'name' => 'Mithani'
                            ],
                            [
                                'name' => 'Mithi'
                            ],
                            [
                                'name' => 'Mehrabpur'
                            ],
                            [
                                'name' => 'Nagarparkar'
                            ],
                            [
                                'name' => 'Naushahro Feroze'
                            ],
                            [
                                'name' => 'Naushara'
                            ],
                            [
                                'name' => 'Nawabshah'
                            ],
                            [
                                'name' => 'Nazimabad'
                            ],
                            [
                                'name' => 'Ranipur'
                            ],
                            [
                                'name' => 'Sanghar'
                            ],
                            [
                                'name' => 'Shahbandar'
                            ],
                            [
                                'name' => 'Shahdadkot'
                            ],
                            [
                                'name' => 'Shikarpaur'
                            ],
                            [
                                'name' => 'Sukkur'
                            ],
                            [
                                'name' => 'Tando Adam Khan'
                            ],
                            [
                                'name' => 'Tando Allahyar'
                            ],
                            [
                                'name' => 'Tando Muhammad Khan'
                            ],
                            [
                                'name' => 'Thatta'
                            ],
                            [
                                'name' => 'Qasimabad'
                            ],
                            [
                                'name' => 'Umerkot'
                            ],
                            [
                                'name' => 'Warah'
                            ],
                            [
                                'name' => 'Keti Bandar'
                            ],
                            [
                                'name' => 'Rajo Khanani'
                            ],
                            [
                                'name' => 'Diplo'
                            ],
                            [
                                'name' => 'Islamkot'
                            ],
                            [
                                'name' => 'Shahpur Chakar'
                            ],
                            [
                                'name' => 'Kandiaro'
                            ],
                            [
                                'name' => 'Sakrand'
                            ],
                            [
                                'name' => 'Digri'
                            ],
                            [
                                'name' => 'Naudero'
                            ],
                            [
                                'name' => 'Kashmore'
                            ],
                            [
                                'name' => 'Ratodero'
                            ],
                            [
                                'name' => 'Rohri'
                            ],
                            [
                                'name' => 'Shahdadpur'
                            ],
                            [
                                'name' => 'Moro'
                            ],
                            [
                                'name' => 'Karachi'
                            ]
                        ]
                    ],
                ],
            ],
        ];

        $this->traverseAndSave($data);
    }

    private function traverseAndSave($data)
    {
        foreach ($data as $country) {

            $newcountry = new Country([
                'name' => $country['name'],
                'slug' => Str::slug($country['name']),
                'code' => $country['code'],
                'phone_code' => $country['phone_code'],
            ]);

            $newcountry->save();

            foreach ($country['states'] as $state) {
                $newstate = $newcountry->states()->save(new State(['name' => $state['name'], 'slug' => Str::slug($state['name'])]));
                $newstate->cities()->createMany($state['cities']);
            }
        }
    }
}
