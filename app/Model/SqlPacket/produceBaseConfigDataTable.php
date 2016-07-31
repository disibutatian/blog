<?php
namespace App\Model\SqlPacket;    

use DB;

class ProduceBaseConfigDataTable 
{
    public static $table = null;
    public function __construct() 
    {
    }
    public function insertInterfaceConfigData()
    {
        DB::delete('delete from interface');
        $myfile = fopen("/home/blog/log/interface.txt", "r") or die("Unable to open file!");          
        while( !feof($myfile)) {
            $str =  fgets($myfile); 
            if($str == "")                //防止读后面的空行出现错误
                break;
            $arr = explode(' ', $str);    //分割字符串
         DB::table('interface')->insert(['interface_id' =>  intval($arr[0]),
                 'interface_name' => $arr[1],'project_id' => intval($arr[2]) ]);
        }
        fclose($myfile);
    }

    public function insertMachineRoomConfigData()
    {
        DB::delete('delete from machine_room');
        $myfile = fopen("/home/blog/log/machineRoom.txt", "r") or die("Unable to open file!");          
        while( !feof($myfile)) {
            $str =  fgets($myfile); 
            if($str == "")                //防止读后面的空行出现错误
                break;
            $arr = explode(' ', $str);    //分割字符串
            DB::table('machine_room')->insert(['machine_room_id' =>  intval($arr[0]),
                'machine_room_name' => $arr[1] ]);
        }
        fclose($myfile);
    }

    public function insertServerConfigData()
    {
        DB::delete('delete from server');
        $myfile = fopen("/home/blog/log/server.txt", "r") or die("Unable to open file!");          
        while( !feof($myfile)) {
            $str =  fgets($myfile); 
            if($str == "")                //防止读后面的空行出现错误
                break;
            $arr = explode(' ', $str);    //分割字符串
            DB::table('server')->insert(['server_id' =>  intval($arr[0]),
                'machine_room_id' => intval($arr[1]),'server_name' => $arr[2] ]);
        }
        fclose($myfile);
    }

    public function insertProjectConfigData()
    {
        DB::delete('delete from project');
        $myfile = fopen("/home/blog/log/project.txt", "r") or die("Unable to open file!");          
        while( !feof($myfile)) {
            $str =  fgets($myfile); 
            if($str == "")                //防止读后面的空行出现错误
                break;
            $arr = explode(' ', $str);    //分割字符串
            DB::table('project')->insert(['project_id' =>  intval($arr[0]),
                'project_name' => $arr[1] ]);
        }
        fclose($myfile);
    }

    public function insertProvinceConfigData()
    {
        DB::delete('delete from province');
        $myfile = fopen("/home/blog/log/province.txt", "r") or die("Unable to open file!");          
        while( !feof($myfile)) {
            $str =  fgets($myfile); 
            if($str == "")                //防止读后面的空行出现错误
                break;
            $arr = explode(' ', $str);    //分割字符串
            DB::table('province')->insert(['province_id' => intval($arr[0]),
                'province_name' => $arr[1] ]);
        }
        fclose($myfile);
    }

    public function insertBaseConfigData()
    {
        $this->insertInterfaceConfigData();
        $this->insertMachineRoomConfigData();
        $this->insertServerConfigData();
        $this->insertProjectConfigData();
        $this->insertProvinceConfigData();
    }
    
}
?>
