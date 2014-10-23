	<?
		$inicioAux = $inicio;
		$inicio = $inicio_pag;
		if(($inicioAux+1)>10 )
		{
			$inicio = $inicio_pag+(($inicioAux+1)-10);
		}
		$ultimo = (int)($cant/40);
	?>
	<tr bgcolor="#FFFFFF">
    	<td colspan="10" align="right">
        	<table cellpadding="0" cellspacing="0" border="0" align="right" id="paginador">
            	<tr>
                	 <? if((($inicioAux)*40) > 0){ ?>
                	<td class='pag_noselect'><div onclick="window.parent.paginador(0)"> &lt;&lt;</div> </td>
                    <td class='pag_noselect'><div onclick="window.parent.paginador(<? echo($inicioAux - 1) ?>)"> &lt;</div> </td>
                    <? } ?>
                    <? if(($inicio*40) <= $cant){ //$ultimo = $inicio; ?>
                    <td <? if($inicioAux == ($inicio)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 1);}else{ echo($inicio_pag +1+($inicioAux+1-10)); } ?></div></td>
                    <? } 
					
					?>
                    <? 
					if((($inicio+1)*40) <= $cant){ //$ultimo = $inicio+1;?>
                    <td <? if($inicioAux == ($inicio + 1)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?> ><div onclick="window.parent.paginador(<? echo($inicio + 1) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 2);}else{ echo($inicio_pag +2+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicio+2)*40) <= $cant){ //$ultimo = $inicio+2;?>
                    <td <? if($inicioAux == ($inicio + 2)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio + 2) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 3);}else{ echo($inicio_pag +3+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicio+3)*40) <= $cant){ //$ultimo = $inicio+3;?>
                    <td <? if($inicioAux == ($inicio + 3)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio + 3) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 4);}else{ echo($inicio_pag +4+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicio+4)*40) <= $cant){ //$ultimo = $inicio+4;?>
                    <td <? if($inicioAux == ($inicio + 4)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio + 4) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 5);}else{ echo($inicio_pag +5+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicio+5)*40) <= $cant){ //$ultimo = $inicio+5;?>
                    <td <? if($inicioAux == ($inicio + 5)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio + 5) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 6);}else{ echo($inicio_pag +6+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicio+6)*40) <= $cant){ //$ultimo = $inicio+6;?>
                    <td <? if($inicioAux == ($inicio + 6)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio + 6) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 7);}else{ echo($inicio_pag +7+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicio+7)*40) <= $cant){ //$ultimo = $inicio+7;?>
                    <td <? if($inicioAux == ($inicio + 7)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio + 7) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 8);}else{ echo($inicio_pag +8+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicio+8)*40) <= $cant){ //$ultimo = $inicio+8;?>
                    <td <? if($inicioAux == ($inicio + 8)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio + 8) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 9);}else{ echo($inicio_pag +9+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicio+9)*40) <= $cant){ //$ultimo = $inicio+9;?>
                    <td <? if($inicioAux == ($inicio + 9)){ echo("class='pag_select'"); } else { echo("class='pag_noselect'"); }  ?>><div onclick="window.parent.paginador(<? echo($inicio + 9) ?>)"><? if(($inicioAux+1) < 10){echo($inicio_pag + 10);}else{ echo($inicio_pag +10+($inicioAux+1-10)); } ?></div></td>
                    <? } ?>
                    <? if((($inicioAux+1)*40) <= $cant){ ?>
                    <td class='pag_noselect'><div onclick="window.parent.paginador(<? echo($inicioAux + 1) ?>)">&gt;</div> </td>
                    <td class='pag_noselect'><div onclick="window.parent.paginador(<? echo($ultimo) ?>)"> &gt;&gt; </div></td>
                     <? } ?>
                    <td width="300" align="right"> del <? echo(($inicioAux*40)+1) ?> al <? if((($inicioAux*40)+40) <= $cant) { echo(($inicioAux*40)+40); } else { echo($cant); } ?> del total de <? echo($cant); ?> </td>
                </tr>
            </table>
        </td>
	</tr>