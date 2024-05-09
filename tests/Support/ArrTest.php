<?php

namespace MohammedManssour\FastCSV\Tests\Support;

use MohammedManssour\FastCSV\Support\Arr;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
    /**
     * @test
     * */
    public function it_convers_arr_to_csv_string()
    {
        $this->assertEquals(
            "One,Two,Three",
            Arr::toCSVString(["One", "Two", "Three"])
        );
    }

    /**
     * @test
     * */
    public function it_join_paths()
    {
        $this->assertEquals(
            "url://root/some/path/to/file",
            Arr::pathsJoin(["url://root", "some", "/path", "to/", "/file/"])
        );
    }
}
