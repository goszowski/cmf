<?php

namespace Cmf\Console\Commands;

use Illuminate\Console\Command;

class ClearAppCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "app:clear";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Delete unnecessary files from Lumen instalation";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('das');
    }
}
