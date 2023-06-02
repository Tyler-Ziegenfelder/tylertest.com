<?php 

require_once('./DBInterfaceFile.php');
require_once('./DBConnection.php');

/**
 * @property array $files
 * @property mysqli $mysqli
 */
class DBGetFileData{
    public array $files;
    public mysqli $mysqli;
    public $id;

    public function go() 
    {
        $conn = new DBConnection();
        $sql = "SELECT * FROM current_file";
        $current_file = $conn->mysqli->query($sql)->fetch_assoc();
        $this->id = $current_file['id'];
        $sql = "SELECT * FROM files";
        $result = $conn->mysqli->query($sql);
        return $this->reponse_to_interface($result);
    }

    private function reponse_to_interface($response)
    {
        while($row = $response->fetch_assoc()) {
            if ($this->id == $row['id']){
                $tempvar = new DBInterfaceFile($row['id'],$row['hold_time'],$row['scroll_speed'],$row['vertical_alignment'],$row['mode']);
                if (empty($this->files)){
                    $this->files = array($tempvar);
                    break;
                }
            }
        }
        return $tempvar;
    }
}
?>

