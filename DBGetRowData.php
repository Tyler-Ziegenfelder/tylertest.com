<?php 

require_once('./DBInterfaceRow.php');
require_once('./DBConnection.php');

/**
 * @property array $row_data    
 * @property mysqli $mysqli
 */
class DBGetRowData{
    public array $row_data;
    public mysqli $mysqli;
    public $file_id;

    public function go($file_id) 
    {
        $this->file_id = $file_id;
        $conn = new DBConnection();
        $sql = "SELECT * FROM _rows";
        $result = $conn->mysqli->query($sql);
        return $this->reponse_to_interface($result);
    }

    private function reponse_to_interface($response)
    {
        while($row = $response->fetch_assoc()) {
            if ($this->file_id == $row['file_id']){
                $tempvar = new DBInterfaceRow($row['id'],$row['file_id'],$row['number'],$row['font_weight'],$row['font_size'],$row['horizontal_alignment']);
                if (empty($this->row_data)){
                    $this->row_data = array($tempvar);
                }
                else{
                    array_push($this->row_data, $tempvar);
                }
            }
        }
        return $tempvar;
    }
}
?>

