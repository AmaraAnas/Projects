<!-- La légende -->
<div class="cal-legend">
<fieldset><legend><?php echo $legend;?></legend>
<table>
<tr><td>
<?php 
if ( $lang == 'fr' )
	{
	$ch = "chambre";
	$libre ="libre";
	$occupe = "occupé";
	$fermeture = "fermeture";
	}
else if ( $lang == 'en' )
	{
	$ch = "room";
	$libre ="free";
	$occupe = "booked";
	$fermeture = "closed";}
else if ( $lang == 'es' )
	{
	$ch = "habitacion";
	$libre ="libre";
	$occupe = "reservada";
	$fermeture = "cerado";
	}
	
for ( $j = 0 ; $j < $nchambres ; $j++ )
	{
	echo '<p><div style="background-color:'.$chambres_colors[$j].';" class="cell-legend">';
	echo $chambres_initiales[$j].'</div> : '.$ch.' '.$chambres_names[$j].'</p>';
	}

	
?>
<p><img class="img-legend" src="<?php  echo $imgdir;?>libre.png" width="20" height="20" align="middle" /> : <?php echo $libre;?></p>
<p><img class="img-legend" src="<?php  echo $imgdir;?>occupe.png" width="20" height="20" align="middle" /> : <?php echo $occupe;?></p>
<p><img class="img-legend" src="<?php  echo $imgdir;?>cadenas.png" width="20" height="20" align="middle" /> : <?php echo $fermeture;?></p>
</td></tr>
</table>
</fieldset>
</div>