<?php

use Illuminate\Database\Seeder;

class TenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Status
        $status = [
            [
                'title' => 'مكتمل',
            ],
            [
                'title' => 'جاري العمل',
            ],
            [
                'title' => 'معلنة',
            ],
            [
                'title' => 'لم يتم الإعلان',
            ],
        ];
        \App\Models\TenderStatus::insert($status);

        # Required Docs
        $required_docs = [
            [
                'title'       => 'إثبات الهوية الشخصية',
                'description' => 'جواز سفر او بطاقة شخصية غير منتهي الصلاحية',
            ],
            [
                'title'       => 'سجل تجاري',
                'description' => 'سجل تجاري مرخص وغير منتهي الصلاحية',
            ],
            [
                'title'       => 'ضمان بنكي',
                'description' => 'بيان بالرصيد البنكي موثق من قبل البنك أو شيك موثق',
            ],
        ];
        \App\Models\RequiredDoc::insert($required_docs);
        $projects = [
            ['name'           => 'project 1',
             'cost_primary'   => '',
             'estimated_year' => '',
             'start_date'     => now(),
             'num_targeted'   => '',
             'type_id'        => '',
             'nature_id'      => '',
             'directorate_id' => '',
             'created_at'     => now(),],
        ];
        factory(\App\Models\Project::class, 9)->create();
        factory(\App\Models\Tender::class, 9)->create();
//        factory(\App\Models\Tender::class, 10)->create()->each(function ($tender) {
//            $tender->project()->save(factory(\App\Models\Project::class)->create());
//        });


    }
}
