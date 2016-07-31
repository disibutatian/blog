<?php
namespace App\Model\SqlPacket;    

use DB;
use App\Model\SqlPacket\baseTable;

class CreateDataTable extends BaseTable
{
    public static $table = null;
    public function __construct($table) 
    {
        self::$table = $table;
        parent::__construct();
        parent::$table = self::$table; 
    }
    
}
