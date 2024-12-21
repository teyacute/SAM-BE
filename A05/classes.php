<?php

class Island
{
    public $name;
    public $shortDescription;
    public $longDescription;
    public $contents = [];
    public $image;
    public $color;

    public function __construct($name, $shortDescription, $longDescription, $image, $color)
    {
        $this->name = $name;
        $this->shortDescription = $shortDescription;
        $this->longDescription = $longDescription;
        $this->image = $image;
        $this->color = $color;
    }

    public function addContent($content)
    {
        $this->contents[] = $content;
    }

    public function generateCard()
    {
        $contentHTML = '';
        foreach ($this->contents as $content) {
            $contentHTML .= '
                <div>
                    <img src="' . $content['image'] . '" alt="' . $content['description'] . '" style="width:100%">
                    <p>' . $content['description'] . '</p>
                </div>';
        }

        return '
            <div class="w3-col l3 m6 w3-margin-bottom" style="background-color:' . $this->color . ';">
                <div class="w3-card">
                    <img src="' . $this->image . '" alt="' . $this->name . '" style="width:100%">
                    <div class="w3-container">
                        <h3 class="text-center">' . $this->name . '</h3>
                        <p class="w3-opacity">' . $this->shortDescription . '</p>
                        <p>' . $this->longDescription . '</p>
                        <div>' . $contentHTML . '</div>
                    </div>
                </div>
            </div>';
    }
}



?>