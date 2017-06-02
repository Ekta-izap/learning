<?php
session_start();
// Create Session class
class Session
{
// it should have push method which will save my variable.

public function set($key,$value){
    $_SESSION[$key]=$value;
}
// it should have pull method which will pull saved variable from session.

public function get($key)
{
    return $_SESSION[$key];
}

// it should allow me to remove any session variable form the entire session. Create method "delete" which will have one argument to be deleted.

    public function delete($key)
    {
        if (isset($_SESSION[$key]))
        {
            unset($_SESSION[$key]);
        }
    }

    public function destroy()
    {
        return session_destroy();
    }
}



