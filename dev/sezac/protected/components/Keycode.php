<?php
/**
 * Description of Keycode
 *
 * @author miguel
 */
class Keycode
{
    static function encriptar($cadena)
    {
        try{
            return urlencode(base64_encode(addslashes(gzcompress(serialize($cadena), 9))));
        } catch(Exception $e) {
            return false;
        }
    }  
    static function desencriptar($cadena)
    {
        try {
            return unserialize(gzuncompress(stripcslashes(base64_decode(urldecode($cadena)))));
        } catch (Exception $e) {
            return false;
        }
    }
}
