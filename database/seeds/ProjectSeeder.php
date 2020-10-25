<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # Project Types Seed
        $project_types = [
            [
                'title'      => 'أعمال',
                'created_at' => now(),
            ],
            [
                'title'      => 'توريدات',
                'created_at' => now(),
            ],
            [
                'title'      => 'دراسات أو استشارات',
                'created_at' => now(),
            ],
        ];
        \App\Models\ProjectType::insert($project_types);

        # Project Natures Seed
        $project_natures = [
            [
                'title'      => 'ترميم',
                'created_at' => now(),
            ],
            [
                'title'      => 'جديد',
                'created_at' => now(),
            ],
        ];
        \App\Models\ProjectNature::insert($project_natures);

        # Financial Years
        $financial_years = [
            [
                'year'       => '2020/2019',
                'created_at' => now(),
            ],
            [
                'year'       => '2019/2018',
                'created_at' => now(),
            ],
            [
                'year'       => '2018/2017',
                'created_at' => now(),
            ],
            [
                'year'       => '2017/2016',
                'created_at' => now(),
            ],
            [
                'year'       => '2016/2015',
                'created_at' => now(),
            ],
            [
                'year'       => '2015/2014',
                'created_at' => now(),
            ],
        ];
        \App\Models\FinancialYear::insert($financial_years);

        # Budgets
        $budgets = [
            [
                'budget'            => 112500000,
                'financial_year_id' => 1,
                'directorate_id'    => 1,
                'created_at'        => now(),
            ],
            [
                'budget'            => 122500000,
                'financial_year_id' => 1,
                'directorate_id'    => 2,
                'created_at'        => now(),
            ],
            [
                'budget'            => 132500000,
                'financial_year_id' => 1,
                'directorate_id'    => 3,
                'created_at'        => now(),
            ],
            [
                'budget'            => 142500000,
                'financial_year_id' => 1,
                'directorate_id'    => 4,
                'created_at'        => now(),
            ],
            [
                'budget'            => 152500000,
                'financial_year_id' => 1,
                'directorate_id'    => 5,
                'created_at'        => now(),
            ],
            [
                'budget'            => 162500000,
                'financial_year_id' => 1,
                'directorate_id'    => 6,
                'created_at'        => now(),
            ],
            [
                'budget'            => 212500000,
                'financial_year_id' => 2,
                'directorate_id'    => 1,
                'created_at'        => now(),
            ],
            [
                'budget'            => 222500000,
                'financial_year_id' => 2,
                'directorate_id'    => 2,
                'created_at'        => now(),
            ],
            [
                'budget'            => 232500000,
                'financial_year_id' => 2,
                'directorate_id'    => 3,
                'created_at'        => now(),
            ],
            [
                'budget'            => 242500000,
                'financial_year_id' => 2,
                'directorate_id'    => 4,
                'created_at'        => now(),
            ],
            [
                'budget'            => 252500000,
                'financial_year_id' => 2,
                'directorate_id'    => 5,
                'created_at'        => now(),
            ],
            [
                'budget'            => 262500000,
                'financial_year_id' => 2,
                'directorate_id'    => 6,
                'created_at'        => now(),
            ],
            [
                'budget'            => 312500000,
                'financial_year_id' => 3,
                'directorate_id'    => 1,
                'created_at'        => now(),
            ],
            [
                'budget'            => 322500000,
                'financial_year_id' => 3,
                'directorate_id'    => 2,
                'created_at'        => now(),
            ],
            [
                'budget'            => 332500000,
                'financial_year_id' => 3,
                'directorate_id'    => 3,
                'created_at'        => now(),
            ],
            [
                'budget'            => 342500000,
                'financial_year_id' => 3,
                'directorate_id'    => 4,
                'created_at'        => now(),
            ],
            [
                'budget'            => 352500000,
                'financial_year_id' => 3,
                'directorate_id'    => 5,
                'created_at'        => now(),
            ],
            [
                'budget'            => 362500000,
                'financial_year_id' => 3,
                'directorate_id'    => 6,
                'created_at'        => now(),
            ],
            [
                'budget'            => 412500000,
                'financial_year_id' => 4,
                'directorate_id'    => 1,
                'created_at'        => now(),
            ],
            [
                'budget'            => 422500000,
                'financial_year_id' => 4,
                'directorate_id'    => 2,
                'created_at'        => now(),
            ],
            [
                'budget'            => 432500000,
                'financial_year_id' => 4,
                'directorate_id'    => 3,
                'created_at'        => now(),
            ],
            [
                'budget'            => 442500000,
                'financial_year_id' => 4,
                'directorate_id'    => 4,
                'created_at'        => now(),
            ],
            [
                'budget'            => 452500000,
                'financial_year_id' => 4,
                'directorate_id'    => 5,
                'created_at'        => now(),
            ],
            [
                'budget'            => 462500000,
                'financial_year_id' => 4,
                'directorate_id'    => 6,
                'created_at'        => now(),
            ],
            [
                'budget'            => 512500000,
                'financial_year_id' => 5,
                'directorate_id'    => 1,
                'created_at'        => now(),
            ],
            [
                'budget'            => 522500000,
                'financial_year_id' => 5,
                'directorate_id'    => 2,
                'created_at'        => now(),
            ],
            [
                'budget'            => 532500000,
                'financial_year_id' => 5,
                'directorate_id'    => 3,
                'created_at'        => now(),
            ],
            [
                'budget'            => 542500000,
                'financial_year_id' => 5,
                'directorate_id'    => 4,
                'created_at'        => now(),
            ],
            [
                'budget'            => 552500000,
                'financial_year_id' => 5,
                'directorate_id'    => 5,
                'created_at'        => now(),
            ],
            [
                'budget'            => 562500000,
                'financial_year_id' => 5,
                'directorate_id'    => 6,
                'created_at'        => now(),
            ],
            [
                'budget'            => 612500000,
                'financial_year_id' => 6,
                'directorate_id'    => 1,
                'created_at'        => now(),
            ],
            [
                'budget'            => 622500000,
                'financial_year_id' => 6,
                'directorate_id'    => 2,
                'created_at'        => now(),
            ],
            [
                'budget'            => 632500000,
                'financial_year_id' => 6,
                'directorate_id'    => 3,
                'created_at'        => now(),
            ],
            [
                'budget'            => 642500000,
                'financial_year_id' => 6,
                'directorate_id'    => 4,
                'created_at'        => now(),
            ],
            [
                'budget'            => 652500000,
                'financial_year_id' => 6,
                'directorate_id'    => 5,
                'created_at'        => now(),
            ],
            [
                'budget'            => 662500000,
                'financial_year_id' => 6,
                'directorate_id'    => 6,
                'created_at'        => now(),
            ],
        ];
        \App\Models\Budget::insert($budgets);
    }
}
