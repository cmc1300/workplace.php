<?php

  require ('../include/init.php');

  $result = array (
    "status"  => "fail",
    "message" => ""
  );

  $method = $_REQUEST['method'];
  
  if(empty ($method)) {
    $result["status"]  = "fail";
    $result["message"] = "no method";
  }
  if($method == "sendMessages") {
    $result = sendMessages($result);
  }

  function sendMessages($result) {
    $start_time          = date(TIME_FORMAT);
    $api_class           = new api_class();
    $message             = new Message();
    $api_class->mobile   = $_REQUEST['mobile'];
    $api_class->username = $_REQUEST['username'];
    $api_class->password = $_REQUEST['password'];
    $api_class->api_id   = $_REQUEST['api_id'];
    $api_class->text     = $_REQUEST['text'];
    
    if($api_class->text != "") {
      $api_class->cost = countCharacters($api_class->text);
      if(preg_match('/[\x80-\xff]./', $api_class->text)) {
        // $api_class->text = getUnicode($api_class->text);
        $api_class->text = utf8_encode(trim($api_class->text));
        // $unicode=1;
      } else {
        $api_class->text = str_replace(' ', '%20', $_REQUEST['text']);
      }		
    }
    
    $api = $api_class->checkAPI();

    if(!$api) {
      $result["status"]  = "fail";
      $result["message"] = "params error";
    } else {
      $mobile_arr = explode(",", $api_class->mobile);
      if(count($mobile_arr)==0) {
        $result["status"]  = "fail";
        $result["message"] = "no mobiles";
        return $result;
      }
      
      if($api->balance < count($mobile_arr) * $api_class->cost) {
        $result["status"]  = "fail";
        $result["message"] = "no enough bulance";
      } else {
        $success_list  = "";
        $fail_list     = "";
        $success_count = 0;
        $fail_count    = 0;
        
        for($i = 0; $i < count($mobile_arr); $i++) {
          if($mobile_arr[$i] == "") {
            continue;
          }
          
          $mobile_arr[$i] = formatMobile($mobile_arr[$i]);
          if($mobile_arr[$i] == "") {
            continue;
          }
          
          $url = "http://api.clickatell.com/http/sendmsg?user=" . 
            $api->api_username . 
            "&password=" . 
            $api->api_password . 
            "&api_id=" . 
            $api->api_id . 
            "&to=" . 
            $mobile_arr[$i] . 
            "&text=" . 
            $api_class->text . 
            "&concat=" . 
            $api_class->cost;
          
          if($api->api_type == 1) {
            $url .= "&from=" . $api->sender_name;
          }
          
          if($unicode == 1) {
            $url .= "&unicode=1";
          }
          
          // echo $url;
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          $content = curl_exec($ch);  	  

          curl_close($ch);

          if(strpos($content, "ID:") !== false) {
            
            if($success_count == 0) {
              $success_list = "[" . $mobile_arr[$i] . "]";
            } else {
              $success_list .= ",[" . $mobile_arr[$i] . "]";
            }
            $success_count++;
            
          } else {
            
            $message->sms_record_remark = $content;
            
            if($fail_count == 0) {
              $fail_list = "[" . $mobile_arr[$i] . "]";
            } else {
              $fail_list .= ",[" . $mobile_arr[$i] . "]";
            }
            
            $fail_count++;
          }
        }
        $message                     = new message();
        $message->api_id             = $api->api_id;
        $message->sms_record_time    = date(TIME_FORMAT);
        $message->sms_success_list   = $success_list;
        $message->sms_fail_list      = $fail_list;
        $message->sms_success_count  = $success_count;
        $message->sms_fail_count     = $fail_count;
        $message->sms_content        = $api_class->text;
        $message->user_id            = $api->user_id;
        $message->company_id         = $api->company_id;
        $message->department_id      = $api->department_id;
        $end_time                    = date(TIME_FORMAT);
        $message->sms_record_remark .= "start at " . $start_time . "; end at " . $end_time;

        $company                     = new company();
        $company->company_id         = $api->company_id;
        $company->deductBalance($message->sms_success_count * $api_class->cost);

        $message->sendMessage();

        $result["status"]  = "success";
        $result["message"] = "success:" . $success_count . ",fail:" . $fail_count;
      }
    }
    return $result;
  }
  
  $callBack = $_REQUEST['callbackFunction'];

  if($callBack != "") {
    $return = $callBack . "(" . json_encode($result) . ")";
  } else {
    $return = json_encode($result);
  }
  
  print_r($return);

  function countCharacters($text) {
    $length = mb_strlen($text);
    $credit = 1;
    if(preg_match('/[\x80-\xff]./', $text)) {
      
      if($length <= 70) {
        $credit = 1;
      } else if($length > 70 && $length <= 134) {
        $credit = 2;
      } else if($length > 134 && $length <= 201) {
        $credit = 3;
      } else if($length > 201&& $length <= 268) {
        $credit = 4;
      } else if($length > 268) {
        $credit = 5;
      }
      
    } else {
      if($length <= 160) {
        $credit = 1;
      } else if($length > 160 && $length <= 306) {
          $credit = 2;
      } else if($length > 306 && $length <= 459) {
        $credit = 3;
      } else if($length > 459 && $length <= 612) {
        $credit = 4;
      } else if($length > 612) {
        $credit = 5;
      }
    }

    return $credit;
  }
  
  function formatMobile($mobile) {

    $length = mb_strlen($mobile);
    $aus = substr($mobile, 0, 2);
    $aus1 = substr($mobile, 0, 1);
    $tt = substr($mobile, 1, $length);
    
    if($aus == "04" || $aus1=="4") {
      $mobile = "61" . $mobile;
    }else{
      $mobile = "86" . $mobile;
    }
    return $mobile;
  }
  
  function getUnicode($word) {
    preg_match_all('#(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+)#s', $word, $array, PREG_PATTERN_ORDER);
    
    foreach ($array[0] as $cc) {
      
      if(strpos($cc,"·")===0){
        $return[] = "22c5";
        continue;
      }
      
      if(preg_match('/[\x80-\xff]./', $cc)){
        $arr = str_split($cc); 
        $bin_str = '';
        
        foreach ($arr as $value) {
          $bin_str .= decbin(ord($value));
        }
        
        $bin_str = preg_replace('/^.{4}(.{4}).{2}(.{6}).{2}(.{6})$/','$1$2$3', $bin_str);
        $return[] =  dechex(bindec($bin_str));
        
      } else {
        
        $arr = str_split($cc); 
        $bin_str = '';
        
        foreach ($arr as $value){
          $bin_str .= decbin(ord($value));
        }
        
        $str=dechex(bindec($bin_str));

        if(strlen($str)<4){
          for($i=strlen($str);$i<4;$i++){
            $str="0".$str;
          }
        }
        $return[] = $str;
      }
    }
    return implode('', $return);
  }