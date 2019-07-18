<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class indexer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'indexer:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run indexer and create a new index of postier';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      
    }
}
