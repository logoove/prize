<?php
header("Content-Type: text/html; charset=UTF-8");
function dump($arr){
	echo '<pre>'.print_r($arr,TRUE).'</pre>';
}

/*概率算法
proArr array(100,200,300，400)
*/
function get_rand($proArr) { 
    $result = '';  
    $proSum = array_sum($proArr);   
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum); 
        if ($randNum <= $proCur) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur; 
        } 		
    } 
    unset ($proArr);  
    return $result; 
}
/*
获取中奖
*/
function  get_prize(){
$prize_arr = array( 
    array('id'=>1,'prize'=>'平板电脑','v'=>1), 
    array('id'=>2,'prize'=>'数码相机','v'=>1), 
    array('id'=>3,'prize'=>'音箱设备','v'=>1), 
   array('id'=>4,'prize'=>'4G优盘','v'=>1), 
   array('id'=>5,'prize'=>'10Q币','v'=>1), 
   array('id'=>6,'prize'=>'下次没准就能中哦','v'=>95), 
);
foreach ($prize_arr as $key => $val) { 
    $arr[$val['id']] = $val['v']; 
} 
$ridk = get_rand($arr); //根据概率获取奖项id 

$res['yes'] = $prize_arr[$ridk-1]['prize']; //中奖项 
unset($prize_arr[$ridk-1]); //将中奖项从数组中剔除，剩下未中奖项 
shuffle($prize_arr); //打乱数组顺序 
for($i=0;$i<count($prize_arr);$i++){ 
    $pr[] = $prize_arr[$i]['prize']; 
} 
$res['no'] = $pr;
return $res;
}

dump(get_prize());

/*
$total 红包总额
$num 发几个
$min  最小红包
*/
function get_hongbao($total, $num = 10,$min = 0.01)
{
$money_arr = array();
$return_arr = array();
for ($i = 1; $i <$num; ++$i) {
$max =round($total, 2)/($num-$i);
$random =  0.01+ mt_rand() / mt_getrandmax() * (0.99- 0.01); 
$money = $random*$max;
$money = $money<=$min?0.01:$money;
$money =floor($money*100)/100;
$total = $total - $money;
$money_arr[$i] = round($money, 2);
}
$money_arr[$i] = round($total, 2);
shuffle($money_arr);
$return_arr['money'] = $money_arr;
$return_arr['total'] = array_sum($money_arr);
return $return_arr;
}

$data = get_hongbao(0.01, 1);
dump($data);


