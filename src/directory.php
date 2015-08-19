<?php

if ( ! function_exists('directory_get_name')) {
    /**
     * Get name of the file's directory.
     *
     * @param $path
     *
     * @return mixed
     */
    function directory_get_name($path) {
        return basename($path);
    }
}

if ( ! function_exists('directory_get_parent')) {
    /**
     * Get name of the file's directory.
     *
     * @param $path
     *
     * @return mixed
     */
    function directory_get_parent($path) {
        return dirname($path);
    }
}

if ( ! function_exists('directory_create')) {
    /**
     * Create a directory.
     *
     * @param $path
     * @param int $mode
     *
     * @return bool
     */
    function directory_create($path, $mode = 0777) {
        return mkdir($path, $mode, true);
    }
}

if ( ! function_exists('directory_delete')) {
    /**
     * Delete a directory.
     *
     * @param $path
     *
     * @return bool
     */
    function directory_delete($path) {
        if (directory_exists($path)) {
            $files = directory_list($path);

            foreach ($files as $file) {
                $filePath = path($path, $file);

                if (is_dir($filePath)) {
                    directory_delete($filePath);
                } else {
                    file_delete($filePath);
                }
            }

            return rmdir($path);
        } else {
            return file_delete($path);
        }
    }
}

if ( ! function_exists('directory_exists')) {
    /**
     * Check if a directory exists.
     *
     * @param $path
     *
     * @return bool
     */
    function directory_exists($path) {
        return is_dir($path);
    }
}

if ( ! function_exists('directory_rename')) {
    /**
     * Rename directory.
     *
     * @param $path
     * @param $newName
     *
     * @return bool
     */
    function directory_rename($path, $newName) {
        return file_rename($path, $newName);
    }
}

if ( ! function_exists('directory_move')) {
    /**
     * Move directory to the specified path.
     *
     * @param $oldPath
     * @param $newPath
     *
     * @return bool
     */
    function directory_move($oldPath, $newPath) {
        return file_move($oldPath, $newPath);
    }
}

if ( ! function_exists('directory_copy')) {
    /**
     * Copy directory to the specified path.
     *
     * @param $oldPath
     * @param $newPath
     *
     * @return bool
     */
    function directory_copy($oldPath, $newPath) {
        if (directory_exists($oldPath)) {
            if ( ! directory_exists($newPath)) {
                directory_create($newPath);
            }

            $files = directory_list($oldPath);

            foreach ($files as $file) {
                $oldFilePath = path($oldPath, $file);
                $newFilePath = path($newPath, $file);

                if (directory_exists($oldFilePath)) {
                    directory_copy($oldFilePath, $newFilePath);
                } else {
                    file_copy($oldFilePath, $newFilePath);
                }
            }
        } else {
            return file_copy($oldPath, $newPath);
        }
    }
}

if ( ! function_exists('directory_list')) {
    /**
     * Return a list of files and directories.
     *
     * @param $path
     *
     * @return array
     */
    function directory_list($path) {
        if ( ! directory_exists($path)) {
            return [];
        }

        return array_values(array_diff(scandir($path), ['.', '..']));
    }
}
