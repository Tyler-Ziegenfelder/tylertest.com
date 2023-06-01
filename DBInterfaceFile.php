<?php
/**
 * data class for file table interface to application
 * 
 * @property string $id
 * @property int $hold_time
 * @property string $scroll_speed
 * @property string $vertical
 * @property string $mode
 */
Class DBInterfaceFile{
    public string $id;
    public int $hold_time;
    public string $scroll_speed;
    public string $vertical;
    public string $mode;
    public function __construct(
        string $id = null,
        int $hold_time = null,
        string $scroll_speed = null,
        string $vertical = null,
        string $mode = null,)
        {
        $this->id = $id;
        $this->hold_time = $hold_time;
        $this->scroll_speed = $scroll_speed;
        $this->vertical = $vertical;
        $this->mode = $mode;
    }
}
?>