<?php
/**
 * Setup autoloading for the tests.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Server
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://pear.horde.org/index.php?package=Kolab_Server
 */

if (!spl_autoload_functions()) {
    spl_autoload_register(
        create_function(
            '$class', 
            '$filename = str_replace(array(\'::\', \'_\'), \'/\', $class);'
            . '$err_mask = E_ALL ^ E_WARNING;'
            . '$oldErrorReporting = error_reporting($err_mask);'
            . '$included = include "$filename.php";'
            . 'error_reporting($oldErrorReporting);'
        )
    );
}

require_once dirname(__FILE__) . '/Scenario.php';