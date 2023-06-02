<?php
/**
 * data class for file table interface to application
 * 
 * @property string $id
 * @property string $hold_time
 * @property string $scroll_speed
 * @property string $vertical_alignment
 * @property string $mode
 */
Class DBInterfaceFile{
    public string $id;
    public string $hold_time;
    public string $scroll_speed;
    public string $vertical_alignment;
    public string $mode;
    public function __construct(
        string $id = null,
        string $hold_time = null,
        string $scroll_speed = null,
        string $vertical_alignment = null,
        string $mode = null,)
        {
        $this->id = $id;
        $this->hold_time = $hold_time;
        $this->scroll_speed = $scroll_speed;
        $this->vertical_alignment = $vertical_alignment;
        $this->mode = $mode;
    }
}
?>