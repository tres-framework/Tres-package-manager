<?php

/*
|------------------------------------------------------------------------------
| Manifest
|------------------------------------------------------------------------------
| 
| This file is used to register dependencies. Those dependencies will be 
| automatically loaded. 
| 
*/
return [
    
    /*
    |--------------------------------------------------------------------------
    | Namespaces
    |--------------------------------------------------------------------------
    | 
    | All namespaces should be registered here. Note that you do not have to 
    | be too specific. The files will be automatically be found when the first 
    | part of the namespace matches.
    | 
    | If there are multiple matches, only the first one will be loaded. If 
    | this becomes a problem, you should be more specific.
    | 
    | All items are as follows:
    | The (part of the) namespace => the matching directory
    | 
    */
    'namespaces' => [
        'app\controllers' => 'app/controllers',
        'Tres' => 'vendor/Tres',
        'John_Doe' => '/vendor/John_Doe',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Class aliases
    |--------------------------------------------------------------------------
    | 
    | If there is a certain class which might be used very often, it might be 
    | useful to give it an alias, so it's easier and faster to call it.
    | 
    | All items are as follows:
    | The alias => the original class name
    | 
    */
    'aliases' => [
        'alias\Name' => 'John_Doe\examples\ExampleClassOne',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Files
    |--------------------------------------------------------------------------
    | 
    | This is mainly used for loading functions, but also works for other 
    | files like an init/bootstrap file.
    | 
    */
    'files' => [
        'vendor/ircmaxell/lib/password.php',
    ],
    
];
