<?php
namespace App\Model\SqlPacket;    

use DB;

class CreateInterfacePerformanceTable
{
    public static $table = null;
    public function __construct($table) 
    {
        self::$table = $table;
    }
    public function insertInterfacePerformanceData()    
    {
        
        for($i = 1;$i <=50;$i++)
    {
        $project_id = rand(1, 3);
        $interface_id = rand($project_id * 5 -4, $project_id * 5);
        $machine_room_id = rand(1, 2);
        $server_id = rand($machine_room_id * 5 - 4, $machine_room_id * 5);
        $province_id = rand(1, 34);
        $response_time = rand(1000, 5000);
        $ave_link_time = rand(10, 40);
        $ave_process_time = rand(1, $ave_link_time - 5);
        $error_rate = rand(2, 5);
        $ave_page_size = rand(900, 1000);
        $score = (100 - $ave_link_time) * 100.0 * ($ave_page_size - 10) * 0.2 / 90.0 / 990.0 + 
                    ($ave_link_time - 5 - $ave_process_time) * 100 * ($ave_page_size - 10) * 0.3
                    / ($ave_link_time - 6) / 990 + (20 - $error_rate) * 0.5 * 100 / 18; 
    
        DB::table(self::$table)->insert([ 'interface_id' => $interface_id,'project_id' => $project_id,
            'server_id' => $server_id, 'machine_room_id' => $machine_room_id, 'province_id' => $province_id,
            'response_time' => $response_time, 'ave_link_time' => $ave_link_time, 'ave_process_time' =>$ave_process_time ,
            'error_rate' => $error_rate,'ave_page_size' => $ave_page_size, 'score' => $score ] );
  
        }

    }
}
?>
