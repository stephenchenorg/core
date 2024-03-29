<?php

namespace Stephenchen\Core\Utilities;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Stephenchen\Core\Constant\Constant;

final class Database
{
    /**
     * For local environment, truncate all tables for increasing the speed of development
     * Truncate all data across all the tables,
     *
     * @return void
     */
    public static function truncateAllTables(): void
    {
        if (!App::environment(Constant::ENVIRONMENT_LOCAL)) {
            return;
        }

        Schema::disableForeignKeyConstraints();
        $databaseName = DB::getDatabaseName();
        $prefix       = env('DB_PREFIX');
        $tables       = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '{$databaseName}'");
        foreach ($tables as $table) {
            $name = $table->TABLE_NAME;
            // Skip migration table
            if ($name == 'migrations') {
                continue;
            }
            $nameWithoutPrefix = str_replace($prefix, '', $name);
            DB::table($nameWithoutPrefix)->truncate();
        }
        Schema::enableForeignKeyConstraints();
    }
}
