<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Imports\PostsImport;
use App\Models\Post;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:exel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from exel';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        ini_set('memory_limit', '-1');
        Excel::import(new PostsImport(), public_path('exel/posts.xlsx'));
        dd('finish');
    }
}
