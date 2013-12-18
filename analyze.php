<?php include 'header.php';?>
<?php include 'tab.php';?>
<p class='welcome'>Welcome to S2Net Analysing page</p>
<p>Please select the date range of your information.</p>
<?php require_once('calendar/classes/tc_calendar.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

            <form name="form1" method="get" action="analyze.php">
             <div style="float: left; padding-right: 3px; line-height: 18px;"><p>From:</p></div>
                <div style="float: left;"><p>
                  <?php
						$thisweek = date('W');
						$thisyear = date('Y');

						$dayTimes = getDaysInWeek($thisweek, $thisyear);
						//----------------------------------------

						$date1 = date('Y-m-d', $dayTimes[0]);
						$date2 = date('Y-m-d', $dayTimes[(sizeof($dayTimes)-1)]);

						function getDaysInWeek ($weekNumber, $year, $dayStart = 1) {
						  // Count from '0104' because January 4th is always in week 1
						  // (according to ISO 8601).
						  $time = strtotime($year . '0104 +' . ($weekNumber - 1).' weeks');
						  // Get the time of the first day of the week
						  $dayTime = strtotime('-' . (date('w', $time) - $dayStart) . ' days', $time);
						  // Get the times of days 0 -> 6
						  $dayTimes = array ();
						  for ($i = 0; $i < 7; ++$i) {
							$dayTimes[] = strtotime('+' . $i . ' days', $dayTime);
						  }
						  // Return timestamps for mon-sun.
						  return $dayTimes;
						}


					  $myCalendar = new tc_calendar("date3", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date('d', strtotime($date1)), date('m', strtotime($date1)), date('Y', strtotime($date1)));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(1970, 2020);
					  //$myCalendar->dateAllow('2009-02-20', "", false);
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->setDatePair('date3', 'date4', $date2);
                                     
                                         
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
					  $myCalendar->writeScript();
                                           
					  ?></p>
                </div>

              <div style="float: left;">
                  <div style="float: left; padding-left: 3px; padding-right: 3px; line-height: 18px;"><p>To</p></div>
                  <div style="float: left;"><p>
                  <?php
					  $myCalendar = new tc_calendar("date4", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date('d', strtotime($date2)), date('m', strtotime($date2)), date('Y', strtotime($date2)));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(1970, 2020);
					  //$myCalendar->dateAllow("", '2009-11-03', false);
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->setDatePair('date3', 'date4', $date1);
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
					  $myCalendar->writeScript();
                                     
					  ?></p>
                </div>
              </div>
              <p>
               
                <input type="submit" name="submit" value="Submit">
              </p>
              <?php
    if (isset($_GET['submit'])){
        echo "<br>";
        echo "<p>";
        echo "You had select the starting date as ".$_GET['date3'];

        echo " and the end date as ".$_GET['date4'];
        echo ". Please click ";
       // echo '<a href="results.php?date3=+'.$_GET["date3"].'&date4=+'.$_GET["date4"].'"> Next</a>';
	echo '<a href="error.php">Next</a>';
        echo " to continue. </p>";
    }
?>
 <?php include 'footer.php';?>
              
