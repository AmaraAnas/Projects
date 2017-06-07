<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<div id="panier" style="display: none">
<c:if test="${panier.size!=0}">
<table>
<tr>
<th>ID</th><th>Designation</th><th>Prix</th><th>Quantité</th><th>Montant</th>
</tr>
<c:forEach items="${panier.articles}" var="art">
<tr>
<td>${art.jouet.idJouet}</td> <td>${art.jouet.designation}</td>
<td>${art.jouet.prix}</td><td>${art.quantite}</td>
<td>${art.quantite*art.jouet.prix}</td>
<td><a href="/jee/SuppDePanier?idJ=${art.jouet.idJouet}">Supprimer</a></td>
</tr>
</c:forEach>
<tr>
<td colspan="4">Total</td>
<td>${panier.total}</td>
</tr>
</table>
<td><a href="/jee/validateCommande">Passer Commande</a></td>
</c:if>
</div>
<div>
<a href="<c:url value="/j_spring_security_logout" />" > Logout</a>
</div>
<div id="catalogueJouets">
<c:forEach items="${jouets}" var="p">
<div class="ficheJouet">
<table>
<tr><td colspan="2"><img src="photoJouet?idP=${p.idJouet }"></td> </tr>
<tr> <td>Désignation :</td><td>${p.designation }</td> </tr>
<tr> <td>Prix :</td><td>${p.prix}</td> </tr>
<tr> <td>Stock:</td><td>${p.quantite}</td> </tr>
<tr> <td>${p.description }</td></tr>
<tr> <td colspan="2">
<form action="ajouterAuPanier">
<input type="hidden" value="${p.idJouet}" name="idJouet">
<input type="text" value="1" name="quantite">
<input type="submit" value="Ajouter au panier">
</form>
<td>
</tr>
</table>
</div>
</c:forEach>
</div>