<?php

use Tres\package_manager\Autoload;
use Tres\package_manager\PackageData;

require_once('../../src/Tres/package_manager/Autoload.php');

$manifest = require('manifest.php');
$autoload = new Autoload(__DIR__, $manifest);

$pmPackageData = new PackageData();
$testPackageData = new PackageData('test.json');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <title>Package Info</title>
    </head>
    <body>
        <h1>Package Info</h1>
        
        <h2><?php echo $pmPackageData->get('name'); ?> v<?php echo $pmPackageData->get('version'); ?></h2>
        <p>
            Description: <em><?php echo $pmPackageData->get('description_short'); ?></em><br />
            Website: <a href="<?php echo $pmPackageData->get('website'); ?>">
                        <?php echo $pmPackageData->get('website'); ?>
                     </a><br />
            Documentation: <a href="<?php echo $pmPackageData->get('documentation'); ?>">
                               <?php echo $pmPackageData->get('documentation'); ?>
                           </a><br />
            PHP version: <?php echo $pmPackageData->get('dependencies')->php; ?><br />
            Contributors:
            <?php
            $contributors = '';
            
            foreach($pmPackageData->get('contributors') as $contributor){
                $contributors .= $contributor->name;
                $contributors .= ' ('.$contributor->nickname.'), ';
            }
            
            echo rtrim($contributors, ', ');
            ?>
        </p>
        <?php echo $pmPackageData->getDescriptionLong(PackageData::FORMAT_HTML); ?>
        <pre><?php echo print_r($pmPackageData->getAll()); ?></pre>
        <hr />
        
        <h2><?php echo $testPackageData->get('name'); ?> v<?php echo $testPackageData->get('version'); ?></h2>
        <p>
            Description: <em><?php echo $testPackageData->get('description_short'); ?></em><br />
            Website: <a href="<?php echo $testPackageData->get('website'); ?>">
                        <?php echo $testPackageData->get('website'); ?>
                     </a><br />
            Documentation: <a href="<?php echo $testPackageData->get('documentation'); ?>">
                               <?php echo $testPackageData->get('documentation'); ?>
                           </a><br />
            Contributors:
            <?php
            $contributors = '';
            
            foreach($testPackageData->get('contributors') as $contributor){
                $contributors .= $contributor->name;
                $contributors .= ' ('.$contributor->nickname.'), ';
            }
            
            echo rtrim($contributors, ', ');
            ?>
        </p>
        <?php echo $testPackageData->getDescriptionLong(); ?>
        <pre><?php echo print_r($testPackageData->getAll()); ?></pre>
    </body>
</html>
