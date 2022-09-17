<?php

namespace Source\Util;

class Session
{

    public function __construct()
    {
        if (!session_id()) {
            session_start([
                "name" => APP_NAME
            ]);
        }
    }

    public function get($name)
    {
        return $_SESSION[$name] ?? null;
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function remove($name)
    {
        if ($this->has($name)) {
            unset($_SESSION[$name]);
        }
    }

    public function has($name)
    {
        return isset($_SESSION[$name]);
    }

    public function destroy()
    {
        session_destroy();
    }
}
