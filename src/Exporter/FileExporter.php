<?php

namespace MohammedManssour\FastCSV\Exporter;

use MohammedManssour\FastCSV\Config\ExportConfig;

class FileExporter implements ExporterInterface
{
    private $handle;

    public function __construct(public ExportConfig $config, public $file)
    {
        $this->handle = fopen($this->file, 'w');
    }

    public function export()
    {
        if (isset($this->config->header) && ! empty($this->config->header)) {
            $this->addLine($this->config->header);
        }

        if (isset($this->config->data)) {
            foreach ($this->config->data as $line) {
                $this->addLine($line);
            }
        }

        fclose($this->handle);
    }

    public function addLine(array $line)
    {
        fputcsv(
            $this->handle,
            $line,
            $this->config->separator,
            $this->config->enclosure,
            $this->config->escape,
            $this->config->eol
        );
    }
}
