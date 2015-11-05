<?php include('header.php');?>
            <section id="one" class="wrapper style1">
                <div class="inner">
                <section id="three" class="wrapper style3 special">
                    <div class="inner">
                        <header class="major narrow ">
                            <h2>Sign up</h2>
                       			<form action ="" method="POST">
								    <div class="6u 12u$(xsmall)">
								        <p>Enter your display name</p>
								        <input name="displayname" placeholder="User Name" type="text" />
								        <p>(You can change it later in <a href="manageaccount" >Manage my account</a>.)</p>
								    </div>
								    <ul class="actions">
								        <li><input type="hidden" value="step2" name="signup" id="action"/></li>
								        <li><input type="hidden" <?php echo 'value="'.$data['password'].'"'; ?> name="password_hash" id="action"/></li>
								        <li><input type="hidden" <?php echo 'value="'.$data['username'].'"'; ?> name="username" id="action"/></li>
								        <li><input type="submit" value="Create my account!" name="Sign up" id="Sign up" /></li>
										<a href="home" class="button">Cancel</a>
								    </ul>
								</form>

                            </header>
                    </div>
                </section>

                </div>
            </section>

<?php include("footer.html");?>