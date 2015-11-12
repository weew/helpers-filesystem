<?php

if ( ! function_exists('file_get_directory')) {
    /**
     * Get name of the file's directory.
     *
     * @param $path
     *
     * @return mixed
     */
    function file_get_directory($path) {
        return pathinfo($path, PATHINFO_DIRNAME);
    }
}

if ( ! function_exists('file_get_extension')) {
    /**
     * Get name of the file's directory.
     *
     * @param $path
     *
     * @return mixed
     */
    function file_get_extension($path) {
        return pathinfo($path, PATHINFO_EXTENSION);
    }
}

if ( ! function_exists('file_get_name')) {
    /**
     * Get name of the file's directory.
     *
     * @param $path
     *
     * @return mixed
     */
    function file_get_name($path) {
        return pathinfo($path, PATHINFO_BASENAME);
    }
}

if ( ! function_exists('file_read')) {
    /**
     * Read contents of a file.
     *
     * @param $path
     *
     * @return string
     */
    function file_read($path) {
        return file_get_contents($path);
    }
}

if ( ! function_exists('file_create')) {
    /**
     * Create a file and all necessary subdirectories.
     *
     * @param $path
     *
     * @return bool
     */
    function file_create($path) {
        if ( ! file_exists($path)) {
            $dir = file_get_directory($path);

            if ( ! is_dir($dir)) {
                directory_create($dir);
            }

            return file_put_contents($path, '') !== false;
        }

        return true;
    }
}

if ( ! function_exists('file_write')) {
    /**
     * Write to a file.
     *
     * @param $path
     * @param $content
     *
     * @return bool
     */
    function file_write($path, $content) {
        return file_put_contents($path, $content) !== false;
    }
}

if ( ! function_exists('file_append')) {
    /**
     * Append contents to the end of file.
     *
     * @param $path
     * @param $content
     *
     * @return bool
     */
    function file_append($path, $content) {
        if (file_exists($path)) {
            return file_write($path, file_read($path) . $content);
        }

        return file_write($path, $content);
    }
}

if ( ! function_exists('file_prepend')) {
    /**
     * Prepend contents to the beginning of file.
     *
     * @param $path
     * @param $content
     *
     * @return bool
     */
    function file_prepend($path, $content) {
        if (file_exists($path)) {
            return file_write($path, $content . file_read($path));
        }

        return file_write($path, $content);
    }
}

if ( ! function_exists('file_delete')) {
    /**
     * Delete a file.
     *
     * @param $path
     *
     * @return bool
     */
    function file_delete($path) {
        if (file_exists($path)) {
            return unlink($path);
        }

        return true;
    }
}

if ( ! function_exists('file_move')) {
    /**
     * Move a file from one location to another and
     * create all necessary subdirectories.
     *
     * @param $oldPath
     * @param $newPath
     *
     * @return bool
     */
    function file_move($oldPath, $newPath) {
        $dir = file_get_directory($newPath);

        if ( ! directory_exists($dir)) {
            directory_create($dir);
        }

        return rename($oldPath, $newPath);
    }
}

if ( ! function_exists('file_copy')) {
    /**
     * Copy a file from one location to another
     * and create all necessary subdirectories.
     *
     * @param $oldPath
     * @param $newPath
     *
     * @return bool
     */
    function file_copy($oldPath, $newPath) {
        $dir = file_get_directory($newPath);

        if ( ! directory_exists($dir)) {
            directory_create($dir);
        }

        return copy($oldPath, $newPath);
    }
}

if ( ! function_exists('file_rename')) {
    /**
     * Rename file at the given path.
     *
     * @param $path
     * @param $newName
     *
     * @return bool
     */
    function file_rename($path, $newName) {
        $newPath = path(file_get_directory($path), $newName);

        return rename($path, $newPath);
    }
}
