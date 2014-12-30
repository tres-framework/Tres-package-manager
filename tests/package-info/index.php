<?php

use Tres\package_manager\Autoloader;
use Tres\package_manager\Package;

require_once('../../src/Tres/package_manager/Autoloader.php');

$manifest = require('manifest.php');
$autoload = new Autoloader(__DIR__, $manifest);

$pmPackage = new Package();
$testPackage = new Package('test.json');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <title>Package Info</title>
    </head>
    <body>
        <h1>Package Info</h1>
        
        <h2><?php echo $pmPackage->get('name'); ?> v<?php echo $pmPackage->get('version'); ?></h2>
        <p>
            Description: <em><?php echo $pmPackage->get('description_short'); ?></em><br />
            Website: <a href="<?php echo $pmPackage->get('website'); ?>">
                        <?php echo $pmPackage->get('website'); ?>
                     </a><br />
            Documentation: <a href="<?php echo $pmPackage->get('documentation'); ?>">
                               <?php echo $pmPackage->get('documentation'); ?>
                           </a><br />
            PHP version: <?php echo $pmPackage->get('dependencies')->php; ?><br />
            Contributors:
            <?php
            $contributors = '';
            
            foreach($pmPackage->get('contributors') as $contributor){
                $contributors .= $contributor->name;
                $contributors .= ' ('.$contributor->nickname.'), ';
            }
            
            echo rtrim($contributors, ', ');
            ?>
        </p>
        <?php echo $pmPackage->getDescriptionLong(Package::FORMAT_HTML); ?>
        <pre><?php echo print_r($pmPackage->getAll()); ?></pre>
        <hr />
        
        <h2><?php echo $testPackage->get('name'); ?> v<?php echo $testPackage->get('version'); ?></h2>
        <p>
            Description: <em><?php echo $testPackage->get('description_short'); ?></em><br />
            Website: <a href="<?php echo $testPackage->get('website'); ?>">
                        <?php echo $testPackage->get('website'); ?>
                     </a><br />
            Documentation: <a href="<?php echo $testPackage->get('documentation'); ?>">
                               <?php echo $testPackage->get('documentation'); ?>
                           </a><br />
            Contributors:
            <?php
            $contributors = '';
            
            foreach($testPackage->get('contributors') as $contributor){
                $contributors .= $contributor->name;
                $contributors .= ' ('.$contributor->nickname.'), ';
            }
            
            echo rtrim($contributors, ', ');
            ?>
        </p>
        <?php echo $testPackage->getDescriptionLong(); ?>
        <pre><?php echo print_r($testPackage->getAll()); ?></pre>
    </body>
</html>
