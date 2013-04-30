<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>AulaON</title>
    <link rel="shortcut icon" href="imagens/logoaulaonn.ico">
    <link rel="stylesheet" href="css/CSSReset.css" />
    <link rel="stylesheet" href="css/PadraoComum.css" />
    <link rel="stylesheet" href="css/uniform.default.css" media="screen" />
     
    <script language="javascript" type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.bar.js"></script> 
    <script type="text/javascript" src="js/jquery.uniform.js"></script>
    
    
    <script type='text/javascript'>
	     //Estilo para todos os select e checkbox
	    $(function () {
	       $("select, :checkbox").uniform();
	   });
	</script>
	<style type="text/css">
td img {display: block;}
</style>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body>
<div id="tudo">
                <div id="topo">
                <!--logotipo-->
                    <div id="logo">
                    <a href="index.php"><img border="0" src="imagens/logo_topo.png" alt="AulaON" title="AulaON" width="235" height="50"></a>
                    </div>
                    <img id="slogan" src="imagens/slogan_topo.png">
                    
                <!--/logotipo-->
                <!--login-->
                    <div id="login">
                    <?php 
                    	session_start("usuario");
                    ?>
                    <p><?php echo (isset($_SESSION["nome_usuario"])) ? $_SESSION["nome_usuario"].", s":"S"?>eja bem vindo ao AulaON <br />
                    <?php 
                    if(!isset($_SESSION["nome_usuario"])){?>
                    
						Faça seu <a href="Login.php" title="Login" style="color:#FF6600"><strong>login</strong></a>
						ou <a href="Cadastro.php" title="Cadastre-se" style="color:#FF6600"><strong>cadastre-se</strong></a>
						
					<?php 
					}else{?>					
						<a href="adm/Logoff.php" style="text-decoration:none">
			                <span class="icon-exit" style="color:#FF6600"></span>
							<span class="text bold"style="color:#FF6600">Sair</span>
			            </a>						
					<?php }?>
					</p>
					<br>
					
                    </div>                    
                <!--/login-->
                
                <a href="adm/index.php" id="icoadm"><img src="imagens/work.png" title="Home do usuário" alt="Home do usuário"></a> 
                </div>
        <!--menu-->
    <div id="menu" onload="MM_preloadImages('imagens/menu_r1_c2_s2.png','imagens/menu_r1_c4_s2.png','imagens/menu_r1_c6_s2.png','imagens/menu_r1_c8_s2.png','imagens/menu_r1_c10_s2.png','imagens/menu_r1_c12_s2.png')">
		<table width="100%" border="0">
  <tr>
    <td width="343"><table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="768">
      <!-- fwtable fwsrc="Sem título" fwpage="Página 1" fwbase="menu.png" fwstyle="Dreamweaver" fwdocid = "907748695" fwnested="0" -->
      <tr>
        <td><img src="imagens/spacer.gif" width="7" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="60" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="18" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="124" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="17" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="139" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="18" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="166" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="17" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="101" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="17" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="74" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="10" height="1" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="1" height="1" alt="" /></td>
      </tr>
      <tr>
        <td><img name="menu_r1_c1" src="imagens/menu_r1_c1.png" width="7" height="21" id="menu_r1_c1" alt="" /></td>
        <td><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r1_c2','','imagens/menu_r1_c2_s2.png',1);"><img name="menu_r1_c2" src="imagens/menu_r1_c2.png" width="60" height="21" id="menu_r1_c2" alt="" /></a></td>
        <td><img name="menu_r1_c3" src="imagens/menu_r1_c3.png" width="18" height="21" id="menu_r1_c3" alt="" /></td>
        <td><a href="ComoFunciona.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r1_c4','','imagens/menu_r1_c4_s2.png',1);"><img name="menu_r1_c4" src="imagens/menu_r1_c4.png" width="124" height="21" id="menu_r1_c4" alt="" /></a></td>
        <td><img name="menu_r1_c5" src="imagens/menu_r1_c5.png" width="17" height="21" id="menu_r1_c5" alt="" /></td>
        <td><a href="AulasDisponiveis.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r1_c6','','imagens/menu_r1_c6_s2.png',1);"><img name="menu_r1_c6" src="imagens/menu_r1_c6.png" width="139" height="21" id="menu_r1_c6" alt="" /></a></td>
        <td><img name="menu_r1_c7" src="imagens/menu_r1_c7.png" width="18" height="21" id="menu_r1_c7" alt="" /></td>
        <td><a href="DuvidasFrequentes.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r1_c8','','imagens/menu_r1_c8_s2.png',1);"><img name="menu_r1_c8" src="imagens/menu_r1_c8.png" width="166" height="21" id="menu_r1_c8" alt="" /></a></td>
        <td><img name="menu_r1_c9" src="imagens/menu_r1_c9.png" width="17" height="21" id="menu_r1_c9" alt="" /></td>
        <td><a href="Cadastro.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r1_c10','','imagens/menu_r1_c10_s2.png',1);"><img name="menu_r1_c10" src="imagens/menu_r1_c10.png" width="101" height="21" id="menu_r1_c10" alt="" /></a></td>
        <td><img name="menu_r1_c11" src="imagens/menu_r1_c11.png" width="17" height="21" id="menu_r1_c11" alt="" /></td>
        <td><a href="Contato.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_r1_c12','','imagens/menu_r1_c12_s2.png',1);"><img name="menu_r1_c12" src="imagens/menu_r1_c12.png" width="74" height="21" id="menu_r1_c12" alt="" /></a></td>
        <td><img name="menu_r1_c13" src="imagens/menu_r1_c13.png" width="10" height="21" id="menu_r1_c13" alt="" /></td>
        <td><img src="imagens/spacer.gif" width="1" height="21" alt="" /></td>
      </tr>
    </table></td>
  </tr>
</table>
	</div>
    <!--/menu-->
    <!--conteudo-->
    <!--/conteudo-->
    <!--rodap�-->
    <!--/rodap�-->
