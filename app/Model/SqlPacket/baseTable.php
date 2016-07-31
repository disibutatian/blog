<?php
namespace App\Model\SqlPacket;    

use DB;

class BaseTable
{
    public static $table = null;
    public function __construct() 
    {
    
    }
    
    public function getColumn($column)
    {
        return DB::table(self::$table)->pluck($column);
    }
    public function serverInsert($data)
    {
         echo var_dump($data['server_id']);
         DB::table(self::$table)->insert(['server_id' => $data['server_id'], 'machine_room_id' => 3, 
            'server_name' => "fdas" ] );
    }
    public function interfacePerfomanceInsert($data)
    {
        DB::table(self::$table)->insert([ 'interface_id' => $data[0],'project_id' => $data[1],
            'server_id' => $data[2], 'machine_room_id' => $data[3], 'province_id' => $data[4],
            'response_time' => $data[5], 'ave_link_time' => $data[6], 'ave_process_time' => $data[7],
            'error_rate' => $data[8],'ave_page_size' => $data[9], 'score' => $data[10] ] );
       
    }
    public function baseInsert($flag, $data)
    {
        //这里可以根据flag 定义 不同的插入。
        if($flag == 1) {
            $this->serverInsert($data);
        } else {
            $this->interfacePerfomanceInsert($data);

        }
    }
}
