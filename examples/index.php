<?php

use Tres\package_manager\Autoload;

define('ROOT', dirname(__DIR__));

require_once(ROOT.'/src/Tres/package_manager/Autoload.php');

$manifest = require('manifest.php');
$autoload = new Autoload(ROOT.'/examples', $manifest);

echo John_Doe\examples\ExampleClassOne::sayHello();
echo alias\Name::sayHello();
(new app\controllers\ExampleController);
echo password_hash('secure hash', PASSWORD_BCRYPT).'<br />';
