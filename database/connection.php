<?php 



    abstract class Connection
    {
        private static $conn;
        
        public static function getConn()
        {
            $config = parse_ini_file('./config/config.ini',true);
          
            if (self::$conn == null) {

                $dnsConnection = 'mysql: host='.$config['DATABASE']['host'].'; dbname='.$config['DATABASE']['db'].';';

                self::$conn = new PDO($dnsConnection, 'root', '');
                
            }
            return self::$conn;
        }
    }