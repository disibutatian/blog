<?php
namespace App;    

use DB;

class BaseTable
{
    public static $table = null;
    public function __construct() 
    {
    
    }
    //后面实现基本方法
    public function baseInsert($flag, $data)
    {
        //这里可以根据flag 定义 不同的插入。
        if($flag == 1) {
            serverInsert($data);
        } else {

        }
    }
    public function serverInsert($data)
    {
        DB::table(self::$table)->insert(
            ['server_id' => $data[0], 'machine_room_id' => $data[1], 
                'server_name' => $data[2] ]
          );
    }
}
