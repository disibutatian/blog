<?php
namespace App\temp;    

use DB;
//use App\Model\SqlPacket\baseTable;
use App\baseTable;

class CreateDataTable extends BaseTable
{
    //public static $table = null;
    //public function __construct($table) 
    public function __construct() 
    {
        //self::$table = $table;
        parent::__construct();
       // parent::$table = self::$table; 
    }
    
}
