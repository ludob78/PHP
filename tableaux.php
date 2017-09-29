<?php
if (isset($_POST["animaux"])){
    $tableaux=$_POST["animaux"];
}
else{
    $tableaux="";
}
//ou
$tableaux=isset($_POST["animaux"])?$_POST["animaux"]:"";
echo "<br><br>";
//ou
isset($_POST["animaux"])?var_dump( $_POST["animaux"]):$res=false;
echo "<br><br>";

print_r($tableaux)."<br><br>";
//var_dump($tableaux);
echo "<br><br>";
$users=
    ["login" => "lbarjonnet",
        "password" => "test",
        "profession" => "DEV",
        "adresse" => [
                        "rue" =>"17 rue paul cézanne",
                        "cp" =>"78360",
                        "ville" =>"Montesson",
                    ]
    ];

var_dump($users);//afficher le code source pour lire le var_dump
echo "<br><br>";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="">Animaux de compagnie</label><br><br>
            <select name="animaux[]" id="" multiple="multiple">
                <option value="chien">Chien</option>
                <option value="chat">Chat</option>
                <option value="poissons">Poissons</option>
            </select>
            <br><br>
            <input type="submit" value="Valider">
        </div>
    </form>
<?php
if (!is_null($tableaux)||$tableaux!=""){
foreach ($tableaux as $line){
    echo $line."<br>";

}
}?>
</body>
</html>
