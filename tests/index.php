<?php

use Tres\package_manager\Autoload;

require_once('../src/Tres/package_manager/Autoload.php');

$manifest = require('manifest.php');
$autoload = new Autoload(__DIR__, $manifest);

echo John_Doe\examples\ExampleClassOne::sayHello();
echo alias\Name::sayHello();
(new app\controllers\ExampleController);
echo password_hash('secure hash', PASSWORD_BCRYPT).'<br />';
