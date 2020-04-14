<?php

session_start();

function flash($messageName = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($messageName) && !empty($message)){
        $_SESSION[$messageName] = $message;
        $_SESSION[$messageName . '_class'] = $class;
    }
    elseif (isset($_SESSION[$messageName])) {
        echo '<div class="' . $class . '" id="msg-flash"><strong>' . $_SESSION[$messageName] .
            '<strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button></div>';
        unset($_SESSION[$messageName]);
        unset($_SESSION[$messageName . '_class']);
    }
}


function isLoggedIn(){
    if ($_SESSION['user_id'])
        return true;
    return false;
}


