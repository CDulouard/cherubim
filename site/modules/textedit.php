
<section>
<script src="/cherubim/js/textedit.js"></script>
<input type="button" value="G" style="font-weight: bold;" onclick="commande('bold');" />
        <input type="button" value="I" style="font-style: italic;" onclick="commande('italic');" />
        <input type="button" value="S" style="text-decoration: underline;" onclick="commande('underline');" />
        <input type="button" value="Lien" onclick="commande('createLink');" />
        
        <select onchange="commande('formatBlock', this.value); this.selectedIndex = 0;">
        	<option value="">Titre</option>
        	<option value="h1">h1</option>
        	<option value="h2">h2</option>
        	<option value="h3">h3</option>
        	<option value="h4">h4</option>
        	<option value="h5">h5</option>
        	<option value="h6">h6</option>
        </select> 

        <select onchange="commande(this.value); this.selectedIndex = 0;">
        	<option value="">Justification</option> <option value="justifyleft">justify left</option>
        	<option value="justifyright">justify right</option> <option value="justifycenter">justify center</option>
        	<option value="justifyfull">justify full</option>
       	</select> 

    	<select onchange="commande('foreColor', this.value); this.selectedIndex = 0;">
    		<option value="">Couleur</option>
    		<option value="black" style="color: black;">Noir</option>
    		<option value="aqua" style="color: aqua;">Cyan</option>
    		<option value="blue" style="color: blue;">Bleu</option>
    		<option value="fuchsia" style="color: fuchsia;">Fuchsia</option>
    		<option value="gray" style="color: gray;">Gris</option>
    		<option value="Green" style="color: green;">Vert</option>
    		<option value="lime" style="color: lime;">Lime</option>
    		<option value="maroon" style="color: maroon;">Maron</option>
    		<option value="navy" style="color: navy;">Bleu fonce</option>
    		<option value="olive" style="color: olive;">Olive</option>
    		<option value="Purple" style="color: purple;">Violet</option>
    		<option value="red" style="color: red;">Rouge</option>
    		<option value="silver" style="color: silver;">Argent</option>
    		<option value="teal" style="color: teal;">Turquoise</option>
    		<option value="white" style="color: white;">Blanc</option>
    		<option value="yellow" style="color: yellow;">Jaune</option>
    		<option value="snow" style="color: snow;">Neige</option>
    		<option value="antiquewhite" style="color: antiquewhite;">Blanc antique</option>
    		<option value="darkgray" style="color: darkgray;">Gris clair</option>
    		<option value="darkgoldenrod" style="color: darkgoldenrod;">Dore fonce</option>
    		<option value="goldenrod" style="color: goldenrod;">Dore</option>
    		<option value="orange" style="color: orange;">orange</option>
    		<option value="steelblue" style="color: steelblue;">Bleu acier</option>
    		<option value="dimgray" style="color: dimgray;">Gris pale</option>
    		<option value="lightslategray" style="color: lightslategray;">Gris ardoise clair</option>
    		<option value="gold" style="color: gold;">Or</option>
    		<option value="midnightblue" style="color: midnightblue;">Bleu nuit</option>
    	</select>

    	<select onchange="commande('fontSize', this.value); this.selectedIndex = 0;">
    		<option value="">Taille</option>
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    		<option value="6">6</option>
    		<option value="7">7</option>

    		
    	</select>

    	<input type="button" value="undo" onclick="commande('undo');" />
    	<input type="button" value="redo" onclick="commande('redo');" />
    	
    	<div id="editeur" contentEditable><?php if(isset($text)){echo $text ;}?></div>



        <textarea name='text' id="resultat" style="display: none;"></textarea> 

</section>