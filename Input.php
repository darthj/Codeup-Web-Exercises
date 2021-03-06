<?php

class Input
{
 
    public static function notEmpty($key)
    {
        if(isset($_REQUEST[$key]) && $_REQUEST[$key] != ''){
            return true;
        }
    }
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return isset($_REQUEST[$key]);
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        return self::has($key) ? $_REQUEST[$key] : $default;
    }

    public static function getString($key)
    {
        $value = self::get($key);

        if (!is_string($value))
        {
            throw new Exception("{$key} must be a string");    
        }
           return trim($value);
    }
    public static function getNumber($key)
    {
        $value = trim(self::get($key));

        if(!is_numeric($value));
        {
            throw new Exception("{$key} must be an integer");    
        }
           return $value;
    }

    // public static function getDate($key)
    // {
    //     $date = trim(self::get($key));
    //     if(!strtotime($date)) 
    //     {
    //         throw new Exception("{$key} must be a in YYYY-MM-DD format");
    //     } else {
    //           $dateArray= date_parse(date("y-m-d", strtotime($date)));
    //           if(checkdate($dateArray['month'], $dateArray['day'], $dateArray['year']))
    //           {
    //             return date("y-m-d", strtotime($date));
    //           } else {
    //             throw new Exception("not a valid date.");
    //             }
    //         }
    // }

    public static function getDate($key)
    {
        try {
          $date = new DateTime(Input::get($key));
                return $date;
        } catch (Exception $e) {
          throw new Exception('Invalid Date'); 
        }
    }


    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}

}
