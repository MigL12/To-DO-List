<?php
class view extends config{

    public function viewCompletedData(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_todolist` WHERE `status` = 'COMPLETED'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='mb=4'> Completed Task </h3>";
        echo "<table class='table table-success table-striped table-sm'>";
        echo "<thead>
                <tr>
                    <th>Task Item</th>
                    <th>Date Completed</th>
                </tr>
              </thead><tbody>";
        foreach ($result as $data){
            echo "<tr>";
            echo "<td>$data[item]</td>";
            echo "<td>$data[date_completed]</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    public function viewData(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_todolist` WHERE `status` = 'PENDING'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='mb=4'>Pending Task </h3>";
        echo "<table class='table table-dark table-striped table-sm'>";
        echo "<thead>
                <tr>
                    <th>Task Item</th>
                    <th>Action</th>
                </tr>
              </thead><tbody>";
        foreach ($result as $data){
            echo "<tr>";
            echo "<td>$data[item]</td>";
            echo "<td>
                  <a class='btn btn-info btn-sm' href='index.php?edit=$data[id]'>Mark as Completed</a>
                  <a class='btn btn-danger btn-sm' href='index.php?delete=$data[id]'>Delete Task</a>
                  <a class='btn btn-warning btn-sm' href='hold.php?hold=$data[id]'>On Hold</a>

                  </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
    public function viewHoldData(){
        $con = $this->con();
        $sql = "SELECT * FROM `tbl_todolist` WHERE `status` = 'ON HOLD'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='mb=4'> On Hold Task </h3>";
        echo "<table class='table table-warning table-striped table-sm'>";
        echo "<thead>
                <tr>
                    <th>Task Item</th>
                    <th>Reason</th>
                    <th>Action</th>
                </tr>
              </thead><tbody>";
        foreach ($result as $data){
            echo "<tr>";
            echo "<td>$data[item]</td>";
            echo "<td>$data[reason]</td>";
            echo "<td>
            <a class='btn btn-info btn-sm' href='index.php?edit=$data[id]'>Mark as Completed</a>
            <a class='btn btn-danger btn-sm' href='index.php?delete=$data[id]'>Delete Task</a>
            </td> ";
            
            
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    
}

?>