<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryStateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::truncate();
        $data = [
            [
                'code' => 'PK',
                'name' => 'Pakistan',
                'slug' => 'pakistan',
                'phone_code' => 92,
                'states' => [
                    [
                        'name' => 'Azad kashmir',
                        'slug' => 'azad-kashmir',
                        'cities' => [
                            [
                                'name' => 'Bhimber',
                                'slug' => 'bhimber'
                            ],
                            [
                                'name' => 'Kotli',
                                'slug' => 'kotli'
                            ],
                            [
                                'name' => 'Mirpur',
                                'slug' => 'mirpur'
                            ],
                            [
                                'name' => 'Muzaffarabad',
                                'slug' => 'muzaffarabad'
                            ],
                            [
                                'name' => 'Hattian',
                                'slug' => 'hattian'
                            ],
                            [
                                'name' => 'Neelum',
                                'slug' => 'neelum'
                            ],
                            [
                                'name' => 'Poonch',
                                'slug' => 'poonch'
                            ],
                            [
                                'name' => 'Haveli',
                                'slug' => 'haveli'
                            ],
                            [
                                'name' => 'Bagh',
                                'slug' => 'bagh'
                            ],
                            [
                                'name' => 'Sudhnati',
                                'slug' => 'sudhnati'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Balochistan',
                        'slug' => 'balochistan',
                        'cities' => [
                            [
                                'name' => 'Khuzdar',
                                'slug' => 'khuzdar'
                            ],
                            [
                                'name' => 'Turbat',
                                'slug' => 'turbat'
                            ],
                            [
                                'name' => 'Chaman',
                                'slug' => 'chaman'
                            ],
                            [
                                'name' => 'Hub',
                                'slug' => 'hub'
                            ],
                            [
                                'name' => 'Sibi',
                                'slug' => 'sibi'
                            ],
                            [
                                'name' => 'Zhob',
                                'slug' => 'zhob'
                            ],
                            [
                                'name' => 'Gwadar',
                                'slug' => 'gwadar'
                            ],
                            [
                                'name' => 'Dera Murad Jamali',
                                'slug' => 'dera-murad-jamali'
                            ],
                            [
                                'name' => 'Dera Allah Yar',
                                'slug' => 'dera-allah-yar'
                            ],
                            [
                                'name' => 'Usta Mohammad',
                                'slug' => 'usta-mohammad'
                            ],
                            [
                                'name' => 'Loralai',
                                'slug' => 'loralai'
                            ],
                            [
                                'name' => 'Kharan',
                                'slug' => 'kharan'
                            ],
                            [
                                'name' => 'Mastung',
                                'slug' => 'mastung'
                            ],
                            [
                                'name' => 'Nushki',
                                'slug' => 'nushki'
                            ],
                            [
                                'name' => 'Kalat',
                                'slug' => 'kalat'
                            ],
                            [
                                'name' => 'Pasni',
                                'slug' => 'pasni'
                            ],
                            [
                                'name' => 'Quetta',
                                'slug' => 'quetta'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Gilgit Baltistan',
                        'slug' => 'gilgit-baltistan',
                        'cities' => [
                            [
                                'name' => 'Gilgit',
                                'slug' => 'gilgit'
                            ],
                            [
                                'name' => 'Skardu',
                                'slug' => 'skardu'
                            ],
                            [
                                'name' => 'Khaplu',
                                'slug' => 'khaplu'
                            ],
                            [
                                'name' => 'Dambudas',
                                'slug' => 'dambudas'
                            ],
                            [
                                'name' => 'Tolti',
                                'slug' => 'tolti'
                            ],
                            [
                                'name' => 'Eidghah',
                                'slug' => 'eidghah'
                            ],
                            [
                                'name' => 'Shigar',
                                'slug' => 'shigar'
                            ],
                            [
                                'name' => 'Nagarkhas',
                                'slug' => 'nagarkhas'
                            ],
                            [
                                'name' => 'Ishkoman',
                                'slug' => 'Ishkoman'
                            ],
                            [
                                'name' => 'Juglot',
                                'slug' => 'juglot'
                            ],
                            [
                                'name' => 'Danyor',
                                'slug' => 'danyor'
                            ],
                            [
                                'name' => 'Karimabad',
                                'slug' => 'karimabad'
                            ],
                            [
                                'name' => 'Aliabad',
                                'slug' => 'aliabad'
                            ],
                            [
                                'name' => 'Chilas',
                                'slug' => 'chilas'
                            ],
                            [
                                'name' => 'Gahkuch',
                                'slug' => 'gahkuch'
                            ],
                            [
                                'name' => 'Tangir',
                                'slug' => 'tangir'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Khyber Pakhtunkhwa',
                        'slug' => 'khyber-pakhtunkhwa',
                        'cities' => [
                            [
                                'name' => 'Abbottabad',
                                'slug' => 'abbottabad'
                            ],
                            [
                                'name' => 'Adezai',
                                'slug' => 'adezai'
                            ],
                            [
                                'name' => 'Alpuri',
                                'slug' => 'alpuri'
                            ],
                            [
                                'name' => 'Ayubia',
                                'slug' => 'ayubia'
                            ],
                            [
                                'name' => 'Banda Daud Shah',
                                'slug' => 'banda-daud-shah'
                            ],
                            [
                                'name' => 'Bannu',
                                'slug' => 'bannu'
                            ],
                            [
                                'name' => 'Batkhela',
                                'slug' => 'batkhela'
                            ],
                            [
                                'name' => 'Battagram',
                                'slug' => 'battagram'
                            ],
                            [
                                'name' => 'Birote',
                                'slug' => 'birote'
                            ],
                            [
                                'name' => 'Chakdara',
                                'slug' => 'chakdara'
                            ],
                            [
                                'name' => 'Charsadda',
                                'slug' => 'charsadda'
                            ],
                            [
                                'name' => 'Chitral',
                                'slug' => 'chitral'
                            ],
                            [
                                'name' => 'Daggar',
                                'slug' => 'daggar'
                            ],
                            [
                                'name' => 'Dargai',
                                'slug' => 'dargai'
                            ],
                            [
                                'name' => 'Darya Khan',
                                'slug' => 'darya-khan'
                            ],
                            [
                                'name' => 'Dera Ismail Khan',
                                'slug' => 'dera-ismail-khan'
                            ],
                            [
                                'name' => 'Dir',
                                'slug' => 'dir'
                            ],
                            [
                                'name' => 'Drosh',
                                'slug' => 'drosh'
                            ],
                            [
                                'name' => 'Hangu',
                                'slug' => 'hangu'
                            ],
                            [
                                'name' => 'Haripur',
                                'slug' => 'haripur'
                            ],
                            [
                                'name' => 'Karak',
                                'slug' => 'karak'
                            ],
                            [
                                'name' => 'Kohat',
                                'slug' => 'kohat'
                            ],
                            [
                                'name' => 'Lakki Marwat',
                                'slug' => 'lakki-marwat'
                            ],
                            [
                                'name' => 'Latamber',
                                'slug' => 'latamber'
                            ],
                            [
                                'name' => 'Madyan',
                                'slug' => 'madyan'
                            ],
                            [
                                'name' => 'Mansehra',
                                'slug' => 'mansehra'
                            ],
                            [
                                'name' => 'Mardan',
                                'slug' => 'mardan'
                            ],
                            [
                                'name' => 'Mastuj',
                                'slug' => 'mastuj'
                            ],
                            [
                                'name' => 'Nowshera',
                                'slug' => 'nowshera'
                            ],
                            [
                                'name' => 'Paharpur',
                                'slug' => 'paharpur'
                            ],
                            [
                                'name' => 'Saidu Sharif',
                                'slug' => 'saidu-sharif'
                            ],
                            [
                                'name' => 'Swabi',
                                'slug' => 'swabi'
                            ],
                            [
                                'name' => 'Swat',
                                'slug' => 'swat'
                            ],
                            [
                                'name' => 'Tangi',
                                'slug' => 'tangi'
                            ],
                            [
                                'name' => 'Tank',
                                'slug' => 'tank'
                            ],
                            [
                                'name' => 'Thall',
                                'slug' => 'thall'
                            ],
                            [
                                'name' => 'Timergara',
                                'slug' => 'timergara'
                            ],
                            [
                                'name' => 'Tordher',
                                'slug' => 'tordher'
                            ],
                            [
                                'name' => 'Bajaur Agency',
                                'slug' => 'bajaur-agency'
                            ],
                            [
                                'name' => 'Mohmand Agency',
                                'slug' => 'mohmand-agency'
                            ],
                            [
                                'name' => 'Khyber Agency',
                                'slug' => 'khyber-agency'
                            ],
                            [
                                'name' => 'Frontier Region Peshawar',
                                'slug' => 'frontier-region-peshawar'
                            ],
                            [
                                'name' => 'Frontier Region Kohat',
                                'slug' => 'frontier-region-kohat'
                            ],
                            [
                                'name' => 'Orakzai Agency',
                                'slug' => 'orakzai-agency'
                            ],
                            [
                                'name' => 'Kurram Agency',
                                'slug' => 'kurram-agency'
                            ],
                            [
                                'name' => 'Frontier Region Bannu',
                                'slug' => 'frontier-region-bannu'
                            ],
                            [
                                'name' => 'North Waziristan Agency',
                                'slug' => 'north-waziristan-agency'
                            ],
                            [
                                'name' => 'Frontier Region Lakki Marwat',
                                'slug' => 'frontier-region-lakki-marwat'
                            ],
                            [
                                'name' => 'Frontier Region Tank',
                                'slug' => 'frontier-region-tank'
                            ],
                            [
                                'name' => 'South Waziristan Agency',
                                'slug' => 'south-waziristan-agency'
                            ],
                            [
                                'name' => 'Frontier Region Dera Ismail Khan',
                                'slug' => 'frontier-region-dera-ismail-khan'
                            ],
                            [
                                'name' => 'Mingora',
                                'slug' => 'mingora'
                            ],
                            [
                                'name' => 'Peshawar',
                                'slug' => 'peshawar'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Punjab',
                        'slug' => 'punjab',
                        'cities' => [
                            [
                                'name' => 'Ahmed Nager Chatha',
                                'slug' => 'ahmed-nager-chatha'
                            ],
                            [
                                'name' => 'Alipur',
                                'slug' => 'alipur'
                            ],
                            [
                                'name' => 'Arifwala',
                                'slug' => 'arifwala'
                            ],
                            [
                                'name' => 'Attock',
                                'slug' => 'attock'
                            ],
                            [
                                'name' => 'Bhalwal',
                                'slug' => 'bhalwal'
                            ],
                            [
                                'name' => 'Bahawalpur',
                                'slug' => 'bahawalpur'
                            ],
                            [
                                'name' => 'Bhakkar',
                                'slug' => 'bhakkar'
                            ],
                            [
                                'name' => 'Burewala',
                                'slug' => 'burewala'
                            ],
                            [
                                'name' => 'Chillianwala',
                                'slug' => 'chillianwala'
                            ],
                            [
                                'name' => 'Chakwal',
                                'slug' => 'chakwal'
                            ],
                            [
                                'name' => 'Chiniot',
                                'slug' => 'chiniot'
                            ],
                            [
                                'name' => 'Chishtian',
                                'slug' => 'chishtian'
                            ],
                            [
                                'name' => 'Daska',
                                'slug' => 'daska'
                            ],
                            [
                                'name' => 'Darya Khan',
                                'slug' => 'darya-khan'
                            ],
                            [
                                'name' => 'Dera Ghazi Khan',
                                'slug' => 'dera-ghazi-khan'
                            ],
                            [
                                'name' => 'Dhaular',
                                'slug' => 'dhaular'
                            ],
                            [
                                'name' => 'Dina',
                                'slug' => 'dina'
                            ],
                            [
                                'name' => 'Dinga',
                                'slug' => 'dinga'
                            ],
                            [
                                'name' => 'Faisalabad',
                                'slug' => 'faisalabad'
                            ],
                            [
                                'name' => 'Fateh Jang',
                                'slug' => 'fateh-jang'
                            ],
                            [
                                'name' => 'Ghakhar Mandi',
                                'slug' => 'ghakhar-mandi'
                            ],
                            [
                                'name' => 'Gojra',
                                'slug' => 'gojra'
                            ],
                            [
                                'name' => 'Gujranwala',
                                'slug' => 'gujranwala'
                            ],
                            [
                                'name' => 'Gujrat',
                                'slug' => 'gujrat'
                            ],
                            [
                                'name' => 'Hafizabad',
                                'slug' => 'hafizabad'
                            ],
                            [
                                'name' => 'Haroonabad',
                                'slug' => 'haroonabad'
                            ],
                            [
                                'name' => 'Hasilpur',
                                'slug' => 'hasilpur'
                            ],
                            [
                                'name' => 'Haveli Lakha',
                                'slug' => 'haveli-lakha'
                            ],
                            [
                                'name' => 'Jampur',
                                'slug' => 'jampur'
                            ],
                            [
                                'name' => 'Jaranwala',
                                'slug' => 'jaranwala'
                            ],
                            [
                                'name' => 'Jhang',
                                'slug' => 'jhang'
                            ],
                            [
                                'name' => 'Jhelum',
                                'slug' => 'jhelum'
                            ],
                            [
                                'name' => 'Karor Lal Esan',
                                'slug' => 'karor-lal-esan'
                            ],
                            [
                                'name' => 'Kasur',
                                'slug' => 'kasur'
                            ],
                            [
                                'name' => 'Kāmoke',
                                'slug' => 'kamoke'
                            ],
                            [
                                'name' => 'Khanewal',
                                'slug' => 'khanewal'
                            ],
                            [
                                'name' => 'Khanpur',
                                'slug' => 'khanpur'
                            ],
                            [
                                'name' => 'Kharian',
                                'slug' => 'kharian'
                            ],
                            [
                                'name' => 'Khushab',
                                'slug' => 'khushab'
                            ],
                            [
                                'name' => 'Kot Adu',
                                'slug' => 'kot-adu'
                            ],
                            [
                                'name' => 'Lahore',
                                'slug' => 'lahore',
                                'zip_code' => 54000,
                            ],
                            [
                                'name' => 'Lalamusa',
                                'slug' => 'lalamusa'
                            ],
                            [
                                'name' => 'Layyah',
                                'slug' => 'layyah'
                            ],
                            [
                                'name' => 'Liaquat Pur',
                                'slug' => 'liaquat-pur'
                            ],
                            [
                                'name' => 'Lodhran',
                                'slug' => 'lodhran'
                            ],
                            [
                                'name' => 'Mamoori',
                                'slug' => 'mamoori'
                            ],
                            [
                                'name' => 'Mailsi',
                                'slug' => 'mailsi'
                            ],
                            [
                                'name' => 'Mandi Bahauddin',
                                'slug' => 'mandi-bahauddin'
                            ],
                            [
                                'name' => 'Mianwali',
                                'slug' => 'mianwali'
                            ],
                            [
                                'name' => 'Multan',
                                'slug' => 'multan'
                            ],
                            [
                                'name' => 'Muridke',
                                'slug' => 'muridke'
                            ],
                            [
                                'name' => 'Mianwali Bangla',
                                'slug' => 'mianwali-bangla'
                            ],
                            [
                                'name' => 'Muzaffargarh',
                                'slug' => 'muzaffargarh'
                            ],
                            [
                                'name' => 'Narowal',
                                'slug' => 'narowal'
                            ],
                            [
                                'name' => 'Okara',
                                'slug' => 'okara'
                            ],
                            [
                                'name' => 'Pakpattan',
                                'slug' => 'pakpattan'
                            ],
                            [
                                'name' => 'Qila Didar Singh',
                                'slug' => 'qila-didar-singh'
                            ],
                            [
                                'name' => 'Rabwah',
                                'slug' => 'rabwah'
                            ],
                            [
                                'name' => 'Rajanpur',
                                'slug' => 'rajanpur'
                            ],
                            [
                                'name' => 'Rahim Yar Khan',
                                'slug' => 'rahim-yar-khan'
                            ],
                            [
                                'name' => 'Rawalpindi',
                                'slug' => 'rawalpindi'
                            ],
                            [
                                'name' => 'Sadiqabad',
                                'slug' => 'sadiqabad'
                            ],
                            [
                                'name' => 'Safdarabad',
                                'slug' => 'safdarabad'
                            ],
                            [
                                'name' => 'Sargodha',
                                'slug' => 'sargodha'
                            ],
                            [
                                'name' => 'Shakargarh',
                                'slug' => 'shakargarh'
                            ],
                            [
                                'name' => 'Sheikhupura',
                                'slug' => 'sheikhupura'
                            ],
                            [
                                'name' => 'Sialkot',
                                'slug' => 'sialkot'
                            ],
                            [
                                'name' => 'Sohawa',
                                'slug' => 'sohawa'
                            ],
                            [
                                'name' => 'Soianwala',
                                'slug' => 'soianwala'
                            ],
                            [
                                'name' => 'Siranwali',
                                'slug' => 'siranwali'
                            ],
                            [
                                'name' => 'Taxila',
                                'slug' => 'taxila'
                            ],
                            [
                                'name' => 'Toba Tek Singh',
                                'slug' => 'toba-tek-singh'
                            ],
                            [
                                'name' => 'Vehari',
                                'slug' => 'vehari'
                            ],
                            [
                                'name' => 'Wah Cantonment',
                                'slug' => 'wah-cantonment'
                            ],
                            [
                                'name' => 'Wazirabad',
                                'slug' => 'wazirabad'
                            ],
                            [
                                'name' => 'Kalabagh',
                                'slug' => 'kalabagh'
                            ],
                            [
                                'name' => 'Murree',
                                'slug' => 'murree'
                            ],
                            [
                                'name' => 'Raiwind',
                                'slug' => 'raiwind'
                            ],
                            [
                                'name' => 'Pir Mahal',
                                'slug' => 'pir-mahal'
                            ],
                            [
                                'name' => 'Renala Khurd',
                                'slug' => 'renala-khurd'
                            ],
                            [
                                'name' => 'Sahiwal',
                                'slug' => 'sahiwal'
                            ],
                            [
                                'name' => 'Sarai Alamgir',
                                'slug' => 'sarai-alamgir'
                            ],
                            [
                                'name' => 'Talagang',
                                'slug' => 'talagang'
                            ],
                            [
                                'name' => 'Jauharabad',
                                'slug' => 'jauharabad'
                            ],
                            [
                                'name' => 'Sangla Hill',
                                'slug' => 'sangla-hill'
                            ],
                            [
                                'name' => 'Gujar Khan',
                                'slug' => 'gujar-khan'
                            ],
                            [
                                'name' => 'Pattoki',
                                'slug' => 'pattoki'
                            ],
                            [
                                'name' => 'Dipalpur',
                                'slug' => 'dipalpur'
                            ],
                            [
                                'name' => 'Mian Channu',
                                'slug' => 'mian-channu'
                            ],
                            [
                                'name' => 'Chichawatni',
                                'slug' => 'chichawatni'
                            ],
                            [
                                'name' => 'Jalalpur Jattan',
                                'slug' => 'jalalpur-jattan'
                            ],
                            [
                                'name' => 'Kamalia',
                                'slug' => 'kamalia'
                            ],
                            [
                                'name' => 'Ahmadpur East',
                                'slug' => 'ahmadpur-east'
                            ],
                            [
                                'name' => 'Bahawalnagar',
                                'slug' => 'bahawalnagar'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Sindh',
                        'slug' => 'sindh',
                        'cities' => [
                            [
                                'name' => 'Badin',
                                'slug' => 'badin'
                            ],
                            [
                                'name' => 'Bhirkan',
                                'slug' => 'bhirkan'
                            ],
                            [
                                'name' => 'Chak',
                                'slug' => 'chak'
                            ],
                            [
                                'name' => 'Dadu',
                                'slug' => 'dadu'
                            ],
                            [
                                'name' => 'Dokri',
                                'slug' => 'dokri'
                            ],
                            [
                                'name' => 'Ghotki',
                                'slug' => 'ghotki'
                            ],
                            [
                                'name' => 'Haala',
                                'slug' => 'haala'
                            ],
                            [
                                'name' => 'Hyderabad',
                                'slug' => 'hyderabad'
                            ],
                            [
                                'name' => 'Jacobabad',
                                'slug' => 'jacobabad'
                            ],
                            [
                                'name' => 'Jamshoro',
                                'slug' => 'jamshoro'
                            ],
                            [
                                'name' => 'Jungshahi',
                                'slug' => 'jungshahi'
                            ],
                            [
                                'name' => 'Kandhkot',
                                'slug' => 'kandhkot'
                            ],
                            [
                                'name' => 'Khairpur',
                                'slug' => 'khairpur'
                            ],
                            [
                                'name' => 'Kotri',
                                'slug' => 'kotri'
                            ],
                            [
                                'name' => 'Larkana',
                                'slug' => 'larkana'
                            ],
                            [
                                'name' => 'Matiari',
                                'slug' => 'matiari'
                            ],
                            [
                                'name' => 'Mehar',
                                'slug' => 'mehar'
                            ],
                            [
                                'name' => 'Mirpur Khas',
                                'slug' => 'mirpur-khas'
                            ],
                            [
                                'name' => 'Mithani',
                                'slug' => 'mithani'
                            ],
                            [
                                'name' => 'Mithi',
                                'slug' => 'mithi'
                            ],
                            [
                                'name' => 'Mehrabpur',
                                'slug' => 'mehrabpur'
                            ],
                            [
                                'name' => 'Nagarparkar',
                                'slug' => 'nagarparkar'
                            ],
                            [
                                'name' => 'Naushahro Feroze',
                                'slug' => 'naushahro-feroze'
                            ],
                            [
                                'name' => 'Naushara',
                                'slug' => 'naushara'
                            ],
                            [
                                'name' => 'Nawabshah',
                                'slug' => 'nawabshah'
                            ],
                            [
                                'name' => 'Nazimabad',
                                'slug' => 'nazimabad'
                            ],
                            [
                                'name' => 'Ranipur',
                                'slug' => 'ranipur'
                            ],
                            [
                                'name' => 'Sanghar',
                                'slug' => 'sanghar'
                            ],
                            [
                                'name' => 'Shahbandar',
                                'slug' => 'shahbandar'
                            ],
                            [
                                'name' => 'Shahdadkot',
                                'slug' => 'shahdadkot'
                            ],
                            [
                                'name' => 'Shikarpaur',
                                'slug' => 'shikarpaur'
                            ],
                            [
                                'name' => 'Sukkur',
                                'slug' => 'sukkur'
                            ],
                            [
                                'name' => 'Tando Adam Khan',
                                'slug' => 'tando-adam-khan'
                            ],
                            [
                                'name' => 'Tando Allahyar',
                                'slug' => 'tando-allahyar'
                            ],
                            [
                                'name' => 'Tando Muhammad Khan',
                                'slug' => 'tando-muhammad-khan'
                            ],
                            [
                                'name' => 'Thatta',
                                'slug' => 'thatta'
                            ],
                            [
                                'name' => 'Qasimabad',
                                'slug' => 'qasimabad'
                            ],
                            [
                                'name' => 'Umerkot',
                                'slug' => 'umerkot'
                            ],
                            [
                                'name' => 'Warah',
                                'slug' => 'warah'
                            ],
                            [
                                'name' => 'Keti Bandar',
                                'slug' => 'keti-bandar'
                            ],
                            [
                                'name' => 'Rajo Khanani',
                                'slug' => 'rajo-khanani'
                            ],
                            [
                                'name' => 'Diplo',
                                'slug' => 'diplo'
                            ],
                            [
                                'name' => 'Islamkot',
                                'slug' => 'islamkot'
                            ],
                            [
                                'name' => 'Shahpur Chakar',
                                'slug' => 'shahpur-chakar'
                            ],
                            [
                                'name' => 'Kandiaro',
                                'slug' => 'kandiaro'
                            ],
                            [
                                'name' => 'Sakrand',
                                'slug' => 'sakrand'
                            ],
                            [
                                'name' => 'Digri',
                                'slug' => 'digri'
                            ],
                            [
                                'name' => 'Naudero',
                                'slug' => 'naudero'
                            ],
                            [
                                'name' => 'Kashmore',
                                'slug' => 'kashmore'
                            ],
                            [
                                'name' => 'Ratodero',
                                'slug' => 'ratodero'
                            ],
                            [
                                'name' => 'Rohri',
                                'slug' => 'rohri'
                            ],
                            [
                                'name' => 'Shahdadpur',
                                'slug' => 'shahdadpur'
                            ],
                            [
                                'name' => 'Moro',
                                'slug' => 'moro'
                            ],
                            [
                                'name' => 'Karachi',
                                'slug' => 'karachi'
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
                'slug' => $country['slug'],
                'code' => $country['code'],
                'phone_code' => $country['phone_code'],
            ]);

            $newcountry->save();

            foreach ($country['states'] as $state) {
                $newstate = $newcountry->states()->save(new State(['name' => $state['name'], 'slug' => $state['slug']]));
                $newstate->cities()->createMany($state['cities']);
            }
        }
    }
}
