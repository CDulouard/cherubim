<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../CSS/style.css" />
        <title>Projet CHERUBIM</title>
    </head>

    <body>
    	<header>
        	<h1>Projet CHERUBIM</h1>
        </header>
        
        <?php 
        
        if(isset($_SESSION['username'])){// ne s'affiche que si l'utilisateur est connecte
            echo "
                <section id = 'info_user'>
                    <h1 id = 'username'>
                    ".$_SESSION['username']."
                    </h1>
                    
                    <ul id = 'options user'>
                        <li><a href = 'login/disconnect.php'>Se deconnecter</a>
                        <li><a href = 'user/interface.php'>Interface utilisateur</a>
                    </ul>

                </section>";
        }
        else{
            echo "
                <section id = 'info_user'>
                    <ul id = 'options user'>
                        <li><a href='login/login.php'>Se connecter</a>
                        <li><a href='register/register.php'>Creer un compte</a>
                    <ul>

                </section>";
        }

        ?>
        

        <nav>
	    	<ul>
     			<li><a href="#">Accueil</a></li>
        		<li><a href="#">Histoire</a></li>
        		<li><a href="characters/characters_list.php">Personnage</a></li>
        		<li><a href="#">Contact</a></li>
        	</ul>
        	<form>
        	<input type="search" name="q" placeholder="Rechercher">
        		<input type="submit" value="Lancer !">
        	</form>
    	</nav>
        <main>
        	<article>
        		<h2>Synospis</h2>
        		<p>AON 2077. La grande guerre est finit depuis 20 ans. Les grandes puissances se sont effondrées et de nouvelles ont pris leur place.</p>
        		<p>C'est dans la fondation de cette nation que se cache certains secrets sombres d'avant guerre. Bâtie avec les anciennes nations Océaniennes suite à l'effondrement du Commonwealth et sur la volonté d'unification des cultures, cette organisation est devenu l'une des puissances les plus respectées depuis la fin de la guerre.</p>
        		<p>Toutefois, la militarisation extrême des autres puissances força l'Alliance of Oceanian Nation à développer des technologies de combats défensives et de riposte.</p>
        		<p>C'est avec l'arrivé d'une machine oubliée venant d'ailleurs qui va révéler les mystères de sa fondation, ainsi que ceux des horreurs engendrés par la guerre et de ceux qui en sont responsables.</p>
        	</article>
        	<article>
        		<h2>CHERUBIM</h2>
        		<p>Créés peu avant la grande guerre afin de protéger l'un des plus grands exploits scientifiques accomplis par l'humanité, ce sont parmi les machines les plus redoutables et les plus dangeureuses que la science ait créé.</p>
        		<p>Mais depuis peu, un signal force les machines à quitter la base une à une. Trois sont déjà parties sans ne jamais revenir, leur sort inconnu.</p>
        		<p>C'est suite à ce signal qu'un autre CHERUBIM reçoit une nouvelle instruction qui va le plonger dans la réalité distordue d'un univers incertain.</p>
        	</article>
        </main>
        <aside>
        	<p>Synopsis</p>
        	<p>CHERUBIM</p>
        </aside>
        <footer>
        	<p>©Copyright 2077 BrumeHumanite. Tous droits reversés.</p>
        </footer>
    </body>
</html>