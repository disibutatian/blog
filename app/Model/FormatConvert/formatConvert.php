<?php
namespace App\Model\FormatConvert;    

//代码可以优化，抽象出公共的功能函数

class FormatConvert
{
    public function __construct() 
    {

    }
    public function convertToJson1($data)
    {
        //echo var_dump($data);
        $arr1 = array();
        $arr2 = array();
        foreach($data as $key => $value)
        {
            $temp['name'] = $value;
            array_push($arr1,$temp);
            
        }
        $arr2['data'] = $arr1;
        $arr2['recordsTotal'] = count($arr1);
        $arr2['recordsFiltered'] = count($arr1);

        return $arr2;

    }
    public function getProgramInfoConvertToJson($result,$index,$length)
    {
        // echo var_dump($result);
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $count = 0;
        $count1 = 0;

        foreach($result as $value)
        {
           $arr1['name'] = $value->project_name;
           $arr1['id'] = $value->project_id;
           array_push($arr2,$arr1);
           $count += 1;
        }   
        $count1 = $count;
        $count = $count - $length * $index;
        $x = 0;
        $y = 1;
        foreach($arr6 as $value)
        {
            if($x >= $index && $y <= $length){
               array_push($arr7,$value);
                   $y += 1;
            } else {
                $x += 1;
            }
            if($y > $length)
            {
                break;
            }
        }
        $arr4['data'] = $arr7;
        $arr4['recordsTotal'] = $count1;
        $arr4['recordsFiltered'] = $count1;
        return $arr4;
    }
    public function getErrorConvertToJson($result,$timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $span = $timespan * 60 / $interval ;
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        for($x = 1;$x <= $interval;$x++)
        {
            $count = 0;
            $error = 0.0;
            $number = 0;
            $end = $now - ($x - 1) * $span;
            $start = $now - $x * $span;
            foreach($result as $key => $value)
            {
               if( intval($value->t) >= $start && intval($value->t) <= $end)
                {
                    $error += $value->error_rate;
                    $number += $value->response_time;
                    $count += 1;
                }
            }
            if($count) {
                $error = $error / $count;
                $number = $number;
            }
            array_unshift($arr1,$error);
            array_unshift($arr2,$number);
            array_unshift($arr3,date('Y-m-d H:i:s',$end));
        }
        
        $arr4['error'] = $arr1;
        $arr4['total'] = $arr2;
        $arr4['category'] = $arr3;
        return $arr4;
     }
    public function getProjectAffairsInfoConvertToJson($result,$timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $span = $timespan * 60 / $interval ;
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        for($x = 1;$x <= $interval;$x++)
        {
            $count = 0;
            $link = 0.0;
            $process = 0.0;
            $response = 0;
            $length = 0.0;
            $end = $now - ($x - 1) * $span;
            $start = $now - $x * $span;
            foreach($result as $key => $value)
            {
               if( intval($value->t) >= $start && intval($value->t) <= $end)
                {
                    $link += $value->ave_link_time;
                    $process = $value->ave_process_time;
                    $response = $value->response_time;
                    $length = $value->ave_page_size;
                    $count += 1;
                }
            }
            if($count) {
                $link = $link / $count;
                $process = $process / $count;
                $length = $length / $count;
            }
            array_unshift($arr1,$link);
            array_unshift($arr2,$process);
            array_unshift($arr3,$length);
            array_unshift($arr4,$response);
            array_unshift($arr5,date('Y-m-d H:i:s',$end));
        }
        
        $arr6['link'] = $arr1;
        $arr6['process'] = $arr2;
        $arr6['length'] = $arr3;
        $arr6['response'] = $arr4;
        $arr6['category'] = $arr5;
        return $arr6;
    } 
    public function getInterfaceInfoConvertToJson($result,$index,$length)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        $arr7 = array();
        $arr8 = array();
        foreach($result as $value)
        {
           $interface_id = $value->interface_id;
           if (array_key_exists($interface_id, $arr2) ) {
                $arr2[$interface_id][6] += $value->ave_link_time;
                $arr2[$interface_id][7] += $value->ave_process_time;
                $arr2[$interface_id][8] += $value->error_rate;
                $arr2[$interface_id][9] += $value->ave_page_size;
                $arr2[$interface_id][11] += $value->score;
                $arr2[$interface_id][12] += 1;
           } else {
               $arr2[$value->interface_id] = array();
                array_push($arr2[$value->interface_id],$value->interface_id);             // 0 
                array_push($arr2[$value->interface_id],$value->interface_name);           
                array_push($arr2[$value->interface_id],$value->server_id);                //2    
                array_push($arr2[$value->interface_id],$value->server_name); 
                array_push($arr2[$value->interface_id],$value->machine_room_id);          
                array_push($arr2[$value->interface_id],$value->machine_room_name); 
                array_push($arr2[$value->interface_id],$value->ave_link_time);            //6
                array_push($arr2[$value->interface_id],$value->ave_process_time);         //7
                array_push($arr2[$value->interface_id],$value->error_rate);               //8
                array_push($arr2[$value->interface_id],$value->ave_page_size);            //9
                array_push($arr2[$value->interface_id],$value->response_time);            
                array_push($arr2[$value->interface_id],$value->score);                     //11
                array_push($arr2[$value->interface_id],1);                                //12
           }
        }
        $count = 0;     //记录多少个接口
        $count1 = 0;     //记录多少个接口
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][6] = $arr2[$key][6] / $value[12];   
           $arr2[$key][7] = $arr2[$key][7] / $value[12];   
           $arr2[$key][8] = $arr2[$key][8] / $value[12];   
           $arr2[$key][9] = $arr2[$key][9] / $value[12];   
           $arr2[$key][11] = $arr2[$key][11] / $value[12];   
           $arr5['interface_id'] =  $arr2[$key][0]; 
           $arr5['interface_name'] =  $arr2[$key][1]; 
           $arr5['server_id'] =  $arr2[$key][2]; 
           $arr5['server_name'] =  $arr2[$key][3]; 
           $arr5['machine_room_id'] = $arr2[$key][4];   
           $arr5['machine_room_name'] = $arr2[$key][5];   
           $arr5['ave_link_time'] = round($arr2[$key][6],2);   
           $arr5['ave_process_time'] = round($arr2[$key][7],2);   
           $arr5['error_rate'] = round($arr2[$key][8],2);   
           $arr5['ave_page_size'] = round($arr2[$key][9],2);    
           $arr5['response_times'] = round($arr2[$key][10],2);   
           $arr5['score'] = round($arr2[$key][11],0);   
           $count = $count + 1;
           array_push($arr6,$arr5);
        }
        $count1 = $count;
        $count = $count - $length * $index;
        $x = 0;
        $y = 1;
        foreach($arr6 as $value)
        {
            if($x >= $index && $y <= $length){
               array_push($arr7,$value);
                   $y += 1;
            } else {
                $x += 1;
            }
            if($y > $length)
            {
                break;
            }
        }
        $arr4['data'] = $arr7;
        $arr4['recordsTotal'] = $count1;
        $arr4['recordsFiltered'] = $count1;
        return $arr4; 
    }
    public function getIFServerInfoConvertToJson($result,$index,$length)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        $arr7 = array();
        $arr8 = array();
        foreach($result as $value)
        {
           $server_id = $value->server_id;
           if (array_key_exists($server_id, $arr2) ) {
                $arr2[$server_id][4] += $value->ave_link_time;
                $arr2[$server_id][5] += $value->ave_process_time;
                $arr2[$server_id][6] += $value->error_rate;
                $arr2[$server_id][7] += $value->ave_page_size;
                $arr2[$server_id][9] += $value->score;
                $arr2[$server_id][10] += 1;
           } else {
               $arr2[$value->server_id] = array();
                array_push($arr2[$value->server_id],$value->server_id);                //0    
                array_push($arr2[$value->server_id],$value->server_name); 
                array_push($arr2[$value->server_id],$value->machine_room_id);          
                array_push($arr2[$value->server_id],$value->machine_room_name); 
                array_push($arr2[$value->server_id],$value->ave_link_time);            //4
                array_push($arr2[$value->server_id],$value->ave_process_time);         //5
                array_push($arr2[$value->server_id],$value->error_rate);               //6
                array_push($arr2[$value->server_id],$value->ave_page_size);            //7
                array_push($arr2[$value->server_id],$value->response_time);            
                array_push($arr2[$value->server_id],$value->score);                     //9
                array_push($arr2[$value->server_id],1);                                //10
           }
        }
        $count = 0;     //记录多少个接口
        $count1 = 0;     //记录多少个接口
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][4] = $arr2[$key][4] / $value[10];   
           $arr2[$key][5] = $arr2[$key][5] / $value[10];   
           $arr2[$key][6] = $arr2[$key][6] / $value[10];   
           $arr2[$key][7] = $arr2[$key][7] / $value[10];   
           $arr2[$key][9] = $arr2[$key][9] / $value[10];   
           $arr5['server_id'] =  $arr2[$key][0]; 
           $arr5['server_name'] =  $arr2[$key][1]; 
           $arr5['machine_room_id'] = $arr2[$key][2];   
           $arr5['machine_room_name'] = $arr2[$key][3];   
           $arr5['ave_link_time'] = round($arr2[$key][4],2);   
           $arr5['ave_process_time'] = round($arr2[$key][5],2);   
           $arr5['error_rate'] = round($arr2[$key][6],2);   
           $arr5['ave_page_size'] = round($arr2[$key][7],2);    
           $arr5['response_times'] = round($arr2[$key][8],0);   
           $arr5['score'] = round($arr2[$key][9],2);   
           $count = $count + 1;
           array_push($arr6,$arr5);
        }
        $count1 = $count;
        $count = $count - $length * $index;
        $x = 0;
        $y = 1;
        foreach($arr6 as $value)
        {
            if($x >= $index && $y <= $length){
               array_push($arr7,$value);
                   $y += 1;
            } else {
                $x += 1;
            }
            if($y > $length)
            {
                break;
            }
        }
        $arr4['data'] = $arr7;
        $arr4['recordsTotal'] = $count1;
        $arr4['recordsFiltered'] = $count1;
        return $arr4; 
    }
    public function getIFAffairsInfoConvertToJson($result,$timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $span = $timespan * 60 / $interval ;
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        for($x = 1;$x <= $interval;$x++)
        {
            $count = 0;
            $link = 0.0;
            $process = 0.0;
            $response = 0;
            $length = 0.0;
            $end = $now - ($x - 1) * $span;
            $start = $now - $x * $span;
            foreach($result as $key => $value)
            {
               if( intval($value->t) >= $start && intval($value->t) <= $end)
                {
                    $link += $value->ave_link_time;
                    $process = $value->ave_process_time;
                    $response = $value->response_time;
                    $length = $value->ave_page_size;
                    $count += 1;
                }
            }
            if($count) {
                $link = $link / $count;
                $process = $process / $count;
                $length = $length / $count;
            }
            array_unshift($arr1,$link);
            array_unshift($arr2,$process);
            array_unshift($arr3,$length);
            array_unshift($arr4,$response);
            array_unshift($arr5,date('Y-m-d H:i:s',$end));
        }
        
        $arr6['link'] = $arr1;
        $arr6['process'] = $arr2;
        $arr6['length'] = $arr3;
        $arr6['response'] = $arr4;
        $arr6['category'] = $arr5;
        
        return $arr6;
    } 
    
    public function getProjectScoreConvertToJson($result,$timespan)
    {
        $count = 0; 
        $score = 0;
        foreach($result as $value) {
            $count += 1;
            $score += $value->score;
        }
        if($count) {
            $score = $score / $count ;
        }
        return $score;
    }

    public function getIFMapConvertToJson($result)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        foreach($result as $value) 
        {
           $province_id = $value->province_id;
           if (array_key_exists($province_id, $arr2) ) {
                $arr2[$province_id][2] += $value->ave_link_time;
                $arr2[$province_id][3] += $value->ave_process_time;
                $arr2[$province_id][4] += $value->response_time;
                $arr2[$province_id][5] += 1;
           } else {
                $arr2[$value->province_id] = array();
                array_push($arr2[$value->province_id],$value->province_id);                //0    
                array_push($arr2[$value->province_id],$value->province_name);            //1 
                array_push($arr2[$value->province_id],$value->ave_link_time);            //2
                array_push($arr2[$value->province_id],$value->ave_process_time);         //3
                array_push($arr2[$value->province_id],$value->response_time); 
                array_push($arr2[$value->province_id],1);          
           }
        }
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][2] = $arr2[$key][2] / $value[5];   
           $arr2[$key][3] = $arr2[$key][3] / $value[5];   
        }
        foreach($arr2 as $key => $value)
        {
            $arr1['name'] = trim($value[1]);             
            $arr1['value'] = $value[2];             
            array_push($arr3,$arr1);
            $arr1['value'] = $value[3];             
            array_push($arr4,$arr1);
            $arr1['value'] = $value[4];             
            array_push($arr5,$arr1);
        }
        
        $arr6['link'] = $arr3;
        $arr6['process'] = $arr4;
        $arr6['times'] = $arr5;
        return $arr6;
    }
    public function getMachineRoomInfoConvertToJson($result,$index,$length)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        $arr7 = array();
        $arr8 = array();
        foreach($result as $value)
        {
           $machine_room_id = $value->machine_room_id;
           if (array_key_exists($machine_room_id, $arr2) ) {
                $arr2[$machine_room_id][2] += $value->ave_link_time;
                $arr2[$machine_room_id][3] += $value->ave_process_time;
                $arr2[$machine_room_id][4] += $value->error_rate;
                $arr2[$machine_room_id][5] += $value->ave_page_size;
                $arr2[$machine_room_id][7] += $value->score;
                $arr2[$machine_room_id][8] += 1;
           } else {
               $arr2[$value->machine_room_id] = array();
                array_push($arr2[$value->machine_room_id],$value->machine_room_id);         //0 
                array_push($arr2[$value->machine_room_id],$value->machine_room_name); 
                array_push($arr2[$value->machine_room_id],$value->ave_link_time);            //2
                array_push($arr2[$value->machine_room_id],$value->ave_process_time);         //3
                array_push($arr2[$value->machine_room_id],$value->error_rate);               //4
                array_push($arr2[$value->machine_room_id],$value->ave_page_size);            //5
                array_push($arr2[$value->machine_room_id],$value->response_time);            
                array_push($arr2[$value->machine_room_id],$value->score);                     //7
                array_push($arr2[$value->machine_room_id],1);                                //8
           }
        }
        $count = 0;     
        $count1 = 0;     
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][2] = $arr2[$key][2] / $value[8];   
           $arr2[$key][3] = $arr2[$key][3] / $value[8];   
           $arr2[$key][4] = $arr2[$key][4] / $value[8];   
           $arr2[$key][5] = $arr2[$key][5] / $value[8];   
           $arr2[$key][7] = $arr2[$key][7] / $value[8];   
           $arr5['machine_room_id'] =  $arr2[$key][0]; 
           $arr5['machine_room_name'] = $arr2[$key][1];   
           $arr5['ave_link_time'] = round($arr2[$key][2],2);   
           $arr5['ave_process_time'] = round($arr2[$key][3],2);   
           $arr5['error_rate'] = round($arr2[$key][4],2);   
           $arr5['ave_page_size'] = round($arr2[$key][5],2);    
           $arr5['response_times'] = round($arr2[$key][6],0);   
           $arr5['score'] = round($arr2[$key][7],2);   
           $count = $count + 1;
        }
        $count1 = $count;
        $count = $count - $length * $index;
        $x = 0;
        $y = 1;
        foreach($arr6 as $value)
        {
            if($x >= $index && $y <= $length){
               array_push($arr7,$value);
                   $y += 1;
            } else {
                $x += 1;
            }
            if($y > $length)
            {
                break;
            }
        }
        $arr4['data'] = $arr7;
        $arr4['recordsTotal'] = $count1;
        $arr4['recordsFiltered'] = $count1;
        return $arr4; 
    }
    public function getMRServerInfoConvertToJson($result,$index,$length)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        $arr7 = array();
        $arr8 = array();
        foreach($result as $value)
        {
           $server_id = $value->server_id;
           if (array_key_exists($server_id, $arr2) ) {
                $arr2[$server_id][2] += $value->ave_link_time;
                $arr2[$server_id][3] += $value->ave_process_time;
                $arr2[$server_id][4] += $value->error_rate;
                $arr2[$server_id][5] += $value->ave_page_size;
                $arr2[$server_id][7] += $value->score;
                $arr2[$server_id][8] += 1;
           } else {
               $arr2[$value->server_id] = array();
                array_push($arr2[$value->server_id],$value->server_id);         //0 
                array_push($arr2[$value->server_id],$value->server_name); 
                array_push($arr2[$value->server_id],$value->ave_link_time);            //2
                array_push($arr2[$value->server_id],$value->ave_process_time);         //3
                array_push($arr2[$value->server_id],$value->error_rate);               //4
                array_push($arr2[$value->server_id],$value->ave_page_size);            //5
                array_push($arr2[$value->server_id],$value->response_time);            
                array_push($arr2[$value->server_id],$value->score);                     //7
                array_push($arr2[$value->server_id],1);                                //8
           }
        }
        $count = 0;     
        $count1 = 0;     
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][2] = $arr2[$key][2] / $value[8];   
           $arr2[$key][3] = $arr2[$key][3] / $value[8];   
           $arr2[$key][4] = $arr2[$key][4] / $value[8];   
           $arr2[$key][5] = $arr2[$key][5] / $value[8];   
           $arr2[$key][7] = $arr2[$key][7] / $value[8];   
            $arr5['server_id'] =  $arr2[$key][0]; 
            $arr5['server_name'] = $arr2[$key][1];   
            $arr5['ave_link_time'] = round($arr2[$key][2],2);   
            $arr5['ave_process_time'] = round($arr2[$key][3],2);   
            $arr5['error_rate'] = round($arr2[$key][4],2);   
            $arr5['ave_page_size'] = round($arr2[$key][5],2);    
            $arr5['response_times'] = round($arr2[$key][6],0);   
            $arr5['score'] = round($arr2[$key][7],2);   
            $count = $count + 1;
            array_push($arr6,$arr5);
        }
        $count1 = $count;
        $count = $count - $length * $index;
        $x = 0;
        $y = 1;
        foreach($arr6 as $value)
        {
            if($x >= $index && $y <= $length){
               array_push($arr7,$value);
                   $y += 1;
            } else {
                $x += 1;
            }
            if($y > $length)
            {
                break;
            }
        }
        $arr4['data'] = $arr7;
        $arr4['recordsTotal'] = $count1;
        $arr4['recordsFiltered'] = $count1;
        return $arr4; 
    }
    public function getMRAffairsInfoConvertToJson($result,$timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $span = $timespan * 60 / $interval ;
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        for($x = 1;$x <= $interval;$x++)
        {
            $count = 0;
            $link = 0.0;
            $process = 0.0;
            $response = 0;
            $length = 0.0;
            $end = $now - ($x - 1) * $span;
            $start = $now - $x * $span;
            foreach($result as $key => $value)
            {
               if( intval($value->t) >= $start && intval($value->t) <= $end)
                {
                    $link += $value->ave_link_time;
                    $process = $value->ave_process_time;
                    $response = $value->response_time;
                    $length = $value->ave_page_size;
                    $count += 1;
                }
            }
            if($count) {
                $link = $link / $count;
                $process = $process / $count;
                $length = $length / $count;
            }
            array_unshift($arr1,$link);
            array_unshift($arr2,$process);
            array_unshift($arr3,$length);
            array_unshift($arr4,$response);
            array_unshift($arr5,date('Y-m-d H:i:s',$end));
        }
        
        $arr6['link'] = $arr1;
        $arr6['process'] = $arr2;
        $arr6['length'] = $arr3;
        $arr6['response'] = $arr4;
        $arr6['category'] = $arr5;
        
        return $arr6;
    } 
    public function getMRMapConvertToJson($result)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        foreach($result as $value) 
        {
           $province_id = $value->province_id;
           if (array_key_exists($province_id, $arr2) ) {
                $arr2[$province_id][2] += $value->ave_link_time;
                $arr2[$province_id][3] += $value->ave_process_time;
                $arr2[$province_id][4] += $value->response_time;
                $arr2[$province_id][5] += 1;
           } else {
                $arr2[$value->province_id] = array();
                array_push($arr2[$value->province_id],$value->province_id);                //0    
                array_push($arr2[$value->province_id],$value->province_name);            //1 
                array_push($arr2[$value->province_id],$value->ave_link_time);            //2
                array_push($arr2[$value->province_id],$value->ave_process_time);         //3
                array_push($arr2[$value->province_id],$value->response_time); 
                array_push($arr2[$value->province_id],1);          
           }
        }
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][2] = $arr2[$key][2] / $value[5];   
           $arr2[$key][3] = $arr2[$key][3] / $value[5];   
        }
        foreach($arr2 as $key => $value)
        {
            $arr1['name'] = trim($value[1]);             
            $arr1['value'] = $value[2];             
            array_push($arr3,$arr1);
            $arr1['value'] = $value[3];             
            array_push($arr4,$arr1);
            $arr1['value'] = $value[4];             
            array_push($arr5,$arr1);
        }
        
        $arr6['link'] = $arr3;
        $arr6['process'] = $arr4;
        $arr6['times'] = $arr5;
        return $arr6;
    }
    public function getServerInfoConvertToJson($result,$index,$length)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        $arr7 = array();
        $arr8 = array();
        foreach($result as $value)
        {
           $server_id = $value->server_id;
           if (array_key_exists($server_id, $arr2) ) {
                $arr2[$server_id][4] += $value->ave_link_time;
                $arr2[$server_id][5] += $value->ave_process_time;
                $arr2[$server_id][6] += $value->error_rate;
                $arr2[$server_id][7] += $value->ave_page_size;
                $arr2[$server_id][9] += $value->score;
                $arr2[$server_id][10] += 1;
           } else {
               $arr2[$value->server_id] = array();
                array_push($arr2[$value->server_id],$value->server_id);         //0 
                array_push($arr2[$value->server_id],$value->server_name); 
                array_push($arr2[$value->server_id],$value->machine_room_id);         //0 
                array_push($arr2[$value->server_id],$value->machine_room_name); 
                array_push($arr2[$value->server_id],$value->ave_link_time);            //2
                array_push($arr2[$value->server_id],$value->ave_process_time);         //3
                array_push($arr2[$value->server_id],$value->error_rate);               //4
                array_push($arr2[$value->server_id],$value->ave_page_size);            //5
                array_push($arr2[$value->server_id],$value->response_time);            
                array_push($arr2[$value->server_id],$value->score);                     //7
                array_push($arr2[$value->server_id],1);                                //8
           }
        }
        $count = 0;     
        $count1 = 0;     
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][4] = $arr2[$key][4] / $value[10];   
           $arr2[$key][5] = $arr2[$key][5] / $value[10];   
           $arr2[$key][6] = $arr2[$key][6] / $value[10];   
           $arr2[$key][7] = $arr2[$key][7] / $value[10]; 
           $arr2[$key][9] = $arr2[$key][9] / $value[10];   
            $arr5['server_id'] = $arr2[$key][0]; 
            $arr5['server_name'] = $arr2[$key][1];   
            $arr5['machine_room_id'] =  $arr2[$key][2]; 
            $arr5['machine_room_name'] = $arr2[$key][3];   
            $arr5['ave_link_time'] = round($arr2[$key][4],2);   
            $arr5['ave_process_time'] = round($arr2[$key][5],2);   
            $arr5['error_rate'] = round($arr2[$key][6],2);   
            $arr5['ave_page_size'] = round($arr2[$key][7],2);    
            $arr5['response_times'] = round($arr2[$key][8],2);   
            $arr5['score'] = round($arr2[$key][9],2);   
            $count = $count + 1;
            array_push($arr6,$arr5);
        }
        $count1 = $count;
        $count = $count - $length * $index;
        $x = 0;
        $y = 1;
        foreach($arr6 as $value)
        {
            if($x >= $index && $y <= $length){
               array_push($arr7,$value);
                   $y += 1;
            } else {
                $x += 1;
            }
            if($y > $length)
            {
                break;
            }
        }
        $arr4['data'] = $arr7;

        $arr4['recordsTotal'] = $count1;
        $arr4['recordsFiltered'] = $count1;
        return $arr4; 
    }
    public function getServerIFInfoConvertToJson($result,$index,$length)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        $arr7 = array();
        $arr8 = array();
        foreach($result as $value)
        {
           $interface_id = $value->interface_id;
           if (array_key_exists($interface_id, $arr2) ) {
                $arr2[$interface_id][2] += $value->ave_link_time;
                $arr2[$interface_id][3] += $value->ave_process_time;
                $arr2[$interface_id][4] += $value->error_rate;
                $arr2[$interface_id][5] += $value->ave_page_size;
                $arr2[$interface_id][7] += $value->score;
                $arr2[$interface_id][8] += 1;
           } else {
               $arr2[$value->interface_id] = array();
                array_push($arr2[$value->interface_id],$value->interface_id);         //0 
                array_push($arr2[$value->interface_id],$value->interface_name); 
                array_push($arr2[$value->interface_id],$value->ave_link_time);            //2
                array_push($arr2[$value->interface_id],$value->ave_process_time);         //3
                array_push($arr2[$value->interface_id],$value->error_rate);               //4
                array_push($arr2[$value->interface_id],$value->ave_page_size);            //5
                array_push($arr2[$value->interface_id],$value->response_time);            
                array_push($arr2[$value->interface_id],$value->score);                     //7
                array_push($arr2[$value->interface_id],1);                                //8
           }
        }
        $count = 0;     
        $count1 = 0;     
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][2] = $arr2[$key][2] / $value[8];   
           $arr2[$key][3] = $arr2[$key][3] / $value[8];   
           $arr2[$key][4] = $arr2[$key][4] / $value[8];   
           $arr2[$key][5] = $arr2[$key][5] / $value[8];   
           $arr2[$key][7] = $arr2[$key][7] / $value[8];   
            $arr5['interface_id'] =  $arr2[$key][0]; 
            $arr5['interface_name'] = $arr2[$key][1];   
            $arr5['ave_link_time'] = round($arr2[$key][2],2);   
            $arr5['ave_process_time'] = round($arr2[$key][3],2);   
            $arr5['error_rate'] = round($arr2[$key][4],2);   
            $arr5['ave_page_size'] = round($arr2[$key][5],2);    
            $arr5['response_times'] = round($arr2[$key][6],0);   
            $arr5['score'] = round($arr2[$key][7],2);   
            $count = $count + 1;
            array_push($arr6,$arr5);
        }
        $count1 = $count;
        $count = $count - $length * $index;
        $x = 0;
        $y = 1;
        foreach($arr6 as $value)
        {
            if($x >= $index && $y <= $length){
               array_push($arr7,$value);
                   $y += 1;
            } else {
                $x += 1;
            }
            if($y > $length)
            {
                break;
            }
        }
        $arr4['data'] = $arr7;
        $arr4['recordsTotal'] = $count1;
        $arr4['recordsFiltered'] = $count1;
        return $arr4; 
    }
    public function getServerAffairsInfoConvertToJson($result,$timespan)
    {
        date_default_timezone_set('PRC');
        $interval = 30;                 //这个粒度是固定的
        $now = time();
        $span = $timespan * 60 / $interval ;
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        for($x = 1;$x <= $interval;$x++)
        {
            $count = 0;
            $link = 0.0;
            $process = 0.0;
            $response = 0;
            $length = 0.0;
            $end = $now - ($x - 1) * $span;
            $start = $now - $x * $span;
            foreach($result as $key => $value)
            {
                //echo "fased";
                //echo var_dump($value->t);
               if( intval($value->t) >= $start && intval($value->t) <= $end)
                {
                    $link += $value->ave_link_time;
                    $process = $value->ave_process_time;
                    $response = $value->response_time;
                    $length = $value->ave_page_size;
                    $count += 1;
                }
            }
            if($count) {
                $link = $link / $count;
                $process = $process / $count;
                $length = $length / $count;
            }
            array_unshift($arr1,$link);
            array_unshift($arr2,$process);
            array_unshift($arr3,$length);
            array_unshift($arr4,$response);
            array_unshift($arr5,date('Y-m-d H:i:s',$end));
        }
        
        $arr6['link'] = $arr1;
        $arr6['process'] = $arr2;
        $arr6['length'] = $arr3;
        $arr6['response'] = $arr4;
        $arr6['category'] = $arr5;
        return $arr6;
    } 
    public function getServerMapConvertToJson($result)
    {
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        foreach($result as $value) 
        {
           $province_id = $value->province_id;
           if (array_key_exists($province_id, $arr2) ) {
                $arr2[$province_id][2] += $value->ave_link_time;
                $arr2[$province_id][3] += $value->ave_process_time;
                $arr2[$province_id][4] += $value->response_time;
                $arr2[$province_id][5] += 1;
           } else {
                $arr2[$value->province_id] = array();
                array_push($arr2[$value->province_id],$value->province_id);                //0    
                array_push($arr2[$value->province_id],$value->province_name);            //1 
                array_push($arr2[$value->province_id],$value->ave_link_time);            //2
                array_push($arr2[$value->province_id],$value->ave_process_time);         //3
                array_push($arr2[$value->province_id],$value->response_time); 
                array_push($arr2[$value->province_id],1);          
           }
        }
        foreach($arr2 as $key => $value)
        {
           $arr2[$key][2] = $arr2[$key][2] / $value[5];   
           $arr2[$key][3] = $arr2[$key][3] / $value[5];   
        }
        foreach($arr2 as $key => $value)
        {
            $arr1['name'] = trim($value[1]);             
            $arr1['value'] = $value[2];             
            array_push($arr3,$arr1);
            $arr1['value'] = $value[3];             
            array_push($arr4,$arr1);
            $arr1['value'] = $value[4];             
            array_push($arr5,$arr1);
        }
        
        $arr6['link'] = $arr3;
        $arr6['process'] = $arr4;
        $arr6['times'] = $arr5;
        return $arr6;
    }
}

?>
