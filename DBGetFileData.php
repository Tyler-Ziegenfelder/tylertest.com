<?php 

require_once('./DBInterfaceFile.php');
require_once('./DBConnection.php');

/**
 * @property array $files
 * @property mysqli $mysqli
 */
class DBGetSegmentData{
    public array $files;
    public mysqli $mysqli;
    public $id;

    public function go($id) 
    {
        $this->id = $id;
        $conn = new DBConnection();
        $sql = "SELECT * FROM files";
        $result = $conn->mysqli->query($sql);
        return $this->reponse_to_interface($result);
    }

    private function reponse_to_interface($response)
    {
        while($row = $response->fetch_assoc()) {
            if ($this->id == $row['id']){
                $tempvar = new DBInterfaceSegment($row['id'],$row['hold_time'],$row['scroll_speed'],$row['vertical'],$row['mode']);
                if (empty($this->files)){
                    $this->files = array($tempvar);
                }
                else{
                    array_push($this->files, $tempvar);
                }
            }
        }
        return $tempvar;
    }
}
?>

