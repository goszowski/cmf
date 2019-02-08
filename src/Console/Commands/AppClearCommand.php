<?php

namespace Cmf\Console\Commands;

use Illuminate\Console\Command;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

class AppClearCommand extends Command
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

    protected $filesystem;

    public function __construct()
    {
        parent::__construct();
        $this->filesystem = new Filesystem(new Local(app()->basePath()));
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Deleting directories
        foreach(['app/Events', 'app/Jobs', 'app/Listeners', 'tests', 'storage/app', 'database'] as $dir)
        {
            if(is_dir(app()->basePath($dir)))
            {
                $this->filesystem->deleteDir($dir) ? $this->info('Directory ' . $dir . ' deleted.') : $this->error('The directory ' . $dir . ' has not been deleted');
            }
        }

        // Deleting files
        foreach(['app/Http/Middleware/ExampleMiddleware.php', 'app/Http/Middleware/Authenticate.php', 'app/Http/Controllers/Controller.php', 'app/Http/Controllers/ExampleController.php', 'app/Providers/EventServiceProvider.php', 'app/Providers/AuthServiceProvider.php', 'phpunit.xml', 'readme.md'] as $file)
        {
            if(file_exists(app()->basePath($file)))
            {
                $this->filesystem->delete($file) ? $this->info('File ' . $file . ' deleted.') : $this->error('The file ' . $file . ' has not been deleted');
            }
        }

        // Clearing PHP-files
        foreach(['routes/web.php'] as $file)
        {
            $this->filesystem->update($file, "<?php\n") ? $this->info('File ' . $file . ' cleared.') : $this->error('The file ' . $file . ' can not been cleared');
        }
    }
}
