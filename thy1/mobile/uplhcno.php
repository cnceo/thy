<?php





function no6Hd()
{
    //$str = iconv("GB2312", "UTF-8", file_get_contents("http://c.apiplus.cn/a24661330ad74434/hk6.xml"));
    
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://c.apiplus.cn/a24661330ad74434/hk6.xml");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $str1 = curl_exec($ch);
    curl_close($ch);
    
    
    
    
    return $actionNo = intval(preg_substr("/<row expect=\"/", "/\" opencode=\"/", $str1)) + 1;
}

function preg_substr($start, $end, $str) // 正则截取函数      
{
    $temp    = preg_split($start, $str);
    $content = preg_split($end, $temp[1]);
    return $content[0];
}


@$fp = fopen("lhcno.php", 'w');
fwrite($fp, no6Hd()); // 输出：6
fclose($fp);

?>