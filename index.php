<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php require_once"src/nav.php"?>
<?php
if(isset($_POST['prenom'])&& isset($_POST['nom'])){
    $prenom= filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_SPECIAL_CHARS);
    $nom= filter_input(INPUT_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS);


    echo'bonjour '.$prenom.' '.$nom;
}
echo'<form action="" method="post">

<input type="text"name="prenom" >
<input type="text" name="nom">
<button type="submit">Envoyer</button>


</form>'
?>
faille Xss!

<?php
if(isset($_FILES['image'])&& $_FILES['image']['error']==0){
    if($_FILES['image']['size']<=3000000){
        $infoImage=pathinfo(
            $_FILES['image']['name']);
            $extensionImage=$infoImage['extension'];
        $extensionArrray=['png','gif','jpg','jpeg'];
        if(in_array($extensionImage,$extensionArrray)){

            move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.time().rand().'.'.$extensionImage
        );
        echo'envois bien reussi';

        }

      
    }

}




echo'<form action="" method="POST"
enctype="multipart/form-data">
<p>
<h1>formulaire<h1>
<input type="file" name="image">
<p><button type="submit">Envoyer</button></p>


</p>

</form>'
?>

<?php require_once"src/foot.php"?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>