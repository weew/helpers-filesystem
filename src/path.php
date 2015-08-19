<?php

if ( ! function_exists('path')) {
    /**
     * @param $paths
     *
     * @return string
     */
    function path($paths) {
        if ( ! is_array($paths)) {
            $paths = func_get_args();
        }

        $path = implode(DIRECTORY_SEPARATOR, $paths);
        $path = preg_replace(
            '#' . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . '+#',
            DIRECTORY_SEPARATOR,
            $path
        );
        $path = preg_replace('#([' . DIRECTORY_SEPARATOR . ']+$)#', '', $path);

        return $path;
    }
}
