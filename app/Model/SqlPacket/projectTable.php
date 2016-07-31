<?php
namespace App\Model\SqlPacket;    

use DB;
use App\Model\SqlPacket\baseTable;

class ProjectTable extends BaseTable
{
    public static $table = null;
    public function __construct($table) 
    {
        self::$table = $table;
        parent::__construct();
        parent::$table = self::$table; 
    }
    
    public function getProgramInfo()
    {
        $result = DB::select('select * from  project');
        return $result;
        
    } 
}
?>
