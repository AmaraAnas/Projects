<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@taglib uri="http://www.springframework.org/tags/form" prefix="f"%>
<head>
<link rel="stylesheet" type="text/css" href="<%=request.getContextPath()
%>/resources/css/style.css">
</head>
<div class="errors">
${exception}
</div>
<div id="formUser" class="cadre">
<f:form modelAttribute="parent" action="/inscrit" method="post"
enctype="multipart/form-data">
<table>
<tr>
	<td>Nom Prénom :</td>
	<td><f:input path="nom"/></td>
	<td><f:errors path="nom" cssClass="errors"></f:errors> </td>
</tr>
<tr>
	<td>Prénom :</td>
	<td><f:input path="prenom"/></td>
	<td><f:errors path="prenom" cssClass="errors"></f:errors> </td>
</tr>
<tr>
	<td>Adresse :</td>
	<td><f:input path="adresse"/></td>
	<td><f:errors path="adresse" cssClass="errors"></f:errors> </td>
</tr>
<tr>
	<td>email :</td>
	<td><f:input path="email"/></td>
	<td><f:errors path="email" cssClass="errors"></f:errors> </td>
</tr>
<tr>
	<td>Telephone :</td>
	<td><f:input path="tel"/></td>
	<td><f:errors path="tel" cssClass="errors"></f:errors> </td>
</tr>
<tr>
	<td>Pseudo :</td>
	<td><f:input path="userName"/></td>
	<td><f:errors path="userName" cssClass="errors"></f:errors> </td>
</tr>
<tr>
	<td>Mot de passe :</td>
	<td><f:input path="password"/></td>
	<td><f:errors path="password" cssClass="errors"></f:errors> </td>
</tr>

<tr>
	<td><input type="submit" value="Save"></td>
</tr>
</table>
</f:form>
</div>