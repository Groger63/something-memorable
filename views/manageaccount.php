<?php include('header.php');?>

<section id="one" class="wrapper style1">
  <div class="inner">
    <section id="three" class="wrapper style3 special">
      <div class="inner">
        <header class="major narrow ">
          <h1>Manage account</h1>
        </header>
        <form  method="post" action="changedisplayname">
         <p>Display Name : <input type="text" name="displayname" /></p>
         <p><input type="submit" value="changedisplayname" action="changedisplayname"></p>
       </form>
       <form method="post" action="changepassword">
         <p>Password : <input type="password" name="pass1" /></p>
         <p>Password : <input type="password" name="pass2" /></p>
         <p><input type="submit" value="changepassword" action="changepassword"></p>
       </form>
       <form method="post" action="deleteaccount">
       <p><input type="submit" name="deleteaccount" value="deleteaccount"></p>
       </form>
     </form>

   </div>
 </section>

</div>
</section>

<?php include("footer.html");?>