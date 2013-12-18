<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
require_once ('jpgraph/jpgraph_pie3d.php');
$date0= $_GET['dat0'];
$date1= $_GET['dat1'];
$date2= $_GET['dat2'];
$date3= $_GET['dat3'];
$date4= $_GET['dat4'];
$other= $_GET['other'];
// Some data
echo $data1;
//$data = array(40,21,17,14,23);
$data = array($date0,$date1,$date2,$date3,$date4,$other);
// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->title->Set("A Simple Pie Plot");
$graph->SetBox(true);

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);



$p1->ExplodeSlice(0);
//$graph->Stroke();

//$p1 = new PiePlot($data);
//$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#254AB8','#3E63D1','#6986DB','#94A8E6','#BFCBF0','#ddd5D3'));

$graph->Stroke();

?>

