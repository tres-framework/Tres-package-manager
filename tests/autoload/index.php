<?php

use Tres\package_manager\Autoloader;

require_once('../../src/Tres/package_manager/Autoloader.php');

$manifest = require('manifest.php');
$autoload = new Autoloader(__DIR__, $manifest);

echo John_Doe\examples\ExampleClassOne::sayHello();
echo alias\Name::sayHello();
(new app\controllers\ExampleController);
echo password_hash('secure hash', PASSWORD_BCRYPT).'<br />';
