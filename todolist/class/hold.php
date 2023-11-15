<?php
class hold extends config{
    public $id;
    public $reason;

    public function __construct($id,$reason){
        $this->id = $id;
        $this->reason = $reason;
    }

    public function HoldTask(){
        $con = $this->con();
        $sql = "UPDATE `tbl_todolist` SET `status`='ON HOLD',`reason`= '$this->reason' WHERE `id`='$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }
        else{
            return false;
        }

    }
}
?>