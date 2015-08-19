<?php

class PathTest extends PHPUnit_Framework_TestCase {
    public function pathProvider() {
        return [
            ['/foo/bar/baz', ['///foo', '/bar////', 'baz////']],
            ['/foo/bar/baz', ['///foo//', '//bar/', '/baz/']]
        ];
    }

    /**
     * @dataProvider pathProvider
     */
    public function test_path($expected, $segments) {
        $this->assertEquals(
            $expected, call_user_func_array('path', $segments)
        );
        $this->assertEquals(
            $expected, path($segments)
        );
    }
}
