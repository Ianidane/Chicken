<?php
class Chicken
{
    public function ChickenASCII()
    {
        if (isset($argv[1]) && strlen($argv[1])) {
            //If a image file was passed through the interpreter at execution.
            $Chicken = $argv[1];
        } else {
            //No image file was passed through the interpreter at execution. Use one included.
            $Chicken = "Images/chick.png";
        }
        //Pull image stream from supplied image.
        $img = imagecreatefromstring(file_get_contents($Chicken));
        //Set width and height for image based from supplied image.
        list($width, $height) = getimagesize($Chicken);
        //Scale the new ASCII art image larger or smaller.
        $scale = 10;
        //Define the characters to be used in the ASCII art image.
        $chars = array(
            ' ', '\'', '.', ':',
            '|', 'T',  'X', '0',
            '#',
        );
        $chars = array_reverse($chars);
        $c_count = count($chars);
        for ($y = 0; $y <= $height - $scale - 1; $y += $scale) {
            for ($x = 0; $x <= $width - ($scale / 2) - 1; $x += ($scale / 2)) {
                //Samples the pixle color and saturation and assigns a character for it.
                $rgb = imagecolorat($img, $x, $y);
                $r = (($rgb >> 16) & 0xFF);
                $g = (($rgb >> 8) & 0xFF);
                $b = ($rgb & 0xFF);
                $sat = ($r + $g + $b) / (255 * 3);
                echo $chars[ (int)($sat * ($c_count - 1)) ];
            }
            echo PHP_EOL;
        }
    }
}

?>