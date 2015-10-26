
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/Projet_final/vues/style.css" />
        <title>Rss Hub</title>
    </head>
    <body>
        <?php
        if(isset($numPage)){
            if($numPage>1){
        ?>
        <section class="btn_suiv">
            <form method="post" action="Accueil">
                <input type="submit" value="Articles suivants" class="btn_menu_feed">
                <input type="hidden" value="accueil" name="action">
                <?php echo "<input type=\"hidden\" value=\"".($numPage-1)."\" name=\"numPage\">"; ?>
            </form>
        </section>
        <?php
            }
            if($numPage<$nbPages){
        ?>        
        <section class="btn_prec">
            <form method="post" action="Accueil">
                <input type="submit" value="Articles précédents" class="btn_menu_feed">
                <input type="hidden" value="accueil" name="action">
                <?php echo "<input type=\"hidden\" value=\"".($numPage+1)."\" name=\"numPage\">"; ?>
             </form>
        </section>
        <?php
            }
        }
        ?>
        <table width="100%" height="100%" style="margin:0px;">
            <tbody>
                <tr>
                    <td width="200" align="left" valign="top">
                        <section class="panel">
                             <header>
                                 <a href="Accueil">
                                    <h1><img src="/Projet_final/vues/images/flux.png" alt="Flux Rss" title="Flux Rss"/> Rss Hub</h1>
                                </a>
                            </header>
						<?php 
						if(isset($_SESSION['logged']) && $_SESSION['logged']){
						?>
                            <br/>
							<h2>Bienvenue <?php echo $_SESSION['login']; ?></h2>
                            <br/>
                            <form method="post" action="Deconnexion">
                                <br/>
                                <input type="hidden" value="deconnexion" name="action" id="action"/>
                                <input type="submit" value="Déconnexion" >
                                <br/>
                                <br/>
                                <br/>
                            </form>
						<?php 
						 }else{
                            global $TmessagesConnexion;
                            if(isset($TmessagesConnexion)){
                                echo "<p>";
                                foreach ($TmessagesConnexion as $m) {
                                    echo $m."<br/>";
                                }
                                echo "</p>";
                            }     
						?>	
							<form method="post" action="Connexion">
									<input type="email" placeholder="example@RssHub.com" name="login" id='login'/>
									<br/>
									<br/>
									<br/>
									<input type="password" placeholder="password" name="password" id='password'/>
									<br/>
									<br/>
									<br/>
                                    <input type="hidden" value="connexion" name="action" id="action"/>
									<input type="submit" value="Se Connecter" name="connexion" id="connexion" />
									<br/>
									<br/>	                               
									<br/>
								</form>
								
                            <form method="post" action="Inscription">
                                <input type="submit" value="Inscription" >
                                <br/>
                                <br/>
                                <input type="hidden" value="inscription" name="action" id="action" />
                                <br/>
                            </form>
                            
						<?php 
						}					
						?>	
						<?php 
						if(isset($_SESSION['logged']) && $_SESSION['logged']){
						?>	
							 <form method="post" action="Gestion_De_Compte">
                                <input type="hidden" value="gestion" name="action" id="action"/>
                                <input type="submit" value="Mon compte">
                                <br/>
                                <br/>
                                <br/>
                            </form>
						<?php 
						}
						?>		
                            <ul id="menu-demo2">
                                <li>
                                    <form method="post" action="Flux">
                                        <input type="hidden" value="mesflux" name="action" id="action"/>
                                        <input type="submit" value="Flux" name="flux" id="flux" />
                                    </form>
									<?php 
									if(isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['role']=='admin'){
									?>	
									<ul>
                                        <li>
                                            <form method="post" action="Ajouter">
                                                <input type="hidden" value="ajouter" name="action" id="action"/>
                                                <input type="submit" value="Ajouter" name="connexion" id="connexion" />
                                            </form>
                                        </li>
                                        <li>
                                             <form method="post" action="Supprimer">
                                                <input type="hidden" value="supprimer" name="action" id="action"/>
                                                <input type="submit" value="Supprimer" name="connexion" id="connexion" />
                                            </form>
                                        </li>
                                        <li>
                                             <form method="post" action="Parametrer">
                                                <input type="hidden" value="parametrer" name="action" id="action"/>
                                                <input type="submit" value="Paramètres" name="connexion" id="connexion" />
                                            </form>
                                        </li>
                                    </ul>
									<?php 
									}
									?>	
                                </li>
                            </ul>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <section class="btn_top">
                                <a href="#">
                                    <img src="/Projet_final/vues/images/arrowtop.png" alt="logo">
                                </a>
                            </section>
                        </section>
                    </td>