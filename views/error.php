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
								if (isset($dVueEreur)) {
								foreach ($dVueEreur as $value){
								    echo $value;
								}
								}
								?>
                            </section>
                        </section>
                    	<br/>
				     </td>
<?php include("footer.html");?>
