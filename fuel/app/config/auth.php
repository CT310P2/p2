<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */
'always_load' => array(
    'packages' => array(
        'auth', 'orm',
    ),
),

return array(
    'driver'                 => 'Ormauth',
    'verify_multiple_logins' => false,
    'salt'                   => 'our_salt1996',
    'iterations'             => 10000,
);
