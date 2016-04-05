<?php

class DirectoryTest extends PHPUnit_Framework_TestCase {
    public static function getDir() {
        return __DIR__ . '/tmp_directory';
    }

    public static function setUpBeforeClass() {
        mkdir(self::getDir());
    }

    public static function tearDownAfterClass() {
        exec(sprintf('rm -rf %s', self::getDir()));
    }

    public function test_directory() {
        $dir1 = path(self::getDir(), 'dir_1/dir1');
        $dir1_file = path($dir1, 'foo.txt');
        $dir1_file_content = 'foo bar';
        $dir2 = path(self::getDir(), 'dir_2/dir2');
        $dir2_file = path($dir2, 'foo.txt');
        $dir3 = path(self::getDir(), 'dir_3/dir3');
        $dir3_file = path($dir3, 'foo.txt');
        $dir4 = path(self::getDir(), '/dir_3/dir-3');
        $dir4_name = 'dir-3';
        $dir4_file = path($dir4, 'foo.txt');

        $this->assertFalse(directory_exists($dir1));
        directory_create($dir1);
        file_write($dir1_file, $dir1_file_content);
        $this->assertTrue(directory_exists($dir1));
        $this->assertFalse(directory_exists($dir2));
        directory_create(path($dir1, 'yolo'));
        directory_copy($dir1_file, $dir2);
        directory_delete($dir2);
        directory_copy($dir1, $dir2);
        $this->assertTrue(file_exists($dir2_file));
        $this->assertEquals(file_read($dir1_file), file_read($dir2_file));
        $this->assertFalse(directory_exists($dir3));
        directory_move($dir2, $dir3);
        $this->assertFalse(directory_exists($dir2));
        $this->assertTrue(directory_exists($dir3));
        $this->assertTrue(file_exists($dir3_file));
        $this->assertEquals(file_read($dir1_file), file_read($dir3_file));
        $this->assertFalse(directory_exists($dir4));
        directory_rename($dir3, $dir4_name);
        $this->assertTrue(directory_exists($dir4));
        $this->assertFalse(directory_exists($dir3));
        $this->assertTrue(file_exists($dir4_file));
        $this->assertEquals(file_read($dir1_file), file_read($dir4_file));
        $this->assertEquals(['foo.txt', 'yolo'], directory_list($dir1));
        $this->assertEquals([path($dir1, 'foo.txt'), path($dir1, 'yolo')], directory_list($dir1, true));
        $this->assertEquals([], directory_list('yada'));
        $this->assertEquals(['dir_1', 'dir_2', 'dir_3'], directory_list(self::getDir()));
        directory_delete(self::getDir());
        $this->assertFalse(directory_exists(self::getDir()));
        $this->assertEquals('dir1', directory_get_name($dir1));
        $this->assertEquals(
            self::getDir() . '/dir_1', directory_get_parent($dir1)
        );
    }

    public function test_directory_list_files_and_directories() {
        $dir = path(self::getDir(), 'list');
        file_create(path($dir, 'foo'));
        file_create(path($dir, 'bar'));
        directory_create(path($dir, 'yolo'));
        directory_create(path($dir, 'swag'));
        $this->assertEquals(['bar', 'foo'], directory_list_files($dir));
        $this->assertEquals(
            [path($dir, 'bar'), path($dir, 'foo')],
            directory_list_files($dir, true)
        );
        $this->assertEquals(['swag', 'yolo'], directory_list_directories($dir));
        $this->assertEquals([path($dir, 'swag'), path($dir, 'yolo')], directory_list_directories($dir, true));
    }

    public function test_directory_clear() {
        directory_create(self::getDir() . '/another_dir');
        file_create(self::getDir() . '/another_file.txt');

        $this->assertTrue(count(directory_list(self::getDir())) > 0);

        directory_clear(self::getDir());
        $this->assertEquals(0, count(directory_list(self::getDir())));
    }

    public function test_directory_create_checks_if_directory_already_exists() {
        $this->assertTrue(directory_create('/tmp'));
    }
}
