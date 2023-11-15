<?php
function waiter(){
    insertT();
    deleteT();
    editT();
    HoldT();
}
    
function insertT(){
    if(!empty($_GET['items'])){
        $insert = new insert($_GET['items']);
        if($insert->insertTask()){
          echo '<div class=" col-md-9 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Task Inserted Succesfully!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        else{
          echo '<div class=" col-md-9 alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Task Insert Error</strong> .
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
      }

}
function deleteT(){
    if(!empty($_GET['delete'])){
        $delete = new delete($_GET['delete']);
        if($delete->deleteTask()){
          echo '<div class=" col-md-9 alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Task Deleted!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        else{
          echo '<div class=" col-md-9 alert alert-danger alert-dismissible fade show" role="alert">
          <strong> Deleted Task Error.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
      }

}
function editT(){
    if(!empty($_GET['edit'])){
        $edit = new edit($_GET['edit']);
        if($edit->editTask()){
          echo '<div class=" col-md-9 alert alert-info alert-dismissible fade show" role="alert">
          <strong>Task marked successfully </strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        else{
          echo '<div class=" col-md-9 alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Task Completion Error</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
    }
}
function HoldT(){
  if(!empty($_GET['reason'])){
      $hold = new hold($_GET['id'],$_GET['reason']);
      if($hold->HoldTask()){
        header('Location:index.php');
        echo '<div class=" col-md-9 alert alert-info alert-dismissible fade show" role="alert">
        <strong>Task Now On Hold.</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      else{
        echo '<div class=" col-md-9 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Task Failed </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
  }
}



function viewTable(){
    $view = new view();
    $view->viewData();
    $view->viewCompletedData();
    $view->viewHoldData();
}
?>