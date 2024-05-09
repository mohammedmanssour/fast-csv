<?php

namespace MohammedManssour\FastCSV\Exporter;

use Iterator;
use ArrayIterator;
use IteratorAggregate;
use MohammedManssour\FastCSV\Config\ExportConfig;
use MohammedManssour\FastCSV\FastCSV;
use MohammedManssour\FastCSV\Support\Arr;
use MohammedManssour\FastCSV\Traits\ConfiguresCSV;

class ExporterBuilder
{
    use ConfiguresCSV;

    public ExportConfig $config;

    public function __construct()
    {
        $this->config = new ExportConfig();
    }

    public function header(array $header): static
    {
        $this->config->header = $header;
        return $this;
    }

    public function data(array|Iterator|IteratorAggregate $data): static
    {
        if ($data instanceof Iterator) {
            $this->config->data = $data;
        } elseif ($data instanceof IteratorAggregate) {
            $this->config->data = $data->getIterator();
        } else {
            $this->config->data = new ArrayIterator($data);
        }

        return $this;
    }

    public function toFile(string $file): FileExporter
    {
        if (FastCSV::fake()->enabled()) {
            $file = FastCSV::fake()->file($file);
        }
        return (new FileExporter($this->config, $file));
    }
}
