<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class migrationOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_in_order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $migrations = [
            '2014_10_12_100000_create_password_resets_table.php',
            '2019_08_19_000000_create_failed_jobs_table.php',
            '2019_12_14_000001_create_personal_access_tokens_table.php',
            '2024_01_05_110848_create_departments_table.php',
            '2024_01_05_112140_create_semisters_table.php',
            '2024_01_05_113616_create_modules_table.php',
            '2024_01_05_113942_create_grades_table.php',
            '2024_01_05_114444_create_award__classifications_table.php',
            '2024_01_05_114724_create_n_t_a_s_table.php',
            '2024_01_05_112348_create_courses_table.php',
            '2024_01_05_120412_staff.php',
            '2024_01_05_115018_create_students_table.php',
            '2024_01_24_134405_create_course_semiser_modules_table.php',
            '2024_01_24_132147_create_student_modules_table.php',
            '2024_01_05_120952_create_results_table.php'

        ];

        foreach($migrations as $migration)
        {
            $basePath = 'database/migrations/';
            $migrationName = trim($migration);
            $path = $basePath.$migrationName;
            $this->call('migrate:refresh', [
                '--path' => $path ,
            ]);
        }
    }
}
