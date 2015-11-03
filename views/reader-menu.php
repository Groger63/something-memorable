<?php        echo 'Hello '.$_SESSION['displayname'].$_SESSION['role'].'
                    <form action="#" method="POST">
                        <ul class="actions">
                             <li><input type="hidden" value="logout" name="action" id="action"/></li>
                            <li><input type="submit" value="logout" name="logout" id="logout" /></li>
                        </ul>
                    </form>';
                    ?>