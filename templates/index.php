<!Doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title> Task12 </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
    </head>
    <body>
        <form action="index.php" method="POST">
            <div class="panel panel-default">

                <!-- Default panel contents -->
                <div class="panel-heading">
                    MySQL
                    <p style="color:red"><?php echo $msgMy ?></p>
                </div>

                <!-- Table -->
                <table class="table">
                    <?php 
                    foreach($resultMy as $key => $value) 
                    {
                    ?> 
                        <tr>
                          <td style="width:20%">User01</td>
                          <td><?php echo $value ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                 </table>
            </div>
    
            <div class="btn-group" role="group" aria-label="..." style="margin-bottom: 5%">
                <button type="submit" name="ButMy" value="Insert" class="btn btn-default">Insert</button>
                <button type="submit" name="ButMy" value="Update" class="btn btn-default">Update</button>
                <button type="submit" name="ButMy" value="Delete" class="btn btn-default">Delete</button>
            </div> 

            <div class="panel panel-default">

                <!-- Default panel contents -->
                <div class="panel-heading">
                    PgSql
                    <p style="color:red"><?php echo $msgPg ?></p>
                </div>
        
                <!-- Table -->
                <table class="table">
                    <?php 
                    foreach ($resultPg as $key => $value) 
                    {
                    ?> 
                        <tr>
                          <td style="width:20%">User01</td>
                          <td><?php echo $value ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
         
            <div class="btn-group" role="group" aria-label="..." style="margin-bottom: 5%">
                <button type="submit" name="ButPg" value="Insert" class="btn btn-default">Insert</button>
                <button type="submit" name="ButPg" value="Update" class="btn btn-default">Update</button>
                <button type="submit" name="ButPg" value="Delete" class="btn btn-default">Delete</button>
            </div> 
                                                                            
        </form>
    </body>
</html>
