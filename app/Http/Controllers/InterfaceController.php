<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests;
use DB;
use App\Model\SqlPacket\createDataTable; 
use App\Model\SqlPacket\projectTable; 
use App\Model\SqlPacket\baseTable; 
use App\Model\SqlPacket\interfacePerfomanceTable; 
use App\Model\SqlPacket\createInterfacePerformanceTable; 
use App\Model\SqlPacket\produceBaseConfigDataTable; 
use App\Model\FormatConvert\formatConvert; 

class InterfaceController extends Controller 
{

     public function home(Request $request)
      {
          $name = $request->input('name','');
          return view('admin.monitor_items');                                                                                        
      }   
      public function room(Request $request)
      {   
          return view('admin.monitor_room');
      }
      public function server(Request $request)
      {   
          return view('admin.monitor_server');
      }
      public function main(Request $request)
      {   
          return view('admin.monitor_main');
      }
      public function port(Request $request)
      {   
          return view('admin.monitor_port');
      }

    public function produceRandomData()
    {      
        $createInterfacePerformanceTable = new CreateInterfacePerformanceTable("interface_perfomance");        
        $createInterfacePerformanceTable->insertInterfacePerformanceData();
    }

    public function produceBaseConfigData()
    {      
        $produceBaseConfigDataTable = new ProduceBaseConfigDataTable();        
        $produceBaseConfigDataTable->insertBaseConfigData();
    }
    
    public function createTable()
    {
        $a = new BaseTable();
        $arr = array();
        array_push($arr,1);
        array_push($arr,1);
        array_push($arr,1);
        array_push($arr,1);
        array_push($arr,2);
        array_push($arr,4000);
        array_push($arr,0.01);
        array_push($arr,0.009);
        array_push($arr,0.1);
        array_push($arr,100.011);
        array_push($arr,0.8);
        $create = new CreateDataTable("interface_perfomance");
        //echo "sb";
        $create->baseInsert(2,$arr);
    }
    //
    public function getProgramInfo()
    {
        $arr1 = array();
        $arr2 = array();
        $index = 0;
        $length = 10;
        $project = new ProjectTable("project");
        $format = new FormatConvert();
        $result = $project->getProgramInfo();  
        foreach($result as $value)
        {
            $arr1['project_id'] = $value->project_id;
            $arr1['project_name'] = trim($value->project_name);
            array_push($arr2,$arr1);
        }
        return $arr2;
    }

    public function getErrorProb(Request $request)
    {
        $project_id = $request->input('id_project','');
        $timespan = $request->input('timespan','');
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $format = new FormatConvert();
        $result = $interfacePerfomance->getErrorProb($project_id,$timespan);  
        return response()->json($format->getErrorConvertToJson($result,$timespan));
    }

