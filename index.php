<?php 
    include_once('config.php');
    include_once('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Todo App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="container">
        <form action="process.php" method="POST">
            <div class="todo-table">
                <h1>My Todo's</h1>
                <h6><?php 
                            $sql = "SELECT * FROM todos";
                            $result = mysqli_query($db,$sql);
                            $todos = mysqli_fetch_all($result);
                            $total = count($todos);
                            $complete = 0;
                            //mysqli_bind_param()
                            foreach($todos as $todo){

                                if($todo[2]==true){
                                    $complete++;
                                }
                            }
                            echo $total." Total, ".$complete." Complete,".($total-$complete)." Pending.";
                        ?>
                </h6>
                <div class="btn-holder">
                    <a href="add-todo.html" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Todo</a>
                    <button name="action" value="edit" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit Todo</button>
                    <button name="action" value="delete" class="btn btn-danger"><i class="fa fa-times"></i> Delete Todo</button>
                    <button name="action" value="complete" class="btn btn-purple"><i class="fa fa-thumbs-up"></i> Mark Complete</button>
                    <button name="action" value="pending" class="btn btn-orange"><i class="fa fa-thumbs-down"></i> Mark Pending</button>
                </div>
                <p style="margin-top: 10px;">
                    <?php if(!empty($_GET['error'])) echo "Error : ".$_GET['error']; ?>
                    <?php if(!empty($_GET['success'])) echo "Success : ".$_GET['success']; ?>
                </p>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Todo Title</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($todos as $todo){
                        ?>
                            <tr class="<?php echo $todo[2]?'complete':''; ?>">
                                <td><input  type="radio" required name="todo" value="<?php echo $todo[0]; ?>" id=""></td>
                                <td><?php echo $todo[1]; ?></td>
                                <td><?php echo $todo[2]?'Complete':'Pending'; ?></td>
                            </tr>
                        <?php } ?>
                       
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>
</html>