<?php
use PHPUnit\Framework\TestCase;

class FileIsAImageTest extends TestCase
{
    public function testImageFile()
    {
        $type=exif_imagetype('../Images/chick.png');
        $this->assertTrue($type!==false);
        $this->assertEquals(IMAGETYPE_PNG, $type);
    }
}
?>