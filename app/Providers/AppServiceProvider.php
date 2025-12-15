<?php

namespace App\Providers;

use DOMDocument;
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
        $this->svgBladeDirective();
    }

    private function svgBladeDirective(): void
    {
        Blade::directive('svg', function($arguments) {
            list($path, $class) = array_pad(explode(',', trim($arguments, "() ")), 2, '');
            $path = trim($path, "' ");
            $class = trim($class, "' ");

            $svg = new DOMDocument();
            $svg->load(public_path($path));
            if ($class) {
                $svg->documentElement->setAttribute("class", $class);
            }
            return $svg->saveXML($svg->documentElement);
        });
    }
}
