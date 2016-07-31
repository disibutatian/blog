<?php
namespace App\Model\SqlPacket;    

use DB;
use App\Model\SqlPacket\baseTable;

class InterfacePerfomanceTable extends BaseTable
{
    public static $table = null;
    public function __construct($table) 
    {
        self::$table = $table;
        parent::__construct();
        parent::$table = self::$table;
    }
    //这个作为返回所有数据的统一接口
    public function getPerformanceByProjectId($project_id, $timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);
        $result = DB::select('select *, UNIX_TIMESTAMP(timestamp) as t from  interface_perfomance where project_id = ?
           and timestamp between ? and ? order by timestamp  desc ', [$project_id,$start,$end]);
        return $result;
        
    }
    //处理返回的基础信息
    public function getProjectAffairsInfo($project_id, $timespan)
    {
         $result = $this->getPerformanceByProjectId($project_id, $timespan);
         //echo var_dump($result);
         return $result;

    }
    public function getErrorProb($project_id, $timespan)
    {
         //$this->getPerformanceByProjectId($project_id, $timespan);
         //echo "fads";
         $result = $this->getPerformanceByProjectId($project_id, $timespan);
         //echo var_dump($result);
         return $result;

    }
    public function getProjectScore($project_id, $timespan)
    {
         //$result = array();
         $result = $this->getPerformanceByProjectId($project_id, $timespan);
         return $result;
         //echo var_dump($result);
    }
    public function getInterfaceInfo($project_id, $timespan, 
            $search, $orderName, $orderSort, $index, $length)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $interface_id = 0;
        $now = time();
        
