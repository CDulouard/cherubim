<!--Page principale du projet cherubim-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../CSS/accueil.css" />
        <title>Projet CHERUBIM</title>
    </head>

    <body>
    	<header>
        	<h1>Projet CHERUBIM</h1>
        </header>
        


        <section id="info">
            <?php include('../modules/infoUser.php');//affiche les infos utilisateur?>
            <?php include('../modules/menu.php');//affiche le menu?>
        </section>
        
        

        <main>
            <article>
                <h2>Synospis</h2>
                <p><img src="../../img/AON.png" class="imageflottante" alt="Image flottante" /> Alliance of Oceanian Nation 2077. La grande guerre est finit depuis 20 ans. Les grandes puissances se sont effondrées et de nouvelles ont pris leur place.
                <br />C'est dans la fondation de cette alliance que se cache certains secrets sombres d'avant guerre. Bâtie avec les anciennes nations Océaniennes suite à l'effondrement du Commonwealth et sur la volonté d'unification des cultures, cette organisation est devenu l'une des puissances les plus respectées depuis la fin de la guerre.
                <br />
                <br />Toutefois, la militarisation extrême des autres puissances força l'AON à développer des technologies de combats défensives et de riposte.
                <br />
                <br />C'est avec l'arrivé d'une machine oubliée venant d'ailleurs qui va révéler les mystères de sa fondation, ainsi que ceux des horreurs engendrées par la guerre et de ceux qui en sont responsables.</p>
            </article>
            <article>
                <h2 class="dessous">CHERUBIM</h2>
                <p>Créés peu avant la grande guerre afin de protéger l'un des plus grands exploits scientifiques accomplis par l'humanité, ce sont parmi les machines les plus redoutables et les plus dangeureuses que la science ait créé.
                <br />
                <br />Mais depuis peu, un signal force les machines à quitter la base une à une. Trois sont déjà parties sans ne jamais revenir, leur sort inconnu.
                <br />
                <br />C'est suite à ce signal qu'un autre CHERUBIM reçoit une nouvelle instruction qui va le plonger dans la réalité distordue d'un univers incertain.</p>
            </article>
        </main>
        <aside>
            <h3>Synopsis</h3>
            <h3>CHERUBIM</h3>
        </aside>
        <footer>
            <h4>©Copyright 2077 BrumeHumanite. Tous droits reversés.</h4>
        </footer>
    </body>
</html>