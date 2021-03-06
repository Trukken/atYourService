<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert(
            [
                [
                    'service_id' => 1,
                    'report_reason' => 'Was really rude when we first met!',
                    'handled' => false,
                ], [
                    'service_id' => 1,
                    'report_reason' => 'Please check.',
                    'handled' => false
                ], [
                    'service_id' => 2,
                    'report_reason' => 'gidshisagdhasgddsahjdgsaj.',
                    'handled' => false
                ], [
                    'service_id' => 2,
                    'report_reason' => 'Too smelly.',
                    'handled' => false
                ], [
                    'service_id' => 3,
                    'report_reason' => 'Was lying about his prices.',
                    'handled' => false
                ], [
                    'service_id' => 4,
                    'report_reason' => '',
                    'handled' => false
                ],
            ]
        );
    }
}
