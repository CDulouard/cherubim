var chat = {
	init: function (nom, age, couleur) {
        this.nom = nom;
        this.age = age;
        this.couleur = couleur;
    },

	decrire : function () {
		var ans = "Ce chat a pour nom " + this.nom + " est age de " + this.age + " et est " + this.couleur;
		return ans;
	}


};

houston = Object.create(chat);
houston.nom = 'houston';
houston.age = 1;
houston.couleur = 'blanc et noir';
console.log(houston.decrire());
loulou = Object.create(chat);
loulou.init('loulou', 1, 'noir et blanc')
console.log(loulou.decrire())