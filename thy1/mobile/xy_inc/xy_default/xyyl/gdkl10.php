<?php
$lastNo = $this->getGameLastNo(17);

header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<xml><row expect="' . $lastNo['actionNo'] . '" opencode="' . randKeys() . '" opentime="' . $lastNo['actionTime'] . '"/></xml>';


/* ��������� */
function randKeys($len = 9)
{
    $str  = '6038519724';
    $rand = '';
    for ($x = 0; $x < $len; $x++) {
        $t = mt_rand(1, 20);
        if ($t < 10) {
            $t = '0' . $t;
        }
        $rand .= $t . ',';
    }
    return substr($rand, 0, (strlen($rand) - 1));
}
?>