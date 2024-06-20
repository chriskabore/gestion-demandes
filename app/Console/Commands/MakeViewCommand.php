<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creer un nouveau template blade';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $view = $this->argument('view');
        $path = $this->viewPath($view);
        $this->createDir($path);
        if (File::exists($path))
        {
            $this->error("Chemin $path existe déjà.");
            return;
        }
        File::put($path, $path);
        $this->info("Chemin $path a été créé avec succès.");
    }

    public function viewPath($view){
        $view = str_replace('.', '/', $view).'.blade.php';
        $path = "resources/views/$view";
        return $path;
    }

    public function createDir($path){
        $dir = dirname($path);
        if (!file_exists($dir)){
            mkdir($dir, 0777, true);
        }
    }
}
