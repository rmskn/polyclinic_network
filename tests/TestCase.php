<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    protected static $migrationsRun = false;
    protected static $tableNames = [];
    protected $isFullApplicationRefresh = false;

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    protected function dropAllTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $results = DB::select(
            '
                SELECT concat(\'DROP TABLE IF EXISTS \', table_name, \';\') AS query
                FROM information_schema.tables
                WHERE table_schema = \'' . env('DB_DATABASE') . '\'
            '
        );

        foreach ($results as $result) {
            DB::statement($result->query);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    protected function setUp(): void
    {
        parent::setUp();

        if (!static::$migrationsRun) {
            $this->dropAllTables();

            Artisan::call('migrate');
            Artisan::call('db:seed');

            $tables = array_map(function ($t) {
                $tmp = (array)$t;
                return reset($tmp);
            }, DB::select('SHOW TABLES'));

            static::$migrationsRun = true;
            static::$tableNames = array_filter(
                $tables,
                function (string $value): bool {
                    return $value !== 'migrations';
                }
            );
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            foreach (static::$tableNames as $name) {
                DB::table($name)->truncate();
            }
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
