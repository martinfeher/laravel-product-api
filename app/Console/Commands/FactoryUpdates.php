<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FactoryUpdates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:factory-updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \App\Models\ProductAttribute::factory()->count(3)->create();
    }
}
