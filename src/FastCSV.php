<?php

namespace MohammedManssour\FastCSV;

use MohammedManssour\FastCSV\Exporter\ExporterBuilder;
use MohammedManssour\FastCSV\Support\Faker;

class FastCSV
{
    private static Faker $faker;

    public static function fake(): Faker
    {
        if (! isset(static::$faker)) {
            static::$faker = new Faker();
        }

        return static::$faker;
    }

    public static function exporter(): ExporterBuilder
    {
        return new ExporterBuilder();
    }
}
