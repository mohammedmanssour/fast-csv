<?php

namespace MohammedManssour\FastCSV\Tests;

use MohammedManssour\FastCSV\FastCSV;
use PHPUnit\Framework\TestCase;

class FastCSVTest extends TestCase
{
    /**
     * @test
     * */
    public function it_exports()
    {
        FastCSV::fake()->enable();

        $path = __DIR__ . '/some.csv';
        FastCSV::exporter()
            ->header(["One", "Two", "Three"])
            ->data([
                ["Line 1: One", "Line 1: Two", "Line 1: Three"],
                ["Line 2: One", "Line 2: Two", "Line 2: Three"],
            ])
            ->toFile($path)
            ->export();

        FastCSV::fake()->assertCSVHasLine($path, ["One", "Two", "Three"]);
        FastCSV::fake()->assertCSVHasLine($path, ["Line 1: One", "Line 1: Two", "Line 1: Three"]);
        FastCSV::fake()->assertCSVHasLine($path, ["Line 2: One", "Line 2: Two", "Line 2: Three"]);
    }
}
