<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
   <tr>
 	<td align="left">
		<table width="100%" align="left" border="0" cellpadding="5" cellspacing="5" >
			<tr>	
				<td width="100%" height="30" align="left">
                <div class="menulayout" id="content_menu">
                 <ul id="nav" style="position:relative; margin-left:0px;">
                 	 <? if($_SESSION["tip_usuario"] <> "E"){ ?>                 
                      <li>
                                 <table border="0" cellpadding="0" cellspacing="0" width="160" align="center">
								<tr>
                                	<td align="center" valign="middle" width="10" height="25" class="">
                                    </td>
                                   <td align="center" valign="middle"  height="25" class="">

                                    <div class="principal" onClick="cargarOpcion('Dashboard')" onMouseOver="resaltarOpMenu(this)" onMouseOut="noresaltarOpMenu(this)">
                                    <table>
                                            	<tr><td align="center">
                                    <img src="images/dashboard.png" class="btn_menu" />
                                    </td></tr>
                                                <tr><td align="center">
                                            	Panel de Control
                                            	</td></tr>
                                            </table>
                                    </div>
									</td>
                                </tr>
                                </table>
                                </li>
                               <? } ?>
					
						<? if($_SESSION["tip_usuario"] <> "E"){ ?>
							<li>
                               <table border="0" cellpadding="0" cellspacing="0" width="160" align="center">
								<tr>
                              	<td align="center" valign="middle" width="10" height="25" class="">
                                  </td>
                                 <td align="center" valign="middle"  height="25" class="">

                                  <div class="principal" onClick="cargarOpcion('Constructora')" onMouseOver="resaltarOpMenu(this)" onMouseOut="noresaltarOpMenu(this)">
                                  <table>
                                          	<tr><td align="center">
                                  <img src="images/empresa.jpeg" class="btn_menu" />
                                  </td></tr>
                                              <tr><td align="center">
                                          	Empresas
                                          	</td></tr>
                                          </table>
                                  </div>
									</td>
                              </tr>
                              </table>
                              </li>
                          <?php }?>
                          <? if($_SESSION["tip_usuario"] <> "E"){ ?>    
							<li>
							   <table border="0" cellpadding="0" cellspacing="0" width="160" align="center">
								<tr>
								<td align="center" valign="middle" width="10" height="25" class="">
								  </td>
								 <td align="center" valign="middle"  height="25" class="">
							
								  <div class="principal" onClick="cargarOpcion('Contratistas')" onMouseOver="resaltarOpMenu(this)" onMouseOut="noresaltarOpMenu(this)">
								  <table>
											<tr><td align="center">
								  <img src="images/agencia.png" class="btn_menu" />
								  </td></tr>
											  <tr><td align="center">
											Agencias
											</td></tr>
										  </table>
								  </div>
									</td>
							  </tr>
							  </table>
							  </li>
							<?php }?>
							<? if($_SESSION["tip_usuario"] <> "E"){ ?>
							<li>
                               <table border="0" cellpadding="0" cellspacing="0" width="160" align="center">
								<tr>
                              	<td align="center" valign="middle" width="10" height="25" class="">
                                  </td>
                                 <td align="center" valign="middle"  height="25" class="">

                                  <div class="principal" onClick="cargarOpcion('TrabajadoresControl')" onMouseOver="resaltarOpMenu(this)" onMouseOut="noresaltarOpMenu(this)">
                                  <table>
                                          	<tr><td align="center">
                                  <img src="images/kdmconfig.png" class="btn_menu"  />
                                  </td></tr>
                                              <tr><td align="center">
                                          	Trabajadores
                                          	</td></tr>
                                          </table>
                                  </div>
									</td>
                              </tr>
                              </table>
                              </li>
						<?php } ?>	
							<? if($_SESSION["tip_usuario"] <> "E"){ ?>
								<li>
								   <table border="0" cellpadding="0" cellspacing="0" width="160" align="center">
									<tr>
									<td align="center" valign="middle" width="10" height="25" class="">
									  </td>
									 <td align="center" valign="middle"  height="25" class="">
								
									  <div class="principal" onClick="cargarOpcion('Afp')" onMouseOver="resaltarOpMenu(this)" onMouseOut="noresaltarOpMenu(this)">
									  <table>
												<tr><td align="center">
									  <img src="images/my_documents.png" class="btn_menu" />
									  </td></tr>
												  <tr><td align="center">
												AFPs
												</td></tr>
											  </table>
									  </div>
										</td>
								  </tr>
								  </table>
								  </li>
							<?php }?>
								<li>
								   <table border="0" cellpadding="0" cellspacing="0" width="160" align="center">
									<tr>
									<td align="center" valign="middle" width="10" height="25" class="">
									  </td>
									 <td align="center" valign="middle"  height="25" class="">
								
									  <div class="principal" onClick="cargarOpcion('Faenas')" onMouseOver="resaltarOpMenu(this)" onMouseOut="noresaltarOpMenu(this)">
									  <table>
												<tr><td align="center">
									  <img src="images/advancedsettings.png" class="btn_menu" />
									  </td></tr>
												  <tr><td align="center">
												Faenas
												</td></tr>
											  </table>
									  </div>
										</td>
								  </tr>
								  </table>
								  </li>
							    <? /*if(checkPermisos(3,"vista")) { */?>                 
                                  <li> 
                                  <table border="0" cellpadding="0" cellspacing="0" width="160" align="center" onClick="">
									<tr>
                                   		<td align="center" valign="middle"  height="25" class="">
                                  		<div class="principal" onClick="cargarOpcion('Dispositivo')" onMouseOver="resaltarOpMenu(this)" onMouseOut="noresaltarOpMenu(this)">
                                        <table>
                                            	<tr><td align="center">
                                        <img src="images/configuracion.png" class="btn_menu" />
                                        </td></tr>
                                                <tr><td align="center">
                                            	Configuraci&oacute;n
                                            	</td></tr>
                                            </table>
                                        </div>
                                 		</td>
                                  	</tr>
                                  </table>                                  
                                </li>   
                                             
                                <li>
                                <table border="0" cellpadding="0" cellspacing="0" width="160" align="center" onClick="">
								<tr>
                                   <td align="center" valign="middle"  height="25" class="">
                                  	<div class="principal" onClick="cargarOpcion('Usuario')" onMouseOver="resaltarOpMenu(this)" onMouseOut="noresaltarOpMenu(this)">
                                    <table>
                                            	<tr><td align="center">
                                    <img src="images/usuarios.png" class="btn_menu">
                                    </td></tr>
                                                <tr><td align="center">
                                            	Usuarios
                                            	</td></tr>
                                            </table>
                                    </div>
									</td>
                                </tr>
                                </table>                              
                                </li>      
                                <?/* } */?>                        
                              </ul>
                            <!--</div>-->
              			 </div>
					</td>
				</tr>
			</table>
	</td>
</tr>
<tr>
	<td>
    	<hr class="separa_menu" />
    </td>
</tr>
</table>
