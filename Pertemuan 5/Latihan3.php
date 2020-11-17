<html>
    <head>
        <title>Variabel Static</title>
    </head>
    <body>
        <h1>Variabel Static</h1>
        <?php
            Function test(){
                Static $a = 0; // dengan static
                echo "Nilai a : ";
                echo $a;
                echo "<br>";
                $a++;
            }
            
            test();
            test();
            test();
            test();
            test();
        ?>
    </body>
</html>