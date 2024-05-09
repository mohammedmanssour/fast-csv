<?php

namespace MohammedManssour\FastCSV;

use PHPUnit\Framework\Assert;
use org\bovigo\vfs\vfsStreamDirectory;

use function PHPUnit\Framework\assertTrue;
use MohammedManssour\FastCSV\Support\Faker;
use MohammedManssour\FastCSV\Traits\HasTestHelpers;
use MohammedManssour\FastCSV\Exporter\ExporterBuilder;

class FastCSV
{
    private static Faker $faker;

    public static function fake(): Faker
    {
        if (!isset(static::$faker)) {
            static::$faker = new Faker();
        }

        return static::$faker;
    }

    public static function exporter(): ExporterBuilder
    {
        return new ExporterBuilder();
    }
}
