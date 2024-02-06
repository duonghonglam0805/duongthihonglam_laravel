<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('datetime', function ($expression){
            $expression = trim($expression, '\'');
            $expression = trim($expression, '"');
            $dataObject = date_create($expression);
            if(!empty($dataObject)){
                $dataFormat = $dataObject->format('d/m/Y H:i:s');
                return $dataFormat;
            }
            return false;
            return "<?php echo $expression ?>";
        });
    }
}
