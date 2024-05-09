<?php

namespace MohammedManssour\FastCSV\Traits;

use MohammedManssour\FastCSV\Config\CSVConfig;

trait ConfiguresCSV
{
    public function separator(string $separator): static
    {
        $this->config->separator = $separator;
        return $this;
    }

    public function enclosure(string $enclosure): static
    {
        $this->config->enclosure = $enclosure;
        return $this;
    }

    public function escape(string $escape): static
    {
        $this->config->escape = $escape;
        return $this;
    }

    public function eol(string $eol): static
    {
        $this->config->eol = $eol;
        return $this;
    }
}
