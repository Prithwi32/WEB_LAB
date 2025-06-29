<!DOCTYPE html>
<html>
<head>
   <title>Date</title>
   <style>
    h1 {
        text-align: center;
    }
    .date {
        color: green;
    }
   </style>
</head>
<body>
    <h1>Today's date is 
        <span class="date">
            <?php
                echo date("d-m-Y");
            ?>
        </span>
    </h1>
</body>
</html>
