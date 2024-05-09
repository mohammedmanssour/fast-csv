<?php

namespace MohammedManssour\FastCSV\Config;

use Iterator;

class ExportConfig extends CSVConfig
{
    public array $header;

    public Iterator $data;
}
