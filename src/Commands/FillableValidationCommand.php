<?php

namespace Maize\FillableValidation\Commands;

use Illuminate\Console\Command;

class FillableValidationCommand extends Command
{
    public $signature = 'laravel-fillable-validation';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
