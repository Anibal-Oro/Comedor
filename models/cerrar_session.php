<?php

    session_start();
    session_unset();
    session _destroy();

    header ("Location: ./index.php"),

?>