        $start= $now - ($timespan * 60 * 4);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);
        //$orderName = "a.".$orderName;
        //$search = "";
        if($search != "")
        {
            $search = "%".$search."%";
        }
        //echo $search;
       $result = DB::select("select * from  interface_perfomance as a join interface as b 
                    on a.interface_id = b.interface_id  join server as c on a.server_id = c.server_id
                    join  machine_room as d on a.machine_room_id = d.machine_room_id 
                 where a.project_id = ?
            and (\"\" = ? or b.interface_name like ?)  and timestamp between ? and ? order by {$orderName} 
                                {$orderSort} ",
                             [$project_id,$search,$search,$start,$end]); 
      return $result;
        
    }
    public function getIFServerInfo($project_id, $timespan, $interface_id, 
            $search, $orderName, $orderSort, $index, $length)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        if($search != "")
        {
            $search = "%".$search."%";
        }
        $result = array();
        $result = DB::select("select * from  interface_perfomance as a 
                        join server as b on a.server_id = b.server_id
                    join  machine_room as c on a.machine_room_id = c.machine_room_id 
                 where a.project_id = ? and a.interface_id = ?
            and (\"\" = ? or b.server_name like ?)  and timestamp between ? and ? order by {$orderName} 
                                {$orderSort} ",
                             [$project_id,$interface_id,$search,$search,$start,$end]); 
        return $result;
     
    }
    public function getIFAffairsInfo($project_id, $interface_id, $timespan)
    {
        date_default_timezone_set('PRC');
        $project_id = 1;
        $interface_id = 2;
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        $result = array();
        $result = DB::select('select response_time, ave_link_time, ave_process_time,
          ave_page_size, UNIX_TIMESTAMP(timestamp) as t from  interface_perfomance where project_id = ?
        and interface_id = ? and timestamp between ? and ?',[$project_id,$interface_id,$start,$end]);
        return $result;
      
    }
    public function getIFMap($project_id, $interface_id, $timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $project_id = 1; 
        $interface_id = 1; 
        $timespan = 30; 
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        $result = DB::select('select * from  interface_perfomance as a join province as b on a.province_id = 
               b.province_id    where project_id = ?
        and interface_id = ? and timestamp between ? and ?',[$project_id,$interface_id,$start,$end]);

        return $result;
      
    }
    public function getMachineRoomInfo($project_id, $timespan, 
            $search, $orderName, $orderSort, $index, $length)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time(); 
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        //$orderName = "a.".$orderName;
        if($search != "")
        {
            $search = "%".$search."%";
        }
        $result = DB::select("select * from  interface_perfomance as a 
                    join  machine_room as b on a.machine_room_id = b.machine_room_id 
                 where a.project_id = ?
            and (\"\" = ? or b.machine_room_name like ?)  and timestamp between ? and ? order by {$orderName} 
                                {$orderSort} ",
                             [$project_id,$search,$search,$start,$end]); 
        return $result;
    }
    public function getMRServerInfo($project_id, $machine_room_id, $timespan, 
            $search, $orderName, $orderSort, $index, $length)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $server_id = 1;
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        if($search != "")
        {
            $search = "%".$search."%";
        }
        $result = DB::select("select * from  interface_perfomance as a 
                    join  server as b on a.server_id = b.server_id 
                 where a.project_id = ? and a.machine_room_id = ?
            and (\"\" = ? or b.server_name like ?)  and timestamp between ? and ? order by {$orderName} 
                                {$orderSort} ",
                             [$project_id,$machine_room_id,$search,$search,$start,$end]); 
        return $result;
    }
    public function getMRAffairsInfo($project_id, $machine_room_id, $timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        $result = DB::select('select response_time, ave_link_time, ave_process_time,
          ave_page_size, UNIX_TIMESTAMP(timestamp) as t  from  interface_perfomance where project_id = ?
        and machine_room_id = ? and timestamp between ? and ?',[$project_id,$machine_room_id,$start,$end]);
        return $result;
      
    }
    public function getMRMap($project_id, $machine_room_id, $timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        $result = DB::select('select *  from  interface_perfomance as a join province as b
            on a.province_id = b.province_id  where project_id = ?
        and machine_room_id = ? and timestamp between ? and ?',[$project_id,$machine_room_id,$start,$end]);
        return $result;
      
    }
    public function getServerInfo($project_id, $timespan, 
            $search, $orderName, $orderSort, $index, $length)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        if($search != "")
        {
            $search = "%".$search."%";
        }
        $result = DB::select("select * from  interface_perfomance as a 
                    join  server as b on a.server_id = b.server_id 
                    join  machine_room as c on a.machine_room_id = b.machine_room_id 
                 where a.project_id = ? 
            and (\"\" = ? or b.server_name like ?)  and timestamp between ? and ? order by {$orderName} 
                                {$orderSort} ",
                             [$project_id,$search,$search,$start,$end]); 
        return $result;
    }
    public function getServerIFInfo($project_id, $server_id, $timespan, 
            $search, $orderName, $orderSort, $index, $length)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $server_id = 1;
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        if($search != "")
        {
            $search = "%".$search."%";
        }
        $result = DB::select("select * from  interface_perfomance as a 
                    join  interface as b on a.interface_id = b.interface_id 
                 where a.project_id = ? and a.server_id = ? 
            and (\"\" = ? or b.interface_name like ?)  and timestamp between ? and ? order by {$orderName} 
                                {$orderSort} ",
                             [$project_id,$server_id,$search,$search,$start,$end]); 
        return $result;
    }
    public function getServerAffairsInfo($project_id, $server_id, $timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        $result = DB::select('select response_time, ave_link_time, ave_process_time,
          ave_page_size, UNIX_TIMESTAMP(timestamp) as t  from  interface_perfomance where project_id = ?
        and server_id = ? and timestamp between ? and ?',[$project_id,$server_id,$start,$end]);
        return $result;
      
    }
    public function getServerMap($project_id, $server_id, $timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $start= $now - ($timespan * 60);
        $end = $now;
        $start = date('Y-m-d H:i:s',$start);      //这种时间区间也可以直接比较搜索
        $end = date('Y-m-d H:i:s',$end);      //这种时间区间也可以直接比较搜索
        $result = DB::select('select *  from  interface_perfomance as a
                join province as b on a.province_id = b.province_id
         where project_id = ? and server_id = ? and timestamp between ? and ?',[$project_id,$server_id,$start,$end]);
        return $result;
    }
      
}
?>
