<?php 

require_once('./DBInterfaceRow.php');
require_once('./DBConnection.php');

/**
 * @property array $segments
 * @property mysqli $mysqli
 */
class DBGetSegmentData{
    public array $rows;
    public mysqli $mysqli;
    public $file_id;

    public function go($file_id) 
    {
        $this->file_id = $file_id;
        $conn = new DBConnection();
        $sql = "SELECT * FROM rows_data";
        $result = $conn->mysqli->query($sql);
        return $this->reponse_to_interface($result);
    }

    private function reponse_to_interface($response)
    {
        while($row = $response->fetch_assoc()) {
            if ($this->file_id == $row['file_id']){
                $tempvar = new DBInterfaceSegment($row['id'],$row['file_id'],$row['number'],$row['font_weight'],$row['font_size'],$row['horizontal_alignment']);
                if (empty($this->rows)){
                    $this->rows = array($tempvar);
                }
                else{
                    array_push($this->rows, $tempvar);
                }
            }
        }
        return $tempvar;
    }
}
?>

