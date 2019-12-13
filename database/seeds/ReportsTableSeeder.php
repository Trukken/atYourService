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
                    'report_reason' => 'Too smelly.',
                    'handled' => false,
                    'updated_at' => '1970-01-01 00:00:00'
                ], [
                    'service_id' => 1,
                    'report_reason' => 'Too smelly.',
                    'handled' => false
                ], [
                    'service_id' => 2,
                    'report_reason' => 'Too smelly.',
                    'handled' => false
                ], [
                    'service_id' => 2,
                    'report_reason' => 'Too smelly.',
                    'handled' => false
                ], [
                    'service_id' => 3,
                    'report_reason' => 'Too smelly.',
                    'handled' => false
                ], [
                    'service_id' => 4,
                    'report_reason' => 'Too smelly.',
                    'handled' => false
                ],
            ]
        );
    }
}
