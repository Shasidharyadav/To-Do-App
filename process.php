<?php 

include_once('config.php');
include_once('database.php');


if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'add': 

            if(empty($_POST['title'])){
                header('Location: add-todo.html');
            }
            
            $sql = "INSERT INTO todos (`title`) VALUES ('".$_POST['title']."')";
            
            $result = mysqli_query($db, $sql);
            
            if($result !== false){
                
                header('Location: index.php?success=New todo added');
            }
            break;
        
        case 'delete':

            if(empty($_POST['todo'])){
                header('Location: index.php?error=Select atleast one todo');
            }
            
            $sql = "DELETE FROM todos WHERE id = ('".$_POST['todo']."')";
            
            $result = mysqli_query($db, $sql);
            
            if($result !== false){
                
                header('Location: index.php?success=Todo deleted');
            }
            break;
        
        case 'complete':

            if(empty($_POST['todo'])){
                header('Location: index.php?error=Select atleast one todo');
            }
            
            $sql = "UPDATE todos SET `status` = 1 WHERE id = ('".$_POST['todo']."')";
            
            $result = mysqli_query($db, $sql);
            
            if($result !== false){
                
                header('Location: index.php?success=Todo marked complete');
            }
            break;
        
        case 'pending':

            if(empty($_POST['todo'])){
                header('Location: index.php?error=Select atleast one todo');
            }
            
            $sql = "UPDATE todos SET `status` = 0 WHERE id = ('".$_POST['todo']."')";
            
            $result = mysqli_query($db, $sql);
            
            if($result !== false){
                
                header('Location: index.php?success=Todo marked pending');
            }
            break;
        
        case 'edited':

            if(empty($_POST['id'])){
                header('Location: index.php?error=Select atleast one todo');
            }
            
            $sql = "UPDATE todos SET `title` = '".$_POST['title']."' WHERE id = ('".$_POST['id']."')";
            
            $result = mysqli_query($db, $sql);
            
            if($result !== false){
                
                header('Location: index.php?success=Todo updated');
            }
            break;
        
        case 'edit':

            if(empty($_POST['todo'])){
                header('Location: index.php?error=Select atleast one todo');
            }
            
                
            header('Location: edit-todo.php?id='.$_POST['todo']);
            break;





    }


}
