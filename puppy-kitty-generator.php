<?php
/*
Plugin Name: Random Puppy and Kitties
Description: Quickly add puppies and kitties to your posts and sidebar. Because the internet needs more cute. All images from http://www.randomdoggiegenerator.com
Author: Erik Jonasson
Author URI: http://#
Version: 1.0
License: GPL2
Text Domain: random-puppies-and-kittens
*/

class ej_RandomPuppiesandKittens
{
    public $path;
    public $url;

    public $puppy_api_url;
    public $widget;
    public $shortcode;


    private static $instance = null;

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->path = plugin_dir_path(__FILE__);
        $this->url = plugin_dir_url(__FILE__);

        $this->puppy_api_url = 'http://www.randomdoggiegenerator.com/randomdoggie.php';
        $this->kitty_api_url = 'http://www.randomkittengenerator.com/cats/rotator.php';

        $this->loadWidget();
        $this->loadPuppyShortCode();
    }

    public function loadWidget()
    {
        require_once($this->path . 'classes/widget.php');
        $this->widget = new ej_puppyKittyWidget();
        add_action('widgets_init', array($this, 'registerPuppyWidget'));
    }

    public function registerPuppyWidget()
    {
        register_widget(ej_puppyKittyWidget);
    }

    public function loadPuppyShortCode()
    {
        require_once($this->path . 'classes/shortcode.php');
        $this->shortcode = new ej_puppyShortcode();

    }

    public function getKitty()
    {
        return '<img src="' .  $this->kitty_api_url . '" style="margin-bottom: 15px;">';
    }

    public function getPuppy()
    {
        return '<img src="' .  $this->puppy_api_url . '" style="margin-bottom: 15px;">';
    }
    public function getRandom()
    {
        $rand = rand(0, 1);
        if ($rand == 0) {
            return $this->getPuppy();
        } else {
            return $this->getKitty();
        }
    }
}
$puppy = ej_RandomPuppiesandKittens::instance();

