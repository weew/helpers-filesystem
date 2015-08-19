<?php

class FileTest extends PHPUnit_Framework_TestCase {
    public static function getDir() {
        return __DIR__ . '/tmp_file';
    }

    public static function setUpBeforeClass() {
        mkdir(self::getDir());
    }

    public static function tearDownAfterClass() {
        exec(sprintf('rm -rf %s', self::getDir()));
    }

    public function test_file() {
        $file1 = self::getDir() . '/dir1/foo.txt';
        $file2 = self::getDir() . '/dir2/bar.txt';
        $file3 = self::getDir() . '/dir2/baz.txt';
        $file3_name = 'baz.txt';
        $file4 = self::getDir() . '/dir4/yolo.txt';

        $this->assertFalse(file_exists($file1));
        file_create($file1);
        file_create($file1);
        $this->assertTrue(file_exists($file1));
        $this->assertEquals('', file_read($file1));
        file_write($file1, 'foo');
        $this->assertEquals('foo', file_read($file1));
        file_append($file1, '_bar');
        $this->assertEquals('foo_bar', file_read($file1));
        file_prepend($file1, '#');
        $this->assertEquals('#foo_bar', file_read($file1));
        file_append($file1, '_bar');
        file_prepend($file1, '#');
        $this->assertEquals('##foo_bar_bar', file_read($file1));

        file_append($file1 . '_append', '_bar');
        $this->assertEquals(file_read($file1 . '_append'), '_bar');
        file_prepend($file1 . '_prepend', '#');
        $this->assertEquals(file_read($file1 . '_prepend'), '#');

        $this->assertFalse(file_exists($file2));
        file_copy($file1, $file2);
        $this->assertTrue(file_exists($file2));
        $this->assertEquals(file_read($file1), file_read($file2));
        $this->assertFalse(file_exists($file3));
        file_rename($file2, $file3_name);
        $this->assertFalse(file_exists($file2));
        $this->assertTrue(file_exists($file3));
        $this->assertEquals(file_read($file1), file_read($file3));
        $this->assertFalse(file_exists($file4));
        file_move($file3, $file4);
        $this->assertFalse(file_exists($file3));
        $this->assertTrue(file_exists($file4));
        $this->assertEquals(file_read($file1), file_read($file4));
        file_delete($file4);
        file_delete($file4);
        $this->assertFalse(file_exists($file4));
        $this->assertEquals(
            self::getDir() . '/dir1', file_get_directory($file1)
        );
        $this->assertEquals('txt', file_get_extension($file1));
        $this->assertEquals('foo.txt', file_get_name($file1));
    }
}
