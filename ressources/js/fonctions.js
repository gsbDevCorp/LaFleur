function ajouterPanier(numArticle, prixArticle) {
	var panier = parseInt(document.getElementById("montantPanier").innerHTML);
	
	var montant = (panier + parseInt(prixArticle));
	document.getElementById("montantPanier").innerHTML = montant;
	
	var nbArticles = parseInt(document.getElementById("nbArticles").innerHTML);
	nbArticles += 1;
	document.getElementById("nbArticles").innerHTML = nbArticles;
	
	setCookie("nbArticles", nbArticles);
	setCookie("montantPanier", montant);
}

function recupererCookies() {
	var cookieNbArticles = getCookie("nbArticles");
	var cookieMontantPanier = getCookie("montantPanier");
	if (cookieNbArticles == null)
		cookieNbArticles = 0;
	if (cookieMontantPanier == null)
		cookieMontantPanier = 0;
	document.getElementById("nbArticles").innerHTML = cookieNbArticles;
	document.getElementById("montantPanier").innerHTML = cookieMontantPanier;
}

function setCookie(sName, sValue) {
    var today = new Date(), expires = new Date();
    expires.setTime(today.getTime() + (365*24*60*60*1000));
    document.cookie = sName + "=" + encodeURIComponent(sValue) + ";expires=" + expires.toGMTString();
}

function getCookie(sName) {
    var cookContent = document.cookie, cookEnd, i, j;
    var sName = sName + "=";

    for (i=0, c=cookContent.length; i<c; i++) {
            j = i + sName.length;
            if (cookContent.substring(i, j) == sName) {
                    cookEnd = cookContent.indexOf(";", j);
                    if (cookEnd == -1) {
                            cookEnd = cookContent.length;
                    }
                    return decodeURIComponent(cookContent.substring(j, cookEnd));
            }
    }      
    return null;
}