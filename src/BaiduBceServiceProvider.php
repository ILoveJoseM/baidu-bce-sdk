<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-04
 * Time: 11:47
 */

namespace JoseChan\BaiduBceSdk;


use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use JoseChan\BaiduBceSdk\Requester\RequesterManager;
use JoseChan\BaiduBceSdk\Requester\BaseRequester;

class BaiduBceServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/baidu-bce.php' => config_path("baidu-bce.php")], "baidu-bce");
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $config = config("baidu-bce");

        if (!$config) {
            $config = include __DIR__ . '/../config/baidu-bce.php';
        }

        $this->app->singleton("baidu-bce-client", function () use ($config) {
            return new Client(["base_uri" => $config['baidu_bce_host'] ?? "https://aip.baidubce.com"]);
        });

        $this->app->when(AccessTokenProvider::class)
            ->needs('$config')
            ->give($config);

        $this->app->when(BaseRequester::class)
            ->needs(AccessTokenProvider::class)
            ->give(function () {
                return $this->app->make(AccessTokenProvider::class);
            });

        $this->app->singleton("baidu-bce", function () {
            return new RequesterManager($this->app);
        });
    }

}
