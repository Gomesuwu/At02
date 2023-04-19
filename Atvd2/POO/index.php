<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once('classes/livro.class.php');
        //instanciar um objeto do tipo livro
        $livro1 = new Livro(1,'euu','tuu'); //construtor de objeto
        echo $livro1 ->imprimirLivro();
        echo "<br>";
        echo "<br>";
        print_r($livro1);
        //estado do objeto: *importante* é os dados que estão no objeto no momento.
    ?>
</body>
</html>