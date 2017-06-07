<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@taglib uri="http://www.springframework.org/tags/form" prefix="f"%>
<div class="errors">
${exception}
</div>
<div>
<a href="<c:url value="/j_spring_security_logout" />" > Logout</a>
</div>
<div id="formJouet" class="cadre">
<f:form modelAttribute="jouet" action="saveJouet" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>ID Jouet:</td>
<td>${jouet.idJouet}<f:input type="hidden" path="idJouet"/></td>
<td><f:errors path="idJouet"></f:errors> </td>
</tr>
<tr>
<td>Categorie</td>
<td><f:select path="categorie.idCategorie" items="${categories}" itemLabel="nomCategorie" itemValue="idCategorie" /></td>
<td><f:errors path="categorie.idCategorie" cssClass="errors"></f:errors></td>
</tr>
<tr>
<td>Désignation</td>
<td><f:input path="designation"/></td>
<td><f:errors path="designation" cssClass="errors"></f:errors> </td>
</tr>
<tr>
<td>Description</td>
<td><f:textarea path="description"/></td>
<td><f:errors path="description" cssClass="errors"></f:errors> </td>
</tr>
<tr>
<td>Prix</td>
<td><f:input path="prix"/></td>
<td><f:errors path="prix" cssClass="errors"></f:errors></td>
</tr>
<tr>
<td>Sélectioné</td>
<td><f:checkbox path="selectionne"/></td>
<td><f:errors path="selectionne" cssClass="errors"></f:errors></td>
</tr>
<tr>
<td>Quantité</td>
<td><f:input path="quantite"/></td>
<td><f:errors path="quantite" cssClass="errors"></f:errors></td>
</tr>
<tr>
<td>Photo </td>
		<td>
		<c:if test="${jouet.idJouet!=null}">
		<f:input type="hidden" path="photo"/>
		<img src="photoJouet?idJ=${jouet.idJouet}">
		</c:if>
		<input type="file" name="file"></td>
		<td>${errors }</td>
</tr>

<tr>
	<td><input type="submit" value="Save"></td>
</tr>
</table>
</f:form>
</div>
<div id="tabCategories" class="cadre">
<table class="tabStyle1">
	<tr>
		<th>ID</th><th>CATEGORIE</th><th>DESIGNATION</th><th>DESCRIPTION</th><th>PRIX</th><th>SELECTIONNE</th><th>QUANTITE</th><th>PHOTO</th>
		<th></th><th></th>
	</tr>
	<c:forEach items="${jouets}" var="p">
<tr>
	<td>${p.idJouet}</td>
	<td>${p.categorie.nomCategorie}</td>
	<td>${p.designation}</td>
	<td>${p.description}</td>
	<td>${p.prix}</td>
	<td>${p.selectionne}</td>
	<td>${p.quantite}</td>
	<td><img src="photoJouet?idJ=${p.idJouet}"></td>
	<td><a href="deleteJouet?idJ=${p.idJouet}">Supprimer</a></td>
	<td><a href="editJouet?idJ=${p.idJouet}">Edit</a></td>
</tr>
	</c:forEach>
</table>
</div>