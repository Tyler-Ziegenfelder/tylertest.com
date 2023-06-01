<?php
/**
 * data class for segments table interface to application
 * 
 * @property string $id
 * @property string $row_id
 * @property int $number
 * @property string $foreground_color
 * @property string $background_color
 * @property string $flash
 * @property string $text
 */
Class DBInterfaceSegment{
    public string $id;
    public string $row_id;
    public int $number;
    public string $foreground_color;
    public string $background_color;
    public string $flash;
    public string $text;
    public function __construct(
        string $id = null,
        string $row_id = null,
        int $number = null,
        string $foreground_color = null,
        string $background_color = null,
        string $flash = null,
        string $text = null)
        {
        $this->id = $id;
        $this->row_id = $row_id;
        $this->number = $number;
        $this->foreground_color = $foreground_color;
        $this->background_color = $background_color;
        $this->flash = $flash;
        $this->text = $text;
    }
}
?>