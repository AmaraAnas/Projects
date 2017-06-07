<div>
<table>
<tr>
<td><img alt="" src="<%=request.getContextPath()%>/resources/images/logo.png" height="90%"></td>
<td></td> <td class="pan"> <div>
<table>
<tr>
<td colspan="2"><img id="imgPanier" src="<%=request.getContextPath()%>/resources/images/panier.jpg" onclick="affichePanier()"></td>
</tr>
<tr>
<td>Nombre de Jouets :</td> <td>${panier.getSize()}</td>
</tr>
<tr>
<td>Total :</td> <td>${panier.getTotal()}</td>
</tr>
</table>
</div>
</td>
</tr>
</table>
</div>
<div>
<table>
<tr>
<td>
<div id="chercher">
<form action="chercherjouets">
<input type="text" name="mc" value="${mc}">
<input type="submit" value="Chercher">
</form>
</div>
</td>
<td>
<a href="index"><img alt=""src="<%=request.getContextPath()%>/resources/images/home.png" alt="home" width="10%" height= "10%"></a>
<a href="inscrit"><img alt=""src="<%=request.getContextPath()%>/resources/images/user.png" alt="inscription" width="10%" height= "10%"></a>
<a href="login"><img alt=""src="<%=request.getContextPath()%>/resources/images/login.jpg" alt="login" width="10%" height= "10%"></a>
<a href="adminJouet/index"><img alt=""src="<%=request.getContextPath()%>/resources/images/admin.png" alt="Admin" width="10%" height= "10%"></a>
</td>
</tr>
</table>
</div>