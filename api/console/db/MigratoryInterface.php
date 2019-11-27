<?php

namespace Console\Db;

interface MigratoryInterface
{
    public function execute(): bool;
}