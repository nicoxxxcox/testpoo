<?php

    // UTILITY FUNCTIONS

    /**
     * @param $path
     * @return string
     * @var string
     * @author Sven Arduwie
     */
    function get_absolute_path($path) {
        $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutes = array();
        foreach ($parts as $part) {
            if ('.' == $part) continue;
            if ('..' == $part) {
                array_pop($absolutes);
            } else {
                $absolutes[] = $part;
            }
        }
        return implode(DIRECTORY_SEPARATOR, $absolutes);
    }

    function router_base_path(){
     if(!empty(BASE_PATH)){
        $router->setBasePath(BASE_PATH);

     }   
    }


