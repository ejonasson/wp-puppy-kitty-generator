<?php

class ej_puppyShortcode
{
    public function __construct()
    {
        add_shortcode('random_puppy', array($this, 'puppyShortcode'));
        add_shortcode('random_kitty', array($this, 'kittyShortcode'));
        add_shortcode('random_pet', array($this, 'randomShortcode'));
    }

    public function puppyShortcode()
    {
        $puppy = ej_RandomPuppiesandKittens::instance();
        return $puppy->getPuppy();
    }

    public function kittyShortcode()
    {
        $kitty = ej_RandomPuppiesandKittens::instance();
        return $kitty->getKitty();
    }

    public function randomShortcode()
    {
        $kitty = ej_RandomPuppiesandKittens::instance();
        return $kitty->getRandom();
    }

}
