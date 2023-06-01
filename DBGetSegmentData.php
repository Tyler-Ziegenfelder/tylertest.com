<?php 

require_once('./DBInterfaceSegment.php');
require_once('./DBConnection.php');

/**
 * @property array $segments
 * @property mysqli $mysqli
 */
class DBGetSegmentData{
    public array $segments;
    public mysqli $mysqli;
    public $row_id;

    public function go($row_id) 
    {
        $this->row_id = $row_id;
        $conn = new DBConnection();
        $sql = "SELECT * FROM segments";
        $result = $conn->mysqli->query($sql);
        return $this->reponse_to_interface($result);
    }

    private function reponse_to_interface($response)
    {
        while($row = $response->fetch_assoc()) {
            if ($this->row_id == $row['row_id']){
                $tempvar = new DBInterfaceSegment($row['id'],$row['row_id'],$row['number'],$row['foreground_color'],$row['background_color'],$row['flash'],$row['text']);
                if (empty($this->segments)){
                    $this->segments = array($tempvar);
                }
                else{
                    array_push($this->segments, $tempvar);
                }
            }
        }
        return $tempvar;
    }
}
?>

