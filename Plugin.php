<?php namespace ANIKIN\Dump;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin, including plugin name and developer name.
     *
     * @return array
     */
    public function pluginDetails() : array
    {
        return [
            'name' => 'ANIKIN.Dump',
            'description' => 'Add Twig function d() & dd() that recursively dump passed variables.',
            'author' => 'Constantine Anikin',
            'icon' => 'icon-diamond',
            'homepage' => 'https://github.com/anik1ng/dump',
        ];
    }
    /**
     * Register new Twig function
     *
     * @return array
     */
    public function registerMarkupTags() : array
    {
        if (\Config::get('app.debug') === true) {
            return [
                'functions' => [
                    'd' => function () {
                        array_map(function ($var) {
                            dump($var);
                        }, func_get_args());
                    },
                    'dd' => function () {
                        array_map(function ($var) {
                            dd($var);
                        }, func_get_args());
                    }
                ]
            ];
        }
    }
}
