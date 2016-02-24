<?php

class ej_puppyKittyWidget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'puppies_and_kittens',
            'description' => 'Add Random Puppies and Kittens',
        );
        parent::__construct('puppies_and_kittens', 'Random Puppies and Kittens');
    }
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']). $args['after_title'];
        }
        
        $animal = ej_RandomPuppiesandKittens::instance();
        switch ($instance['puppy_or_kitty']) {
            case 'kitty':
                echo $animal->getKitty();
                break;
            case 'random':
                echo $animal->getRandom();
                break;
            case 'puppy':
            default:
                echo $animal->getPuppy();
                break;
        }

        echo $args['after_widget'];

    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['puppy_or_kitty'] = (!empty($new_instance['puppy_or_kitty'])) ? strip_tags($new_instance['puppy_or_kitty']) : '';

        return $instance;
    }

    public function form($instance)
    {
        $puppy_or_kitty = $instance['puppy_or_kitty'];
        $title = !empty($instance['title']) ? $instance['title'] : '';
        ?>
        <label for="<?php echo $this->get_field_name('title'); ?>">
        Title
        </label>
        <input 
        type="text"
        class="widefat"
        id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>"
        value="<?php echo esc_attr($title); ?>"
        >
        <div style="margin-top: 5px;"></div>
        <select class="widefat" name="<?php echo $this->get_field_name('puppy_or_kitty'); ?>" id="<?php echo $this->get_field_id('puppy_or_kitty'); ?>">
            <option value="puppy" 
            <?php echo ($puppy_or_kitty == 'puppy') ? 'selected' : ''; ?>
            >
                Puppy
            </option>
            <option value="kitty" 
            <?php echo ($puppy_or_kitty == 'kitty') ? 'selected' : ''; ?>
            >
                Kitty
            </option>
            <option value="random" 
            <?php echo ($puppy_or_kitty == 'random') ? 'selected' : ''; ?>
            >
                Random
            </option>

        </select>
        <div style="margin-top: 5px;"></div>
<?php
    }
}
