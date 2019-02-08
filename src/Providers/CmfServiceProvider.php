<?php 

namespace Cmf\Providers;

use Illuminate\Support\ServiceProvider;
use Cmf\Console\Commands\AppClearCommand;

class CmfServiceProvider extends ServiceProvider {

    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {
        //
    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        //Register Cmf routes
        include __DIR__.'/../routes/admin.php';

        $this->commands(AppClearCommand::class);
    }
}
