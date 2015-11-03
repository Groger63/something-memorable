<?php        echo 'Hello '.$_SESSION['displayname'].'
                    <form action="#" method="POST">
                        <ul class="actions">
                             <li><input type="hidden" value="logOff" name="action" id="action"/></li>
                            <li><input type="submit" value="Log Off" name="Log Off" id="Log Off" /></li>
                        </ul>
                    </form>';
                    ?>