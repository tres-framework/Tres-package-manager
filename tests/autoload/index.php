<?php

use Tres\package_manager\Autoloader;

require_once('../../src/Tres/package_manager/Autoloader.php');

$manifest = require('manifest.php');
$autoloader = new Autoloader(__DIR__, $manifest);
$autoloader->addExtension('.cls.php');
$autoloader->addExtensions([
    '.class',
    '.class.php'
]);

echo John_Doe\examples\ExampleClassOne::sayHello();
echo alias\Name::sayHello();
(new app\controllers\ExampleController);
echo password_hash('secure hash', PASSWORD_BCRYPT).'<br />';

echo (new multi_extensions\Test1).'<br />';
echo (new multi_extensions\Test2).'<br />';
