<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //kategori 1
        DB::table('medicines')->insert([
            'generic_name' => 'morfin',
            'form' => 'tab 10 mg',
            'restriction_formula' => 'initial dosis 3-4 tab/hari',
            'price' => 20000,
            'description' => 'Hanya untuk pemakaian pada tindakan anestesi atau perawatan di Rumah Sakit.',
            'image' => '1.jpg',
            'faskes1' => 0,
            'faskes2' => 1,
            'faskes3' => 1,
            'category_id' => 1
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'oksikodon',
            'form' => 'kaps 5 mg',
            'restriction_formula' => '60 kaps/bulan',
            'price' => 15000,
            'description' => 'Untuk nyeri berat yang memerlukan terapi opioid jangka panjang, around-the-clock.',
            'image' => '2.jpg',
            'faskes1' => '0',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 1,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'fentanil',
            'form' => 'inj 0,05 mg/mL (i.m./i.v.)',
            'restriction_formula' => '5 amp/kasus',
            'price' => 17000,
            'description' => 'Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.',
            'image' => '3.jpg',
            'faskes1' => '0',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 1,
        ]);
        //kategori 2
        DB::table('medicines')->insert(
            ['generic_name' => 'asam mefenamat',
             'form' => 'kaps 250 mg',
             'restriction_formula' =>'30 kaps/bulan.',
             'price' => 10000,
             'description' =>'-',
             'image' => '4.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>2
        ]);

        DB::table('medicines')->insert(
            ['generic_name' => 'asam mefenamat',
             'form' => 'tab 500 mg',
             'restriction_formula' =>'30 tab/bulan.',
             'price' => 12000,
             'description' =>'-',
             'image' => '5.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>2
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'ibuprofen',
             'form' => 'tab 200 mg',
             'restriction_formula' =>'30 tab/bulan.',
             'price' => 8000,
             'description' =>'-',
             'image' => '6.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>2
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'ibuprofen',
             'form' => 'tab 400 mg',
             'restriction_formula' =>'30 tab/bulan.',
             'price' => 9500,
             'description' =>'-',
             'image' => '7.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>2
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'asam mefenamat',
             'form' => ' susp 100 mg/5 mL',
             'restriction_formula' =>'1 btl/kasus.',
             'price' => 15000,
             'description' =>'-',
             'image' => '8.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>2
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'ketoprofen',
             'form' => ' inj 50 mg/mL',
             'restriction_formula' =>'',
             'price' => 22000,
             'description' =>'-',
             'image' => '9.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>2
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'ketoprofen',
             'form' => 'sup 100 mg',
             'restriction_formula' =>'2 sup/hari, maks 3 hari.',
             'price' => 25000,
             'description' =>'Untuk nyeri sedang sampai berat pada pasien yang tidak dapat menggunakan analgesik secara oral',
             'image' => '10.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>2
        ]);

        //kategori 3
        DB::table('medicines')->insert(
            ['generic_name' => 'alopurinol',
             'form' => 'tab 100 mg',
             'restriction_formula' =>'30tab/bulan',
             'price' => 17500,
             'description' =>'Tidak diberikan pada saat nyeri akut',
             'image' => '11.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>3
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'alopurinol',
             'form' => 'tab 300 mg',
             'restriction_formula' =>'30tab/bulan',
             'price' => 17500,
             'description' =>'Tidak diberikan pada saat nyeri akut',
             'image' => '12.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>3
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'kolkisin',
             'form' => 'tab 500 mcg',
             'restriction_formula' =>'30tab/bulan',
             'price' => 16500,
             'description' =>'-',
             'image' => '13.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>3
        ]);


        //kategori 4
        DB::table('medicines')->insert(
            ['generic_name' => 'bupivakain',
             'form' => 'inj 0,5%',
             'restriction_formula' =>'-',
             'price' => 12250,
             'description' =>'-',
             'image' => '14.jpg',
             'faskes1' => '0',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>4
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'lidokain',
             'form' => 'inj 0,5%',
             'restriction_formula' =>'-',
             'price' => 12250,
             'description' =>'-',
             'image' => '15.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>4
        ]);
        DB::table('medicines')->insert(
            ['generic_name' => 'lidokain',
             'form' => 'spray topikal 10%',
             'restriction_formula' =>'-',
             'price' => 12250,
             'description' =>'-',
             'image' => '16.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>4
        ]);

        //kategori 5
        DB::table('medicines')->insert(
            ['generic_name' => 'propranolol',
             'form' => 'tab 10 mg',
             'restriction_formula' =>'-',
             'price' => 25250,
             'description' =>'-',
             'image' => '17.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>5,
        ]);

        DB::table('medicines')->insert(
            ['generic_name' => 'ergotamin',
             'form' => 'tab 1 mg',
             'restriction_formula' =>'8 tab/minggu',
             'price' => 17500,
             'description' =>'Hanya digunakan untuk serangan migren akut dan cluster headache',
             'image' => '18.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>5,
        ]);

        DB::table('medicines')->insert(
            ['generic_name' => 'Kombinasi KDT/FDC',
             'form' => 'tab',
             'restriction_formula' =>'8 tab/minggu',
             'price' => 17500,
             'description' =>'Mengandung erogotamin 1 mg dan kafein 50 mg',
             'image' => '19.jpg',
             'faskes1' => '1',
             'faskes2' => '1',
             'faskes3' => '1',
             'category_id'=>5,
        ]);

        //kategori 6
        DB::table('medicines')->insert([
            'generic_name' => 'asparaginase',
            'form' => 'inj 10.000 IU',
            'restriction_formula' => '60 tab/bulan',
            'price' => 15000,
            'description' => 'Untuk leukemia limfoblastik akut.',
            'image' => '20.jpg',
            'faskes1' => '0',
            'faskes2' => '0',
            'faskes3' => '1',
            'category_id' => 6,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'bendamustin',
            'form' => 'serb inj 25 mg',
            'restriction_formula' => 'Untuk CLL: 100 mg/m2 pada hari 1 dan 2 pada siklus 28 hari. Pemberian maks 6 siklus.',
            'price' => 20000,
            'description' => 'Hanya untuk Chronic Lymphocytic Leukemia (CLL) (stadium B atau C).',
            'image' => '21.jpg',
            'faskes1' => '0',
            'faskes2' => '0',
            'faskes3' => '1',
            'category_id' => 6,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'busulfan',
            'form' => 'tab 2 mg',
            'restriction_formula' => '-',
            'price' => 15000,
            'description' => '-',
            'image' => '22.jpg',
            'faskes1' => '0',
            'faskes2' => '0',
            'faskes3' => '1',
            'category_id' => 6,
        ]);

        //kategori 7
        DB::table('medicines')->insert([
            'generic_name' => 'asam folat',
            'form' => 'tab 0,4 mg',
            'restriction_formula' => '-',
            'price' => 14000,
            'description' => '-',
            'image' => '23.jpg',
            'faskes1' => '1',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 7,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'garam Fe',
            'form' => 'setara dengan Fe elemental 60 mg',
            'restriction_formula' => '-',
            'price' => 20000,
            'description' => '-',
            'image' => '24.jpg',
            'faskes1' => '1',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 7,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'sianokobalamin (vitamin B12)',
            'form' => 'tab 50 mcg',
            'restriction_formula' => '-',
            'price' => 15000,
            'description' => '-',
            'image' => '25.jpg',
            'faskes1' => '1',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 7,
        ]);

        //kategori 8
        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '10 amp/kasus, kecuali untuk kasus di ICU.',
            'price' => 22000,
            'description' => 'Tidak untuk i.m.',
            'image' => '26.jpg',
            'faskes1' => '1',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 8,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'fenitoin',
            'form' => 'kaps 30mg*',
            'restriction_formula' => '90 kaps/bulan.',
            'price' => 23000,
            'description' => 'Dapat digunakan untuk status konvulsivus',
            'image' => '27.jpg',
            'faskes1' => '1',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 8,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'fenobarbital',
            'form' => 'tab 30mg*',
            'restriction_formula' => '120 tab/bulan.',
            'price' => 5000,
            'description' => 'Dapat digunakan untuk status konvulsivus.',
            'image' => '28.jpg',
            'faskes1' => '1',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 8,
        ]);

        //kategori 9
        DB::table('medicines')->insert([
            'generic_name' => 'anastrozol',
            'form' => 'tab 1 mg',
            'restriction_formula' => '30 tab/bulan.',
            'price' => 20000,
            'description' => 'Dapat digunakan untuk kanker payudara post menopause dengan pemeriksaan reseptor estrogen/progesteron positif.',
            'image' => '29.jpg',
            'faskes1' => '0',
            'faskes2' => '0',
            'faskes3' => '1',
            'category_id' => 9,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'dienogest',
            'form' => 'tab 2 mg',
            'restriction_formula' => '30 tab/bulan selama maks 6 bulan.',
            'price' => 15000,
            'description' => 'Hanya untuk endometriosis.',
            'image' => '30.jpg',
            'faskes1' => '0',
            'faskes2' => '1',
            'faskes3' => '1',
            'category_id' => 9,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'eksemestan',
            'form' => 'tab sal gula 25 mg',
            'restriction_formula' => '30 tab/bulan.',
            'price' => 10000,
            'description' => 'Dapat digunakan untuk kanker payudara post menopause, ER dan/atau PR positif.',
            'image' => '31.jpg',
            'faskes1' => '0',
            'faskes2' => '0',
            'faskes3' => '1',
            'category_id' => 9,
        ]);

        //kategori 10
        DB::table('medicines')->insert([
            'generic_name' => 'azatioprin',
            'form' => 'tab 50 mg',
            'restriction_formula' => '-',
            'price' => 12000,
            'description' => '-',
            'image' => '32.jpg',
            'faskes1' => '0',
            'faskes2' => '0',
            'faskes3' => '1',
            'category_id' => 10,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'everolimus',
            'form' => 'tab 0,25 mg',
            'restriction_formula' => '-',
            'price' => 20000,
            'description' => 'Hanya untuk pasien yang telah menjalani transplantasi ginjal dan mengalami penurunan fungsi ginjal yang dapat menyebabkan Chronic Allograft Nephropathy (CAN).',
            'image' => '33.jpg',
            'faskes1' => '0',
            'faskes2' => '0',
            'faskes3' => '1',
            'category_id' => 10,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'hidroksiklorokuin',
            'form' => 'tab 200 mg*',
            'restriction_formula' => '60 tab/bulan',
            'price' => 22000,
            'description' => 'Untuk kasus SLE (Systemic Lupus Erythematosus).',
            'image' => '34.jpg',
            'faskes1' => '0',
            'faskes2' => '0',
            'faskes3' => '1',
            'category_id' => 10,
        ]);
    }
}
