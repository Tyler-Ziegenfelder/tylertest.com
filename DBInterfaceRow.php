<?php
/**
 * data class for row table interface to application
 * 
 * @property string $id
 * @property string $file_id
 * @property int $number
 * @property string $font_weight
 * @property string $font_size
 * @property string $horizontal_alignment
 */
Class DBInterfaceRow{
    public string $id;
    public string $file_id;
    public int $number;
    public string $font_weight;
    public string $font_size;
    public string $horizontal_alignment;
    public function __construct(
        string $id = null,
        string $file_id = null,
        int $number = null,
        string $font_weight = null,
        string $font_size = null,
        string $horizontal_alignment = null,)
        {
        $this->id = $id;
        $this->file_id = $file_id;
        $this->number = $number;
        $this->font_weight = $font_weight;
        $this->font_size = $font_size;
        $this->horizontal_alignment = $horizontal_alignment;
    }
}
?>