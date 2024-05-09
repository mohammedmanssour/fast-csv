<?php

namespace MohammedManssour\FastCSV\Support;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit\Framework\Assert;

class Faker
{
    private bool $enabled = false;

    private vfsStreamDirectory $fileSystem;

    public function __construct()
    {
        $this->fileSystem = vfsStream::setup();
    }

    public function enable(bool $shouldEnableFaker = true): static
    {
        $this->enabled = $shouldEnableFaker;

        return $this;
    }

    public function enabled(): bool
    {
        return $this->enabled;
    }

    /**
     * add the fake file system prefix to path
     */
    public function prefix(string $path): string
    {
        if (str_starts_with($path, $this->fileSystem->url())) {
            return $path;
        }

        return Arr::pathsJoin([$this->fileSystem->url(), $path]);
    }

    /**
     * Make sure the file is fakeable
     * 1. create the directory structure
     */
    public function file(string $path)
    {
        $path = $this->prefix($path);
        mkdir(pathinfo($path)['dirname'], 0777, true);

        return $path;
    }

    public function assertCSVHasLine(string $path, array $expected)
    {
        $contents = file_get_contents($this->prefix($path));
        Assert::assertStringContainsString(Arr::toCSVString($expected), $contents, 'File does not contain the provided expected line.');
    }
}