    public function getProjectAffairsInfo(Request $request)
    {
        $project_id = $request->input('id_project','');
        $timespan = $request->input('timespan','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getProjectAffairsInfo($project_id,$timespan);  
         
        return response()->json($format->getProjectAffairsInfoConvertToJson($result,$timespan));


    }
    public function getProjectScore(Request $request)
    {
        $project_id = $request->input('id_project','');
        $timespan = $request->input('timespan','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getProjectScore($project_id,$timespan);  
        $score = $format->getProjectScoreConvertToJson($result,$timespan);
        return round($score,2);

    }
    public function getInterfaceInfo(Request $request)
    {
        $project_id = $request->input('id_project','');
        $timespan = $request->input('timespan','');
        $search = $request->input('search','')['value'];
        $order = $request->input('order','');
        $orderName = $request->input('columns','')[$order[0]['column']]['data'];
        $orderSort = $order[0]['dir'];
        $index = $request->input('start','');
        $length = $request->input('length','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getInterfaceInfo($project_id, $timespan, 
                        $search, $orderName, $orderSort, $index, $length);  
        return response()->json($format->getInterfaceInfoConvertToJson($result,$index,$length));

    }
     public function getIFServerInfo(Request $request)
     {
        $project_id = $request->input('id_project','');
        $interface_id = $request->input('id_IF','');
        $timespan = $request->input('timespan','');
        $search = $request->input('search','')['value'];
        $order = $request->input('order','');
        $orderName = $request->input('columns','')[$order[0]['column']]['data'];
        $orderSort = $order[0]['dir'];
        $index = $request->input('start','');
        $length = $request->input('length','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getIFServerInfo($project_id, $timespan, $interface_id, 
                        $search, $orderName, $orderSort, $index, $length);  
        return response()->json($format->getIFServerInfoConvertToJson($result,$index,$length));
     }
     public function getIFAffairsInfo(Request $request)
     {
        $project_id = $request->input('id_project','');
        $interface_id = $request->input('id_IF','');
        $timespan = $request->input('timespan','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getIFAffairsInfo($project_id, $interface_id, $timespan);  
        return response()->json($format->getIFAffairsInfoConvertToJson($result,$timespan));
     }

     public function getIFMap(Request $request)
     {
        $project_id = $request->input('id_project','');
        $interface_id  = $request->input('id_IF','');
        $timespan = $request->input('timespan','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getIFMap($project_id, $interface_id, $timespan);  
        return response()->json($format->getIFMapConvertToJson($result,$timespan));

     }

    public function getMachineRoomInfo(Request $request)
    {
        $project_id = $request->input('id_project','');
        $timespan = $request->input('timespan','');
        $search = $request->input('search','')['value'];
        $order = $request->input('order','');
        $orderName = $request->input('columns','')[$order[0]['column']]['data'];
        $orderSort = $order[0]['dir'];
        $index = $request->input('start','');
        $length = $request->input('length','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getMachineRoomInfo($project_id, $timespan, 
                        $search, $orderName, $orderSort, $index, $length);  
        return response()->json($format->getMachineRoomInfoConvertToJson($result,$index,$length));
    }
    public function getMRServerInfo(Request $request)
    {
        $project_id = $request->input('id_project','');
        $MR_id = $request->input('id_MR','');
        $timespan = $request->input('timespan','');
        $search = $request->input('search','')['value'];
        $order = $request->input('order','');
        $orderName = $request->input('columns','')[$order[0]['column']]['data'];
        $orderSort = $order[0]['dir'];
        $index = $request->input('start','');
        $length = $request->input('length','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getMRServerInfo($project_id, $MR_id, $timespan, 
                        $search, $orderName, $orderSort, $index, $length);  
        //echo var_dump($result);
        return response()->json($format->getMRServerInfoConvertToJson($result,$index,$length));
    }

    public function getMRAffairsInfo(Request $request)
    {
        $project_id = $request->input('id_project','');
        $MR_id = $request->input('id_MR','');
        $timespan = $request->input('timespan','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getMRAffairsInfo($project_id, $MR_id, $timespan);  
        return response()->json($format->getMRAffairsInfoConvertToJson($result,$timespan));

    }
    public function getMRMap(Request $request)
    {
        $project_id = $request->input('id_project','');
        $MR_id = $request->input('id_MR','');
        $timespan = $request->input('timespan','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getMRMap($project_id, $MR_id, $timespan);  
        return response()->json($format->getMRMapConvertToJson($result));

    }
    public function getServerInfo(Request $request)
    {
        $project_id = $request->input('id_project','');
        $timespan = $request->input('timespan','');
        $search = $request->input('search','')['value'];
        $order = $request->input('order','');
        $orderName = $request->input('columns','')[$order[0]['column']]['data'];
        $orderSort = $order[0]['dir'];
        $index = $request->input('start','');
        $length = $request->input('length','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getServerInfo($project_id, $timespan, 
                        $search, $orderName, $orderSort, $index, $length);  
        return response()->json($format->getServerInfoConvertToJson($result, $index, $length));

    } 
    public function getServerIFInfo(Request $request)
    {
        $project_id = $request->input('id_project','');
        $server_id = $request->input('id_server','');
        $timespan = $request->input('timespan','');
        $search = $request->input('search','')['value'];
        $order = $request->input('order','');
        $orderName = $request->input('columns','')[$order[0]['column']]['data'];
        $orderSort = $order[0]['dir'];
        $index = $request->input('start','');
        $length = $request->input('length','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getServerIFInfo($project_id, $server_id, $timespan, 
                        $search, $orderName, $orderSort, $index, $length);  
        return response()->json($format->getServerIFInfoConvertToJson($result, $index, $length));
    }
    public function getServerAffairsInfo(Request $request)
    {
        $project_id = $request->input('id_project','');
        $server_id = $request->input('id_server','');
        $timespan = $request->input('timespan','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getServerAffairsInfo($project_id, $server_id, $timespan);  
        return response()->json($format->getServerAffairsInfoConvertToJson($result,$timespan));

    }
    public function getServerMap(Request $request)
    {
        $project_id = $request->input('id_project','');
        $server_id = $request->input('id_server','');
        $timespan = $request->input('timespan','');
        $format = new FormatConvert();
        $interfacePerfomance = new InterfacePerfomanceTable("interface_perfomance");
        $result = $interfacePerfomance->getServerMap($project_id, $server_id, $timespan);  
        return response()->json($format->getServerMapConvertToJson($result));
    }
}
