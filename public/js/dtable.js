// JavaScript Document

/* trouve le tag "parentTagName" parent de "element" */
function getParent(element, parentTagName) {
	if ( ! element )
		return null;
	else if ( element.nodeType == 1 && element.tagName.toLowerCase() == parentTagName.toLowerCase() )
		return element;
	else
		return getParent(element.parentNode, parentTagName);
}

/* ajoute une ligne */

//var i=1;
function addLigne(link,nomtotal) {
    
    var i=document.getElementById(nomtotal).value;
   
    //recuperation du nombre
            i++;
        document.getElementById(nomtotal).value=i;
	// 1. r�cuperer le node "TABLE" � manipuler
	var td = link.parentNode;
	var table = getParent(td,'TABLE');
	// 2. on va manipuler le TBODY
	var tbody = table.tBodies[0];
	// 3. on clone la ligne de reference
	var newTr = tbody.rows[0].cloneNode(true);
	tbody.appendChild(newTr);

	if ( document.all )
		newTr.style.display = "block"; // pour IE
	else
		newTr.style.display = "table-row"; // pour Gecko
}

/* supprimer une ligne */
function delLigne(link,nomtotal) {
    
    // reduire l'indice du tableau'
    var i;
    i=document.getElementById(nomtotal).value
    i--;
    document.getElementById(nomtotal).value=i;
	// 1. r�cuperer le node "TABLE" � manipuler
	var td = link.parentNode;
	var table = getParent(td, 'TABLE');
	// 2. r�cuperer le TBODY
	var tbody = table.tBodies[0];
	// 3. Supprimer le TR
	tbody.removeChild(getParent(td, 'TR'));
}

window.onload = dtableInit;
/* initialise le script */
function dtableInit() {
	var table = document.getElementsByTagName('TABLE');
	for ( var i = 0; i < table.length; i++ ) {
		// on r�cup�re tous les tableaux dynamiques
		if ( table[i].className == 'dTable col-sm-12' ) {
			var tbody = table[i].tBodies[0];
			var newTr = tbody.rows[0].cloneNode(true);
			// on masque la premi�re ligne du tbody (la ligne de reference)
			tbody.rows[0].style.display = 'none';
			// on en ajoute une
			tbody.appendChild(newTr);
		}
	}
}