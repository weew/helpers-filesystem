# Filesystem helpers

[![Build Status](https://img.shields.io/travis/weew/php-helpers-file.svg)](https://travis-ci.org/weew/php-helpers-file)
[![Code Quality](https://img.shields.io/scrutinizer/g/weew/php-helpers-file.svg)](https://scrutinizer-ci.com/g/weew/php-helpers-file)
[![Test Coverage](https://img.shields.io/coveralls/weew/php-helpers-file.svg)](https://coveralls.io/github/weew/php-helpers-file)
[![Dependencies](https://img.shields.io/versioneye/d/php/weew:php-helpers-file.svg)](https://versioneye.com/php/weew:php-helpers-file)
[![Version](https://img.shields.io/packagist/v/weew/php-helpers-file.svg)](https://packagist.org/packages/weew/php-helpers-file)
[![Licence](https://img.shields.io/packagist/l/weew/php-helpers-file.svg)](https://packagist.org/packages/weew/php-helpers-file)

## Table of contents

- [Installation](#installation)
- [Introduction](#introduction)
- [Functions](#functions)
    - [file\_get\_directory](#file_get_directory)
    - [file\_get\_extension](#file_get_extension)
    - [file\_get\_name](#file_get_name)
    - [file\_read](#file_read)
    - [file\_create](#file_create)
    - [file\_write](#file_write)
    - [file\_append](#file_append)
    - [file\_prepend](#file_prepend)
    - [file\_delete](#file_delete)
    - [file\_move](#file_move)
    - [file\_copy](#file_copy)
    - [file\_rename](#file_rename)
    - [directory\_get\_name](#directory_get_name)
    - [directory\_get\_parent](#directory_get_parent)
    - [directory\_create](#directory_create)
    - [directory\_delete](#directory_delete)
    - [directory\_exists](#directory_exists)
    - [directory\_rename](#directory_rename)
    - [directory\_move](#directory_move)
    - [directory\_copy](#directory_copy)
    - [directory\_list](#directory_list)
    - [directory\_list\_files](#directory_list_files)
    - [directory\_list\_directories](#directory_list_directories)

## Installation

`composer require weew/php-helpers-files`

## Introduction

This tiny library provides various helper functions to deal with files and directories in a concise and easy way.

## Functions

#### `string file\_get\_directory(string $path)`

Get name of the file's directory.

#### `string file\_get\_extension(string $path)`

Get name of the file's directory.

#### `string file\_get\_name(string $path)`

Get name of the file's directory.

#### `mixed file\_read(string $path)`

Read contents of a file.

#### `bool file\_create(string $path)`

Create a file and all necessary subdirectories.

#### `bool file\_write(string $path, string $content)`

Write to a file.

#### `bool file\_append(string $path, string $content)`

Append contents to the end of file.

#### `bool file\_prepend(string $path, string content)`

Prepend contents to the beginning of file.

#### `bool file\_delete(string $path)`

Delete a file.

#### `bool file\_rename(string $oldPath, string $newPath)`

Move a file from one location to another and create all necessary subdirectories.

#### `bool file\_copy(string $oldPath, string $newPath)`

Copy a file from one location to another and create all necessary subdirectories.

#### `bool file\_rename(string $path, $newName)`

Rename file at the given path.

#### `string directory\_get\_name(string $path)`

Get name of the file's directory.

#### `string directory\_get\_parent(string $path)`

Get path of the parent directory.

#### `bool directory\_create(string $path [, $mode = 0777])`

Create a directory and all subdirectories.

#### `bool directory\_delete(string $path)`

Delete a directory and all of its files.

#### `bool directory\_exists(string $path)`

Check if a directory exists.

#### `bool directory\_rename(string $path, string $newName)`

Rename a directory.

#### `bool directory\_move(string $oldPath, string $newPath)`

Move directory to the specified path.

#### `bool directory\_copy(string $oldPath, string $newPath)`

Copy a directory and all of its contents to the specified path and create all necessary subdirectories.

#### `string[] directory\_list(string $path [, $absolute = false])`

Return a list of files and directories. `$absolute` indicates whether the paths should be relative or absolute.

#### `string[] directory\_list\_files(string $path [, $absolute = false])`

Return a list of files. `$absolute` indicates whether the paths should be relative or absolute.

#### `string[] directory\_list\_directories(string $path [, $absolute = false])`

Return a list of directories. `$absolute` indicates whether the paths should be relative or absolute.
