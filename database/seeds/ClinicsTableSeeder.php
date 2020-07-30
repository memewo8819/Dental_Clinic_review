<?php

use Illuminate\Database\Seeder;
use App\Models\Clinic;

class ClinicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clinics')->delete();

        $clinics = [
            [
                'id' => 1,
                'clinic_name' => 'しらき歯科医院',
                'tel' => '058-370-1001',
                'site_url' => '',
                'email' => '',
                'postal_code' => '509-0141',
                'pref' => '岐阜県',
                'city' => '各務原市',
                'town' => '鵜沼各務原町3丁目236',
                'lat' => '35.402764',
                'lng' => '136.901937',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 2,
                'clinic_name' => '歯のクリニックZERO',
                'tel' => '058-322-3610',
                'site_url' => 'http://hanoclinic.jp/',
                'email' => 'info@hanoclinic.jp',
                'postal_code' => '509-0141',
                'pref' => '岐阜県',
                'city' => '各務原市',
                'town' => '各務原町5丁目153-1',
                'lat' => '35.401540',
                'lng' => '136.910992',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 3,
                'clinic_name' => 'たけのこ歯科',
                'tel' => '0568-39-6522',
                'site_url' => 'http://www.takenokoshika.com/',
                'email' => 'info@takenokoshika.com',
                'postal_code' => '484-0081',
                'pref' => '愛知県',
                'city' => '犬山市',
                'town' => '東古券424-9',
                'lat' => '35.384528',
                'lng' => '136.943605',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($clinics as $clinic) {
            DB::table('clinics')->insert($clinic);
        }
    }
}
