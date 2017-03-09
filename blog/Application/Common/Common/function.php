<?php

  /**
 * 格式化的打印
 * @param array $arr
 * @return array
 */
function print_g($arr=array(),$is_exit=true)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    if($is_exit){
        exit;
    }
}
//定义tree函数
	function tree1($list, $pid=0, $level=0) {
		static $data = array();
		foreach($list as $row) {
			if($row['pid'] == $pid) {
				$row['level'] = $level;
				$data[] = $row;
				tree($list, $row['id'], $level+1);
			}
		}
		return $data;
	}

  function _redirect($url)
	{
        header("Location:" . $url);
    }
  
    function _ajaxFailure($data)
	{
        // $ret = array('status' => self::ERROR, 'info' => $msg, 'data' => $data);
        // $this->_ajaxExit($ret);
          echo json_encode($data, JSON_UNESCAPED_UNICODE);
          exit();
    }
  
?>