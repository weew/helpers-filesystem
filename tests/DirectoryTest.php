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
        $this->assertEquals([], directory_list('yada'));
        $this->assertEquals(['dir_1', 'dir_2', 'dir_3'], directory_list(self::getDir()));
        directory_delete(self::getDir());
        $this->assertFalse(directory_exists(self::getDir()));
        $this->assertEquals('dir1', directory_get_name($dir1));
        $this->assertEquals(
            self::getDir() . '/dir_1', directory_get_parent($dir1)
        );
    }
}
