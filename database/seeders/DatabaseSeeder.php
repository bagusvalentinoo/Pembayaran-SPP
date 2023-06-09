<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Other\AddAcademicYearsForStartingSeeder;
use Database\Seeders\Other\AddMonthsForStartingSeeder;
use Database\Seeders\Other\AddSemestersForStartingSeeder;
use Database\Seeders\School\AddClassroomsForStartingSeeder;
use Database\Seeders\School\AddSchoolsIncludeCompetenciesForStartingSeeder;
use Database\Seeders\School\AddSchoolTypesForStartingSeeder;
use Database\Seeders\User\AddRolesForStartingSeeder;
use Database\Seeders\User\AddUsersIncludedChildForStartingSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                AddSchoolTypesForStartingSeeder::class,
                AddSchoolsIncludeCompetenciesForStartingSeeder::class,
                AddClassroomsForStartingSeeder::class,
                AddRolesForStartingSeeder::class,
                AddUsersIncludedChildForStartingSeeder::class,
                AddAcademicYearsForStartingSeeder::class,
                AddSemestersForStartingSeeder::class,
                AddMonthsForStartingSeeder::class,
            ]
        );
    }
}
