<?php include('header.php');?>

            <section id="one" class="wrapper style1">
                <div class="inner">
                <section id="three" class="wrapper style3 special">
                    <div class="inner">
                        <header class="major narrow ">
                            <h2>Sign up</h2>
                       			<form action ="" method="POST">
								    <div class="6u 12u$(xsmall)">
								        <p>Enter a user name</p>
								        <?php 
								        	if(isset($data['username'])){
								        		if($data['username']=='taken') echo '<p>This user name has already been taken.</p>';
								        		if($data['username']=='regexp') echo '<p>Your username must fit our regexp.</p>';
								        	}
								        ?>
								        <input name="username" placeholder="User Name" type="text" />
								    </div>
								    <div class="6u$ 12u$(xsmall)">
								        <p>Enter a password</p>
								        <?php 
								        	if(isset($data['password'])){
									        	if($data['password']=='notidentical') echo '<p>The passwords you entered are not identical.</p>';
									        	if($data['password']=='regexp') echo '<p>Your password must fit our regexp.</p>';
								        	}
								        ?>
								        <input name="password" placeholder="Password" type="password" />
								        <p>Repeat your password</p>
								        <input name="password2" placeholder="Password" type="password" />
								    </div>
								    <ul class="actions">
								        <li><input type="hidden" value="step1" name="signup" id="action"/></li>
								        <li><input type="submit" value="Next step" name="Sign up" id="Sign up" /></li>
								    </ul>
								</form>

                            </header>
                        <ul class="actions">
                        </ul>
                    </div>
                </section>

                </div>
            </section>

<?php include("footer.html");?>