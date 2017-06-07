<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@taglib uri="http://www.springframework.org/tags/form" prefix="f"%>
<div id="tabUsers" class="cadre">
<table class="tabStyle1">
	<tr>
		<th>ID</th><th>NOM</th><th>ADRESSE</th><th>EMAIL</th><th>TELEPHONE</th><th>PSEUDO</th>
		<th></th>
	</tr>
	<c:forEach items="${Users}" var="cl">
<tr>
	
	<td>${cl.idUser}</td>
	<td>${cl.nomUser}</td>
	<td>${cl.adresse}</td>
	<td>${cl.email}</td>
	<td>${cl.tel}</td>
	<td>${cl.userName}</td>
	<td><a href="suppUser?idC=${cl.idUser}">Supprimer</a></td>
	
</tr>
	</c:forEach>
</table>
</div>