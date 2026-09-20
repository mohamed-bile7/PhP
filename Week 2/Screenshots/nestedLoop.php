<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php
    //Nested Loop to print a multiplication table
    for($i= 1; $i<=3; ++$i){
        for($j= 1; $j<=5; ++$j){
            echo "Row is $i Column $j Result is ", $i*$j,"<br>";
        }
    }
    ?>

    
</body>
</html>