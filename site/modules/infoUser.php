<!--Affiche les infos sur l utilisateur-->

<section class = 'info_user'>
<?php 
if(isset($_SESSION['username'])){// ne s'affiche que si l'utilisateur est connecte
	echo "
        <h2 id = 'username'>".$_SESSION['username']." </h2>
            <ul id = 'options_user'>
                <li><a href = '\cherubim\site\login\disconnect.php'>Se deconnecter</a>
                <li><a href = '\cherubim\site\user\interface.php'>Interface utilisateur</a>
            </ul>";
}
else{
    echo "
        <h2 id = 'username'>Se connecter</h2>
        <ul id = 'options_user'>
            <li><a href='\cherubim\site\login\login.php'>Se connecter</a>
            <li><a href='\cherubim\site\\register\\register.php'>Creer un compte</a>
        <ul>";
}
?>
</section>