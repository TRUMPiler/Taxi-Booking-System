<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1 cellpacing=0 cellpadding=10>
        <tr>
            <td>name</td>
            <td>email</td>
            <td>maps</td>

        </tr>
        <?php 
        $i=1;
        require "connection.php";
        $query="select * from example";
        $row=mysqli_query($conn,$query);
        foreach($row as $rows):
        ?>
        <tr>
            <td><?php echo $rows["name"] ?></td>
            <td><?php echo $rows["email"]?></td>
            <td style="width: 450px;height:450px"><iframe src="https://www.google.com/maps?q=<?php echo $rows["lat"];?>,<?php echo $rows["longi"];?>&hl=es;z=14&output=embed" frameborder="0"></iframe></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>