<?php

namespace Jacksonit\NganLuong;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

/**
 * ServiceProvider
 *
 * The service provider for the modules. After being registered
 * it will make sure that each of the modules are properly loaded
 * i.e. with their routes, views etc.
 *
 * @author Cao Son <son.caoxuan92@gmail.com>
 * @package Jacksonit\NganLuong
 */
class NganLuongServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/config/nganluong.php' => config_path('nganluong.php'),
        ]);
    }

    public function register()
    {
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('NLBankCharge', 'Jacksonit\NganLuong\Facades\NLBankCharge');
        });

        $this->app->bind('BankCharge', BankCharge::class);
    }
}