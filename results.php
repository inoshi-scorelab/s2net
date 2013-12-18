<?php include 'header.php';?>
<?php include 'tab.php';?>
<?php require_once('config.php')?>
<?php require_once ('jpgraph/jpgraph.php');?>
<?php require_once ('jpgraph/jpgraph_pie.php');?>
<?php
$date1= $_GET['date3'];
$date2= $_GET['date4'];


list($year1, $month1, $date1) =    split("-", $date1, 3);

list($year2, $month2, $date2) =    split("-", $date2, 3);

$link = mysql_connect($server, $user, $password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';
$db_selected = mysql_select_db($dbname, $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
$sql1="select * from month where id=".$month1;
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_assoc($result1);
$first_m= $row1['month'];

$sql2="select ID from date where year=".$year1." and month='".$first_m."' and date=".$date1;

$result2 = mysql_query($sql2);

if (!$result2) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

while ($row2 = mysql_fetch_assoc($result2)) {
    $first_record= $row2['ID'];
    break;
}

$sql3="select * from month where id=".$month2;
$result3 = mysql_query($sql3);
$row3 = mysql_fetch_assoc($result3);
$last_m= $row3['month'];

$sql4="select ID from date where year=".$year2." and month='".$last_m."' and date=".$date2;
//echo $sql4;
$result4 = mysql_query($sql4);
//echo $result4;
if (!$result4) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

while ($row4 = mysql_fetch_array($result4, MYSQL_ASSOC)) {
    $last_record= $row4['ID'];
//echo "last".$last_record;
}

if($last_record){

}  else {
    $today_date=  date("Y-m-d");
    list($year2, $month2, $date2) =    split("-", $today_date, 3);
    $sql3="select * from month where id=".$month2;
$result3 = mysql_query($sql3);
$row3 = mysql_fetch_assoc($result3);
$last_m= $row3['month'];

$sql4="select ID from date where year=".$year2." and month='".$last_m."' and date=".$date2;
//echo $sql4;
$result4 = mysql_query($sql4);

if (!$result4) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

while ($row4 = mysql_fetch_assoc($result4)) {
    $last_record= $row4['ID'];
}
}
$sql5="SELECT count(topic) FROM `accident` WHERE topic='accident' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$accident=$row5['count(topic)'];
//echo "Count for Accident:".$accident."<br>";

$sql5="SELECT count(topic) FROM `development` WHERE topic='development-government' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$development=$row5['count(topic)'];
//echo "Count for  development:".$development."<br>";

$sql5="SELECT count(topic) FROM `disaster` WHERE topic='disaster-climate' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$disaster=$row5['count(topic)'];
//echo "Count for  disaster-climate:".$disaster."<br>";

$sql5="SELECT count(topic) FROM `economy` WHERE topic='economy-business' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$economy=$row5['count(topic)'];
//echo "Count for economy-business:".$economy."<br>";

$sql5="SELECT count(topic) FROM `education` WHERE topic='education' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$education=$row5['count(topic)'];
//echo "Count for education:".$education."<br>";

$sql5="SELECT count(topic) FROM `entertain` WHERE topic='entertain' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$entertain=$row5['count(topic)'];
//echo "Count for entertain:".$entertain."<br>";


$sql5="SELECT count(topic) FROM `health` WHERE topic='health' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$health=$row5['count(topic)'];
//echo "Count for health:".$health."<br>";

$sql5="SELECT count(topic) FROM `international` WHERE topic='international' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$international=$row5['count(topic)'];
//echo "Count for international:".$international."<br>";

$sql5="SELECT count(topic) FROM `politics` WHERE topic='politics' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$politics=$row5['count(topic)'];
//echo "Count for politics:".$politics."<br>";

$sql5="SELECT count(topic) FROM `society` WHERE topic='society' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$society=$row5['count(topic)'];
//echo "Count for society:".$society."<br>";

$sql5="SELECT count(topic) FROM `sports` WHERE topic='sports' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$sports=$row5['count(topic)'];
//echo "Count for sports:".$sports."<br>";

$sql5="SELECT count(topic) FROM `war` WHERE topic='war-terrorist-crime' and id<".$last_record." and id>".$first_record;
$result5 = mysql_query($sql5);
$row5 = mysql_fetch_assoc($result5); 
$war=$row5['count(topic)'];
//echo "Count for war:".$war."<br>";
//echo $sql5;

$total=$war+$sports+$society+$politics+$international+$health+$entertain+$education+$economy+$disaster+$development+$accident;

$data = array(  array('count' =>$war/$total*100,'topic' =>"War"),
                array('count' =>$sports/$total*100 ,'topic' =>"Sports"),
                array('count' =>$society /$total*100,'topic' =>"Society"),
                array('count' =>$politics/$total*100,'topic' =>"Politics" ),
                array('count' =>$international/$total*100,'topic' =>"International"),
                array('count' =>$health/$total*100,'topic' =>"Health" ),
                array('count' =>$entertain/$total*100,'topic' =>"Entertain" ),    
                array('count' =>$education/$total*100,'topic' =>"Education" ),
                array('count' =>$economy/$total*100,'topic' =>"Economy"),
                array('count' =>$disaster/$total*100,'topic' =>"Disaster" ),
                array('count' =>$development/$total*100,'topic' =>"Development"),
                array('count' =>$accident/$total*100,'topic' =>"Accident"),

    ); 

$topicCount = array(); 
foreach ($data as $datum) {
    $topicCount[] = $datum['count'];
}
array_multisort($topicCount, SORT_DESC, $data);
foreach ($data as $datum) {
    echo "Percentage for ".$datum['topic']." is ".round($datum['count'])."%<br>";
}
$other=0;
for ($i=5;$i<12;$i++){
    $other=$other+$data[$i]['count'];
}
$data0=round($data[0]['count']);
$data1=round($data[1]['count']);
$data2=round($data[2]['count']);
$data3=round($data[3]['count']);
$data4=round($data[4]['count']);
$other=round($other);
$datatodraw = array($data0,$data1,$data2,$data3,$data4,$other);
$graph = new PieGraph(350,250);
echo '<table >';
echo "<tr><td rowspan=21>";
echo '<img src="mypie.php?dat0='.$data0.'&dat1='.$data1.'&dat2='.$data2.'&dat3='.$data3.'&dat4='.$data4.'&other='.$other.'" width="500" height="400" />';
echo"</td></tr>";


echo '<tr><td class="leger"></td><td rowspan=3>'.$data[0]["topic"].'</td></tr>';
echo '<tr><td bgcolor="#254AB8" class="leger"></td></tr>';
echo '<tr><td class="leger"></td></tr>';
echo '<tr><td class="leger"></td><td rowspan=3>'.$data[1]["topic"].'</td></tr>';
echo '<tr><td bgcolor="#3E63D1" class="leger"></td></tr>';
echo '<tr><td class="leger"></td></tr>';
echo '<tr><td class="leger"></td><td rowspan=3>'.$data[2]["topic"].'</td></tr>';
echo '<tr><td bgcolor="#6986DB" class="leger"></td></tr>';
echo '<tr><td class="leger"></td></tr>';
echo '<tr><td class="leger"></td><td rowspan=3>'.$data[3]["topic"].'</td></tr>';
echo '<tr><td bgcolor="#94A8E6" class="leger"></td></tr>';
echo '<tr><td class="leger"></td></tr>';
echo '<tr><td class="leger"></td><td rowspan=3>'.$data[4]["topic"].'</td></tr>';
echo '<tr><td bgcolor="#BFCBF0" class="leger"></td></tr>';
echo '<tr><td class="leger"></td></tr>';
echo '<tr><td class="leger"></td><td rowspan=3>Other</td></tr>';
echo '<tr><td bgcolor="#ddd5D3" class="leger"></td></tr>';
echo '<tr><td class="leger"></td></tr>';
echo '<tr><td></td></tr>';
echo '<tr><td></td></tr>';
echo '</table >';
mysql_close($link);
?>
<p class='blink'>More analyzing methods will be available soon</p>
<?php include 'footer.php';?>
