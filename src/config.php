<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Default timestamp option
    |--------------------------------------------------------------------------
    |
    | If set to 'false' then no timestamp will be added at the end of file name.
    | It is possible to change the timestamp format.
    | This value can be overridden when calling the function.
    |
    */
    'timestamp' => 'Y-m-d-His',
    
    /*
    |--------------------------------------------------------------------------
    | Default file name length option
    |--------------------------------------------------------------------------
    |
    | If set to 'false' then by default first 225 characters will be used.
    | This value can be overridden when calling the function.
    |
    */
    'limit' => 225,
    
    /*
    |--------------------------------------------------------------------------
    | Default timestamp option
    |--------------------------------------------------------------------------
    |
    | If set to 'true' then special charachters will be removed from the file name.
    | This value can be overridden when calling the function.
    |
    */
    'slugify' => true,
    
    /*
    |--------------------------------------------------------------------------
    | Default file word separator option
    |--------------------------------------------------------------------------
    |
    | If set then it will be used as separator between file name words
    | This value can be overridden when calling the function.
    |
    */
    'separator' => '-',
    
    /*
    |--------------------------------------------------------------------------
    | Default file name case option
    |--------------------------------------------------------------------------
    |
    | If set to 'true' then file name will be in uppercase else lowercase
    | This value can be overridden when calling the function.
    |
    */
    'uppercase' => false
    
];