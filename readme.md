# Filesystem helpers

[![Build Status](https://img.shields.io/travis/weew/helpers-filesystem.svg)](https://travis-ci.org/weew/helpers-filesystem)
[![Test Coverage](https://img.shields.io/coveralls/weew/helpers-filesystem.svg)](https://coveralls.io/github/weew/helpers-filesystem)
[![Version](https://img.shields.io/packagist/v/weew/helpers-filesystem.svg)](https://packagist.org/packages/weew/helpers-filesystem)
[![Licence](https://img.shields.io/packagist/l/weew/helpers-filesystem.svg)](https://packagist.org/packages/weew/helpers-filesystem)

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
    - [directory\_clear](#directory_clear)
    - [directory\_list](#directory_list)
    - [directory\_list\_files](#directory_list_files)
    - [directory\_list\_directories](#directory_list_directories)

## Installation

`composer require weew/helpers-filesystem`

## Introduction

This tiny library provides various helper functions to deal with files and directories in a concise and easy way.

## Functions

#### file\_get\_directory

 Get name of the file's directory.

 `string file_get_directory(string $path)`

#### file\_get\_extension

Get name of the file's directory.

`string file_get_extension(string $path)`

#### file\_get\_name

Get name of the file's directory.

`string file_get_name(string $path)`

#### file\_read

Read contents of a file.

`mixed file_read(string $path)`

#### file\_create

Create a file and all necessary subdirectories.

`bool file_create(string $path)`

#### file\_write

Write to a file.

`bool file_write(string $path, string $content)`

#### file\_append

Append contents to the end of file.

`bool file_append(string $path, string $content)`

#### file\_prepend

Prepend contents to the beginning of file.

`bool file_prepend(string $path, string content)`

#### file\_delete

Delete a file.

`bool file_delete(string $path)`

#### file\_rename

Move a file from one location to another and create all necessary subdirectories.

`bool file_rename(string $oldPath, string $newPath)`

#### file\_copy

Copy a file from one location to another and create all necessary subdirectories.

`bool file_copy(string $oldPath, string $newPath)`

#### file\_rename

Rename file at the given path.

`bool file_rename(string $path, $newName)`

#### directory\_get\_name

Get name of the file's directory.

`string directory_get_name(string $path)`

#### directory\_get\_parent

Get path of the parent directory.

`string directory_get_parent(string $path)`

#### directory\_create

Create a directory and all subdirectories.

`bool directory_create(string $path [, $mode = 0777])`

#### directory\_delete

Delete a directory and all of its files.

`bool directory_delete(string $path)`

#### directory\_exists

Check if a directory exists.

`bool directory_exists(string $path)`

#### directory\_rename

Rename a directory.

`bool directory_rename(string $path, string $newName)`

#### directory\_move

Move directory to the specified path.

`bool directory_move(string $oldPath, string $newPath)`

#### directory\_copy

Copy a directory and all of its contents to the specified path and create all necessary subdirectories.

`bool directory_copy(string $oldPath, string $newPath)`

#### directory\_clear

Delete all files and directories inside a directory.

`directory_clear(string $path)`

#### directory\_list

Return a list of files and directories. `$absolute` indicates whether the paths should be relative or absolute.

`string[] directory_list(string $path [, $absolute = false])`

#### directory\_list\_files

Return a list of files. `$absolute` indicates whether the paths should be relative or absolute.

`string[] directory_list_files(string $path [, $absolute = false])`

#### directory\_list\_directories

Return a list of directories. `$absolute` indicates whether the paths should be relative or absolute.

`string[] directory_list_directories(string $path [, $absolute = false])`
