<?php include('header.php');?>

					<td align="center">
                        <br/>
                        <br/>
						<section class="newsbox">
                            <section class="newstitle">
                                <section class="titrenews">
                               	<h1>
                                	Erreur !
                                </h1>
                                </section>
                                <br/>
                            </section>
                            <section class="news">
								<?php
								if (isset($errorView)) {
								foreach ($errorView as $value){
								    foreach ($value as $uniquevalue){

                                        foreach ($uniquevalue as $uniquevalue1){
                                            echo $uniquevalue1;
                                        }
                                    }
								}
								}
								?>
                            </section>
                        </section>
                    	<br/>
				     </td>
<?php include("footer.html");?>

