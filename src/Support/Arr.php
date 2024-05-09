<?php

namespace MohammedManssour\FastCSV\Support;

class Arr
{
    public static function toCSVString(array $input, $delimiter = ',', $enclosure = '"', string $escape = '\\', string $eol = PHP_EOL)
    {
        $fp = fopen('php://temp', 'r+b');
        fputcsv($fp, $input, $delimiter, $enclosure, $escape, $eol);
        rewind($fp);
        $data = rtrim(stream_get_contents($fp), "\n");
        fclose($fp);

        return $data;
    }

    public static function pathsJoin(array $paths): string
    {
        return implode(
            '/',
            array_map(function ($path) {
                return trim($path, '/');
            }, $paths)
        );
    }
}
