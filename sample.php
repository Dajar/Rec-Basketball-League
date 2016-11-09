                <?php include("inc/header.php"); ?>
				
                 <div class="primary col">
				 <li> 
				<?php
                   include("db.php"); 		   
				   
                   //Create Search Query to populate current league standings
                   $query6 = "SELECT Team_Name, SUM(Team_Wins) AS Wins, SUM(Team_Losses) AS Losses, SUM(Points_Scored - Points_Allowed) AS Point_Diff
                   FROM Scores, Teams
                   WHERE Teams.Team_ID = Scores.Team_ID 
                   GROUP BY Team_Name
                   ORDER BY Wins DESC, Point_DIff DESC";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result6);

                   
                       echo "<h3 class='standings' title='Standings Image'>STANDINGS</h3>";
                       echo "<table style='width: 100%';>\n";
                       echo "<tr>\n
                             <th style='width: 5%';>#</th>
                             <th style='width: 55%';>TEAM NAME</th>
                             <th style='width: 10%';>W</th>
                             <th style='width: 10%';>L</th>
                             <th class='align' style='width: 2%';>+/-</th>
                             </tr>\n";

                      for($i=0;$i<$nrows;$i++)
                      {
                          $n = $i + 1;
                          $row = mysqli_fetch_assoc($result6);
                          extract($row);

                          $f_stats = number_format($Wins);
                          $f_stats2 = number_format($Losses);
                          $f_stats3 = number_format($Point_Diff);
						  
                          if ($f_stats3 < 0) {
							  $class = 'pointRed';
						  }		
                          else {
							  $class = 'pointGreen';
						  }				  
			                     
                                             
                          echo "<tr class='big'>\n
                          <td>$n.</td>\n
                          <td class='alignL' style='width: 60%';>$Team_Name</td>\n
                          <td>$f_stats</td>\n
                          <td>$f_stats2</td>\n
						  <td class='align $class';>$f_stats3</td>\n						                         
                          </tr>\n";
                      }
                      
                      echo "</table>\n";
                       
                   ?>
                  <p>+/- = Point Differential<br>Top 4 teams qualify for the Playoffs<br>Tie-break determined by greater Point Differential<br>If W/L record and +/- tie, seeding determined by head-to-head winner</p>                     
              </li>

<li>
<div id="checkGame1">
<h3 class='scoreboard' title='Scoreboard Image'><a href='/sampleBoxScores.php'>SCORES</a></h3>  
<hr>    
<table id="back" style="width: 100%">
                    <tr>
                             <th scope="col" style="width: 25%"></th>
                             <th scope="col" class="align" style="width: 15%">FINAL</th>
                    </tr> 
                    					
                    <tr scope="row" class='daily'>
                             <td style="color:#333333;">The Monstars</td>
                             <td align="right" style="color:#333333;">147</td>
                             
                    </tr>          
          <tr scope="row" class='daily'>
                             <td>Mellow Fellows</td>
                             <td align="right">43</td>
                    </tr>
					<tr scope="row" class='daily'>
                             <td class="dates">7pm</td>
                             <td align="right"><button class='change'>Box Score</button></td>
                    </tr>
</table>

</div> 
        
                 <?php
                                   
                  //Create Search Query to populate League Stats by PPG Top 3
                  $query = "SELECT First_Name, Last_Name, Player_GameTotalRebounds AS Rebounds, Player_GameTotalAssists AS Assists, Player_GameTotalSteals AS Steals, Player_GameTotalBlocks AS Blocks, Player_GameTotalPoints AS Points, Player_GameTotal3PTM AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1A' AND Team_Name = 'Mellow Fellows'";
$result = mysqli_query($cxn,$query)
or die ("Couldn't execute query.");
$nrows = mysqli_num_rows($result);

$query1 = "SELECT First_Name, Last_Name, Player_GameTotalRebounds AS Rebounds, Player_GameTotalAssists AS Assists, Player_GameTotalSteals AS Steals, Player_GameTotalBlocks AS Blocks, Player_GameTotalPoints AS Points, Player_GameTotal3PTM AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1A' AND Team_Name = 'The Monstars'";
$result1 = mysqli_query($cxn,$query1)
or die ("Couldn't execute query.");
$nrows1 = mysqli_num_rows($result1);

$query2 = "SELECT SUM(Player_GameTotalRebounds) AS Rebounds, SUM(Player_GameTotalAssists) AS Assists, SUM(Player_GameTotalSteals) AS Steals, SUM(Player_GameTotalBlocks) AS Blocks, SUM(Player_GameTotalPoints) AS Points, SUM(Player_GameTotal3PTM) AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1A' AND Team_Name = 'Mellow Fellows'";
$result2 = mysqli_query($cxn,$query2)
or die ("Couldn't execute query.");

$query3 = "SELECT SUM(Player_GameTotalRebounds) AS Rebounds, SUM(Player_GameTotalAssists) AS Assists, SUM(Player_GameTotalSteals) AS Steals, SUM(Player_GameTotalBlocks) AS Blocks, SUM(Player_GameTotalPoints) AS Points, SUM(Player_GameTotal3PTM) AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1A' AND Team_Name = 'The Monstars'";
$result3 = mysqli_query($cxn,$query3)
or die ("Couldn't execute query.");

$query4 = "SELECT SUM(Player_GameTotalRebounds) AS Rebounds, SUM(Player_GameTotalAssists) AS Assists, SUM(Player_GameTotalSteals) AS Steals, SUM(Player_GameTotalBlocks) AS Blocks, SUM(Player_GameTotalPoints) AS Points, SUM(Player_GameTotal3PTM) AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1B' AND Team_Name = 'LAF Meatheads'";
$result4 = mysqli_query($cxn,$query4)
or die ("Couldn't execute query.");

$query5 = "SELECT SUM(Player_GameTotalRebounds) AS Rebounds, SUM(Player_GameTotalAssists) AS Assists, SUM(Player_GameTotalSteals) AS Steals, SUM(Player_GameTotalBlocks) AS Blocks, SUM(Player_GameTotalPoints) AS Points, SUM(Player_GameTotal3PTM) AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1B' AND Team_Name = 'Elite Effort'";
$result5 = mysqli_query($cxn,$query5)
or die ("Couldn't execute query.");

echo "<div id='viewGame1'>";
echo "<br>";
echo "<table class='box' width='100%'>\n";
echo "<th>Mellow Fellows</th>";
echo "</tr>";
echo "</table>";
echo "<table width='100%'>\n";
echo "<tr>\n
      <th style='width:50%'></th>
      <th class='align'><h5>REB</h5></th>
      <th class='align'><h5>AST</h5></th>
      <th class='align'><h5>STL</h5></th>
      <th class='align'><h5>BLK</h5></th>
      <th class='align'><h5>3PM</h5></th>
      <th class='align'><h5>PTS</h5></th>
      </tr>\n";


for($i=0;$i<$nrows;$i++)
{
$n = $i + 1;
$row = mysqli_fetch_assoc($result);
extract($row);
$f_stats1 = $First_Name;
$f_stats2 = $Last_Name;
$f_stats3 = number_format($Rebounds);
$f_stats4 = number_format($Assists);
$f_stats5 = number_format($Steals);
$f_stats6 = number_format($Blocks);
$f_stats7 = number_format($Threes);
$f_stats8 = number_format($Points);
echo "<tr>\n
      <td>$f_stats1 $f_stats2</td>\n
      <td class='align'>$f_stats3</td>\n
      <td class='align'>$f_stats4</td>\n
      <td class='align'>$f_stats5</td>\n
      <td class='align'>$f_stats6</td>\n
      <td class='align'>$f_stats7</td>\n
      <td class='align'>$f_stats8</td>\n
      </tr>\n";
}

$row2 = mysqli_fetch_array($result2);
extract($row2);
$f_statsR = number_format($Rebounds);
$f_statsA = number_format($Assists);
$f_statsS = number_format($Steals);
$f_statsB = number_format($Blocks);
$f_statsT = number_format($Threes);
$f_statsP = number_format($Points);
echo "<tr>\n
      <th>Totals</th>
      <th class='align'>$f_statsR</th>
      <th class='align'>$f_statsA</th>
      <th class='align'>$f_statsS</th>
      <th class='align'>$f_statsB</th>
      <th class='align'>$f_statsT</th>
      <th class='align'>$f_statsP</th>
      </tr>\n";

echo "</table>\n";

echo "<br>";
echo "<table class='box' width='100%'>\n";
echo "<tr>\n";
echo "<th>The Monstars</th>";
echo "</tr>";
echo "</table>";
echo "<table width='100%'>\n";
echo "<tr>\n
      <th style='width:50%'></th>
      <th class='align'><h5>REB</h5></th>
      <th class='align'><h5>AST</h5></th>
      <th class='align'><h5>STL</h5></th>
      <th class='align'><h5>BLK</h5></th>
      <th class='align'><h5>3PM</h5></th>
      <th class='align'><h5>PTS</h5></th>
      </tr>\n";
      
for($i=0;$i<$nrows1;$i++)
{
$n = $i + 1;
$row = mysqli_fetch_assoc($result1);
extract($row);
$f_stats1 = $First_Name;
$f_stats2 = $Last_Name;
$f_stats3 = number_format($Rebounds);
$f_stats4 = number_format($Assists);
$f_stats5 = number_format($Steals);
$f_stats6 = number_format($Blocks);
$f_stats7 = number_format($Threes);
$f_stats8 = number_format($Points);
echo "<tr>\n
      <td>$f_stats1 $f_stats2</td>\n
      <td class='align'>$f_stats3</td>\n
      <td class='align'>$f_stats4</td>\n
      <td class='align'>$f_stats5</td>\n
      <td class='align'>$f_stats6</td>\n
      <td class='align'>$f_stats7</td>\n
      <td class='align'>$f_stats8</td>\n
      </tr>\n";
}

$row3 = mysqli_fetch_array($result3);
extract($row3);
$f_statsR = number_format($Rebounds);
$f_statsA = number_format($Assists);
$f_statsS = number_format($Steals);
$f_statsB = number_format($Blocks);
$f_statsT = number_format($Threes);
$f_statsP = number_format($Points);
echo "<tr>\n
      <th>Totals</th>
      <th class='align'>$f_statsR</th>
      <th class='align'>$f_statsA</th>
      <th class='align'>$f_statsS</th>
      <th class='align'>$f_statsB</th>
      <th class='align'>$f_statsT</th>
      <th class='align'>$f_statsP</th>
      </tr>\n";

echo "</table>\n";
echo "<br>";
echo "</div>";
?>


<div id="checkGame2">
<hr>     
<table id="back" style="width: 100%">
                    <tr>
                             <th scope="col" style="width: 25%"></th>
                             <th scope="col" class="align" style="width: 15%">FINAL</th>
                    </tr>              
                    <tr scope="row" class='daily'>
                             <td style="color:#333333;">Elite Effort</td>
                             <td align="right" style="color:#333333;">62</td>
                             
                    </tr>             
          <tr scope="row" class='daily'>
                             <td>LAF Meatheads</td>
                             <td align="right">54</td>
                    </tr>
					<tr scope="row" class='daily'>
                             <td class="dates">8pm</td>
                             <td align="right"><button class='change'>Box Score</button></td>
                    </tr>
</table>
</div>      
<?php
$query = "SELECT First_Name, Last_Name, Player_GameTotalRebounds AS Rebounds, Player_GameTotalAssists AS Assists, Player_GameTotalSteals AS Steals, Player_GameTotalBlocks AS Blocks, Player_GameTotalPoints AS Points, Player_GameTotal3PTM AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1B' AND Team_Name = 'LAF Meatheads'";
$result = mysqli_query($cxn,$query)
or die ("Couldn't execute query.");
$nrows = mysqli_num_rows($result);

$query1 = "SELECT First_Name, Last_Name, Player_GameTotalRebounds AS Rebounds, Player_GameTotalAssists AS Assists, Player_GameTotalSteals AS Steals, Player_GameTotalBlocks AS Blocks, Player_GameTotalPoints AS Points, Player_GameTotal3PTM AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1B' AND Team_Name = 'Elite Effort'";
$result1 = mysqli_query($cxn,$query1)
or die ("Couldn't execute query.");
$nrows1 = mysqli_num_rows($result1);

echo "<div id='viewGame2'>";
echo "<br>";
echo "<table class='box' width='100%'>\n";
echo "<tr>\n";
echo "<th>LAF Meatheads</th>";
echo "</tr>";
echo "</table>";
echo "<table width='100%'>\n";
echo "<tr>\n
      <th style='width:50%'></th>
      <th class='align'><h5>REB</h5></th>
      <th class='align'><h5>AST</h5></th>
      <th class='align'><h5>STL</h5></th>
      <th class='align'><h5>BLK</h5></th>
      <th class='align'><h5>3PM</h5></th>
      <th class='align'><h5>PTS</h5></th>
      </tr>\n";

for($i=0;$i<$nrows;$i++)
{
$n = $i + 1;
$row = mysqli_fetch_assoc($result);
extract($row);
$f_stats1 = $First_Name;
$f_stats2 = $Last_Name;
$f_stats3 = number_format($Rebounds);
$f_stats4 = number_format($Assists);
$f_stats5 = number_format($Steals);
$f_stats6 = number_format($Blocks);
$f_stats7 = number_format($Threes);
$f_stats8 = number_format($Points);
echo "<tr>\n
      <td>$f_stats1 $f_stats2</td>\n
      <td class='align'>$f_stats3</td>\n
      <td class='align'>$f_stats4</td>\n
      <td class='align'>$f_stats5</td>\n
      <td class='align'>$f_stats6</td>\n
      <td class='align'>$f_stats7</td>\n
      <td class='align'>$f_stats8</td>\n
      </tr>\n";
}

$row4 = mysqli_fetch_array($result4);
extract($row4);
$f_statsR = number_format($Rebounds);
$f_statsA = number_format($Assists);
$f_statsS = number_format($Steals);
$f_statsB = number_format($Blocks);
$f_statsT = number_format($Threes);
$f_statsP = number_format($Points);
echo "<tr>\n
      <th>Totals</th>
      <th class='align'>$f_statsR</th>
      <th class='align'>$f_statsA</th>
      <th class='align'>$f_statsS</th>
      <th class='align'>$f_statsB</th>
      <th class='align'>$f_statsT</th>
      <th class='align'>$f_statsP</th>
      </tr>\n";

echo "</table>\n";

echo "<br>";
echo "<table class='box' width='100%'>\n";
echo "<tr>\n";
echo "<th>Elite Effort</th>";
echo "</tr>";
echo "</table>";
echo "<table width='100%'>\n";
echo "<tr>\n
      <th style='width:50%'></th>
      <th class='align'><h5>REB</h5></th>
      <th class='align'><h5>AST</h5></th>
      <th class='align'><h5>STL</h5></th>
      <th class='align'><h5>BLK</h5></th>
      <th class='align'><h5>3PM</h5></th>
      <th class='align'><h5>PTS</h5></th>
      </tr>\n";

for($i=0;$i<$nrows1;$i++)
{
$n = $i + 1;
$row = mysqli_fetch_assoc($result1);
extract($row);
$f_stats1 = $First_Name;
$f_stats2 = $Last_Name;
$f_stats3 = number_format($Rebounds);
$f_stats4 = number_format($Assists);
$f_stats5 = number_format($Steals);
$f_stats6 = number_format($Blocks);
$f_stats7 = number_format($Threes);
$f_stats8 = number_format($Points);
echo "<tr>\n
      <td>$f_stats1 $f_stats2</td>\n
      <td class='align'>$f_stats3</td>\n
      <td class='align'>$f_stats4</td>\n
      <td class='align'>$f_stats5</td>\n
      <td class='align'>$f_stats6</td>\n
      <td class='align'>$f_stats7</td>\n
      <td class='align'>$f_stats8</td>\n
      </tr>\n";
}

$row5 = mysqli_fetch_array($result5);
extract($row5);
$f_statsR = number_format($Rebounds);
$f_statsA = number_format($Assists);
$f_statsS = number_format($Steals);
$f_statsB = number_format($Blocks);
$f_statsT = number_format($Threes);
$f_statsP = number_format($Points);
echo "<tr>\n
      <th>Totals</th>
      <th class='align'>$f_statsR</th>
      <th class='align'>$f_statsA</th>
      <th class='align'>$f_statsS</th>
      <th class='align'>$f_statsB</th>
      <th class='align'>$f_statsT</th>
      <th class='align'>$f_statsP</th>
      </tr>\n";

echo "</table>\n";
echo "<br>";
echo "</div>";
?>


<div id="checkGame3"> 
<hr>     
<table id="back" style="width: 100%">
                   <tr>
                             <th scope="col" style="width: 25%"></th>
                             <th scope="col" class="align" style="width: 15%">FINAL</th>
                    </tr>             
                    <tr scope="row" class='daily'>
                             <td style="color:#333333;">Nothing But Nets</td>
                             <td align="right" style="color:#333333;">66</td>
                             
                    </tr>             
          <tr scope="row" class='daily'>
                             <td>Trey Bueno</td>
                             <td align="right">61</td>
                    </tr>
					</tr>             
          <tr scope="row" class='daily'>
                             <td class="dates">9pm</td>
                             <td align="right"><button class='change'>Box Score</button></td>
                    </tr>
</table>
</div>
    
<?php
$query6 = "SELECT First_Name, Last_Name, Player_GameTotalRebounds AS Rebounds, Player_GameTotalAssists AS Assists, Player_GameTotalSteals AS Steals, Player_GameTotalBlocks AS Blocks, Player_GameTotalPoints AS Points, Player_GameTotal3PTM AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1C' AND Team_Name = 'Nothing but Nets'";
$result6 = mysqli_query($cxn,$query6)
or die ("Couldn't execute query.");
$nrows = mysqli_num_rows($result6);

$query7 = "SELECT First_Name, Last_Name, Player_GameTotalRebounds AS Rebounds, Player_GameTotalAssists AS Assists, Player_GameTotalSteals AS Steals, Player_GameTotalBlocks AS Blocks, Player_GameTotalPoints AS Points, Player_GameTotal3PTM AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1C' AND Team_Name = 'Trey Bueno'";
$result7 = mysqli_query($cxn,$query7)
or die ("Couldn't execute query.");
$nrows1 = mysqli_num_rows($result7);

$query8 = "SELECT SUM(Player_GameTotalRebounds) AS Rebounds, SUM(Player_GameTotalAssists) AS Assists, SUM(Player_GameTotalSteals) AS Steals, SUM(Player_GameTotalBlocks) AS Blocks, SUM(Player_GameTotalPoints) AS Points, SUM(Player_GameTotal3PTM) AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1C' AND Team_Name = 'Nothing but Nets'";
$result8 = mysqli_query($cxn,$query8)
or die ("Couldn't execute query.");

$query9 = "SELECT SUM(Player_GameTotalRebounds) AS Rebounds, SUM(Player_GameTotalAssists) AS Assists, SUM(Player_GameTotalSteals) AS Steals, SUM(Player_GameTotalBlocks) AS Blocks, SUM(Player_GameTotalPoints) AS Points, SUM(Player_GameTotal3PTM) AS Threes
FROM Players_Games_Stats, Players, Teams
WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID AND Game_Number = '1C' AND Team_Name = 'Trey Bueno'";
$result9 = mysqli_query($cxn,$query9)
or die ("Couldn't execute query.");

echo "<div id='viewGame3'>";
echo "<br>";
echo "<table class='box' width='100%'>\n";
echo "<tr>\n";
echo "<th>Nothing but Nets</th>";
echo "</tr>";
echo "</table>";
echo "<table width='100%'>\n";
echo "<tr>\n
      <th style='width:50%'></th>
      <th class='align'><h5>REB</h5></th>
      <th class='align'><h5>AST</h5></th>
      <th class='align'><h5>STL</h5></th>
      <th class='align'><h5>BLK</h5></th>
      <th class='align'><h5>3PM</h5></th>
      <th class='align'><h5>PTS</h5></th>
      </tr>\n";

for($i=0;$i<$nrows;$i++)
{
$n = $i + 1;
$row = mysqli_fetch_assoc($result6);
extract($row);
$f_stats1 = $First_Name;
$f_stats2 = $Last_Name;
$f_stats3 = number_format($Rebounds);
$f_stats4 = number_format($Assists);
$f_stats5 = number_format($Steals);
$f_stats6 = number_format($Blocks);
$f_stats7 = number_format($Threes);
$f_stats8 = number_format($Points);
echo "<tr>\n
      <td>$f_stats1 $f_stats2</td>\n
      <td class='align'>$f_stats3</td>\n
      <td class='align'>$f_stats4</td>\n
      <td class='align'>$f_stats5</td>\n
      <td class='align'>$f_stats6</td>\n
      <td class='align'>$f_stats7</td>\n
      <td class='align'>$f_stats8</td>\n
      </tr>\n";
}

$row4 = mysqli_fetch_array($result8);
extract($row4);
$f_statsR = number_format($Rebounds);
$f_statsA = number_format($Assists);
$f_statsS = number_format($Steals);
$f_statsB = number_format($Blocks);
$f_statsT = number_format($Threes);
$f_statsP = number_format($Points);
echo "<tr>\n
      <th>Totals</th>
      <th class='align'>$f_statsR</th>
      <th class='align'>$f_statsA</th>
      <th class='align'>$f_statsS</th>
      <th class='align'>$f_statsB</th>
      <th class='align'>$f_statsT</th>
      <th class='align'>$f_statsP</th>
      </tr>\n";

echo "</table>\n";

echo "<br>";
echo "<table class='box' width='100%'>\n";
echo "<tr>\n";
echo "<th>Trey Bueno</th>";
echo "</tr>";
echo "</table>";
echo "<table width='100%'>\n";
echo "<tr>\n
      <th style='width:50%'></th>
      <th class='align'><h5>REB</h5></th>
      <th class='align'><h5>AST</h5></th>
      <th class='align'><h5>STL</h5></th>
      <th class='align'><h5>BLK</h5></th>
      <th class='align'><h5>3PM</h5></th>
      <th class='align'><h5>PTS</h5></th>
      </tr>\n";

for($i=0;$i<$nrows1;$i++)
{
$n = $i + 1;
$row = mysqli_fetch_assoc($result7);
extract($row);
$f_stats1 = $First_Name;
$f_stats2 = $Last_Name;
$f_stats3 = number_format($Rebounds);
$f_stats4 = number_format($Assists);
$f_stats5 = number_format($Steals);
$f_stats6 = number_format($Blocks);
$f_stats7 = number_format($Threes);
$f_stats8 = number_format($Points);
echo "<tr>\n
      <td>$f_stats1 $f_stats2</td>\n
      <td class='align'>$f_stats3</td>\n
      <td class='align'>$f_stats4</td>\n
      <td class='align'>$f_stats5</td>\n
      <td class='align'>$f_stats6</td>\n
      <td class='align'>$f_stats7</td>\n
      <td class='align'>$f_stats8</td>\n
      </tr>\n";
}

$row5 = mysqli_fetch_array($result9);
extract($row5);
$f_statsR = number_format($Rebounds);
$f_statsA = number_format($Assists);
$f_statsS = number_format($Steals);
$f_statsB = number_format($Blocks);
$f_statsT = number_format($Threes);
$f_statsP = number_format($Points);
echo "<tr>\n
      <th>Totals</th>
      <th class='align'>$f_statsR</th>
      <th class='align'>$f_statsA</th>
      <th class='align'>$f_statsS</th>
      <th class='align'>$f_statsB</th>
      <th class='align'>$f_statsT</th>
      <th class='align'>$f_statsP</th>
      </tr>\n";

echo "</table>\n";
echo "<br>";
echo "</div>";
?>

<p><a href="/sampleBoxScores.php">Season Scoreboard</a><br>All Times Central</p>
</li>

	

                <div> 
                 			 <li>
			   
			   <?php
                                    
                   //Create Search Query to populate Player of the week based on Power Index 
                   $query7 = "SELECT Players.First_Name, Players.Last_Name, Teams.Team_INTL, Players_Games_Stats.Player_GameTotalPoints AS PTS, Players_Games_Stats.Player_GameTotalRebounds AS RBS, Players_Games_Stats.Player_GameTotalAssists AS AST, Players_Games_Stats.Player_GameTotalBlocks AS BLK, (Player_GameTotalPoints + Player_GameTotalRebounds + Player_GameTotalAssists + Player_GameTotalBlocks + Player_GameTotalSteals + Player_GameTotal3PTM) AS PI,
                              Players_Games_Stats.Player_GameTotalSteals AS STL, Players_Games_Stats.Player_GameTotal3PTM AS TPM
                              FROM Players, Teams, Players_Games_Stats, Scores
                              WHERE Players.Player_ID=Players_Games_Stats.Player_ID AND Teams.Team_ID=Players.Team_ID AND Players_Games_Stats.Game_Number=Scores.Game_Number AND Scores.Game_Date='2015-10-26'
							  GROUP BY Last_Name
							  ORDER BY PI DESC
							  LIMIT 1;";
                   $result7 = mysqli_query($cxn,$query7)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result7);
                     
					 echo "<h3 class='player' title='Player of the Week Trophy Award Image'>PLAYER OF THE WEEK</h3>\n";
                     echo "<table style='width: 100%;'>\n";
					 echo "<tr class='checkPow7'>\n					 
                           <th class='scores'>WEEK 7</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                           </tr>\n";
                     echo "<tr class='viewPow7'>\n					 
                           <th class='alignL' width='70%'><h6>10/26</h6></th>
                           <th width='3%' class='align'><h5>PTS</h5></th>
                           <th width='3%' class='align'><h5>RBS</h5></th>
                           <th width='3%' class='align'><h5>AT</h5></th>
                           <th width='3%' class='align'><h5>BK</h5></th>
                           <th width='3%' class='align'><h5>ST</h5></th>
                           <th width='3%' class='align'><h5>3S</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result7);
                        extract($row);
						$f_statsP = number_format($PTS);
						$f_statsR = number_format($RBS);
						$f_statsA = number_format($AST);
						$f_statsB = number_format($BLK);
						$f_statsS = number_format($STL);
						$f_statsT = number_format($TPM);
						$f_statsPI = number_format($PI);
                  
                        echo "<tr class='viewPow7 leagueLeaders'>\n
						<td>$First_Name $Last_Name, $Team_INTL</td>\n                        
						<td class='align'>$f_statsP</td>\n
						<td class='align'>$f_statsR</td>\n
						<td class='align'>$f_statsA</td>\n
						<td class='align'>$f_statsB</td>\n
						<td class='align'>$f_statsS</td>\n
						<td class='align'>$f_statsT</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n"; 

                    
                    $query6 = "SELECT Players.First_Name, Players.Last_Name, Teams.Team_INTL, Players_Games_Stats.Player_GameTotalPoints AS PTS, Players_Games_Stats.Player_GameTotalRebounds AS RBS, Players_Games_Stats.Player_GameTotalAssists AS AST, Players_Games_Stats.Player_GameTotalBlocks AS BLK, (Player_GameTotalPoints + Player_GameTotalRebounds + Player_GameTotalAssists + Player_GameTotalBlocks + Player_GameTotalSteals + Player_GameTotal3PTM) AS PI,
                              Players_Games_Stats.Player_GameTotalSteals AS STL, Players_Games_Stats.Player_GameTotal3PTM AS TPM
                              FROM Players, Teams, Players_Games_Stats, Scores
                              WHERE Players.Player_ID=Players_Games_Stats.Player_ID AND Teams.Team_ID=Players.Team_ID AND Players_Games_Stats.Game_Number=Scores.Game_Number AND Scores.Game_Date='2015-10-19'
							  ORDER BY PI DESC
							  LIMIT 1;";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result6);

                   echo "<table style='width: 100%;'>\n";
				   echo "<tr class='checkPow6'>\n					 
                           <th class='scores'>WEEK 6</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewPow6'>\n					 
                           <th class='alignL' width='70%'><h6>10/19</h6></th>
                           <th width='3%' class='align'><h5>PTS</h5></th>
                           <th width='3%' class='align'><h5>RBS</h5></th>
                           <th width='3%' class='align'><h5>AT</h5></th>
                           <th width='3%' class='align'><h5>BK</h5></th>
                           <th width='3%' class='align'><h5>ST</h5></th>
                           <th width='3%' class='align'><h5>3S</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result6);
                        extract($row);
						$f_statsP = number_format($PTS);
						$f_statsR = number_format($RBS);
						$f_statsA = number_format($AST);
						$f_statsB = number_format($BLK);
						$f_statsS = number_format($STL);
						$f_statsT = number_format($TPM);
                  
                        echo "<tr class='viewPow6 leagueLeaders'>\n
						<td>$First_Name $Last_Name, $Team_INTL</td>\n                        
						<td class='align'>$f_statsP</td>\n
						<td class='align'>$f_statsR</td>\n
						<td class='align'>$f_statsA</td>\n
						<td class='align'>$f_statsB</td>\n
						<td class='align'>$f_statsS</td>\n
						<td class='align'>$f_statsT</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n"; 

                   $query5 = "SELECT Players.First_Name, Players.Last_Name, Teams.Team_INTL, Players_Games_Stats.Player_GameTotalPoints AS PTS, Players_Games_Stats.Player_GameTotalRebounds AS RBS, Players_Games_Stats.Player_GameTotalAssists AS AST, Players_Games_Stats.Player_GameTotalBlocks AS BLK, (Player_GameTotalPoints + Player_GameTotalRebounds + Player_GameTotalAssists + Player_GameTotalBlocks + Player_GameTotalSteals + Player_GameTotal3PTM) AS PI,
                              Players_Games_Stats.Player_GameTotalSteals AS STL, Players_Games_Stats.Player_GameTotal3PTM AS TPM
                              FROM Players, Teams, Players_Games_Stats, Scores
                              WHERE Players.Player_ID=Players_Games_Stats.Player_ID AND Teams.Team_ID=Players.Team_ID AND Players_Games_Stats.Game_Number=Scores.Game_Number AND Scores.Game_Date='2015-10-12'
							  ORDER BY PI DESC
							  LIMIT 1;";
                   $result5 = mysqli_query($cxn,$query5)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result5);

                   echo "<table style='width: 100%;'>\n";
				   echo "<tr class='checkPow5'>\n					 
                           <th class='scores'>WEEK 5</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewPow5'>\n					 
                           <th class='alignL' width='70%'><h6>10/12</h6></th>
                           <th width='3%' class='align'><h5>PTS</h5></th>
                           <th width='3%' class='align'><h5>RBS</h5></th>
                           <th width='3%' class='align'><h5>AT</h5></th>
                           <th width='3%' class='align'><h5>BK</h5></th>
                           <th width='3%' class='align'><h5>ST</h5></th>
                           <th width='3%' class='align'><h5>3S</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result5);
                        extract($row);
						$f_statsP = number_format($PTS);
						$f_statsR = number_format($RBS);
						$f_statsA = number_format($AST);
						$f_statsB = number_format($BLK);
						$f_statsS = number_format($STL);
						$f_statsT = number_format($TPM);
                  
                        echo "<tr class='viewPow5 leagueLeaders'>\n
						<td>$First_Name $Last_Name, $Team_INTL</td>\n                        
						<td class='align'>$f_statsP</td>\n
						<td class='align'>$f_statsR</td>\n
						<td class='align'>$f_statsA</td>\n
						<td class='align'>$f_statsB</td>\n
						<td class='align'>$f_statsS</td>\n
						<td class='align'>$f_statsT</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n";


                    $query4 = "SELECT Players.First_Name, Players.Last_Name, Teams.Team_INTL, Players_Games_Stats.Player_GameTotalPoints AS PTS, Players_Games_Stats.Player_GameTotalRebounds AS RBS, Players_Games_Stats.Player_GameTotalAssists AS AST, Players_Games_Stats.Player_GameTotalBlocks AS BLK, (Player_GameTotalPoints + Player_GameTotalRebounds + Player_GameTotalAssists + Player_GameTotalBlocks + Player_GameTotalSteals + Player_GameTotal3PTM) AS PI,
                              Players_Games_Stats.Player_GameTotalSteals AS STL, Players_Games_Stats.Player_GameTotal3PTM AS TPM
                              FROM Players, Teams, Players_Games_Stats, Scores
                              WHERE Players.Player_ID=Players_Games_Stats.Player_ID AND Teams.Team_ID=Players.Team_ID AND Players_Games_Stats.Game_Number=Scores.Game_Number AND Scores.Game_Date='2015-10-5'
							  ORDER BY PI DESC
							  LIMIT 1;";
                   $result4 = mysqli_query($cxn,$query4)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result4);

                   echo "<table style='width: 100%;'>\n";
				   echo "<tr class='checkPow4'>\n					 
                           <th class='scores'>WEEK 4</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewPow4'>\n					 
                           <th class='alignL' width='70%'><h6>10/5</h6></th>
                           <th width='3%' class='align'><h5>PTS</h5></th>
                           <th width='3%' class='align'><h5>RBS</h5></th>
                           <th width='3%' class='align'><h5>AT</h5></th>
                           <th width='3%' class='align'><h5>BK</h5></th>
                           <th width='3%' class='align'><h5>ST</h5></th>
                           <th width='3%' class='align'><h5>3S</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result4);
                        extract($row);
						$f_statsP = number_format($PTS);
						$f_statsR = number_format($RBS);
						$f_statsA = number_format($AST);
						$f_statsB = number_format($BLK);
						$f_statsS = number_format($STL);
						$f_statsT = number_format($TPM);
                  
                        echo "<tr class='viewPow4 leagueLeaders'>\n
						<td>$First_Name $Last_Name, $Team_INTL</td>\n                        
						<td class='align'>$f_statsP</td>\n
						<td class='align'>$f_statsR</td>\n
						<td class='align'>$f_statsA</td>\n
						<td class='align'>$f_statsB</td>\n
						<td class='align'>$f_statsS</td>\n
						<td class='align'>$f_statsT</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n";	


                    $query3 = "SELECT Players.First_Name, Players.Last_Name, Teams.Team_INTL, Players_Games_Stats.Player_GameTotalPoints AS PTS, Players_Games_Stats.Player_GameTotalRebounds AS RBS, Players_Games_Stats.Player_GameTotalAssists AS AST, Players_Games_Stats.Player_GameTotalBlocks AS BLK, (Player_GameTotalPoints + Player_GameTotalRebounds + Player_GameTotalAssists + Player_GameTotalBlocks + Player_GameTotalSteals + Player_GameTotal3PTM) AS PI,
                              Players_Games_Stats.Player_GameTotalSteals AS STL, Players_Games_Stats.Player_GameTotal3PTM AS TPM
                              FROM Players, Teams, Players_Games_Stats, Scores
                              WHERE Players.Player_ID=Players_Games_Stats.Player_ID AND Teams.Team_ID=Players.Team_ID AND Players_Games_Stats.Game_Number=Scores.Game_Number AND Scores.Game_Date='2015-9-28'
							  ORDER BY PI DESC
							  LIMIT 1;";
                   $result3 = mysqli_query($cxn,$query3)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result3);

                   echo "<table style='width: 100%;'>\n";
				   echo "<tr class='checkPow3'>\n					 
                           <th class='scores'>WEEK 3</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewPow3'>\n					 
                           <th class='alignL' width='70%'><h6>9/28</h6></th>
                           <th width='3%' class='align'><h5>PTS</h5></th>
                           <th width='3%' class='align'><h5>RBS</h5></th>
                           <th width='3%' class='align'><h5>AT</h5></th>
                           <th width='3%' class='align'><h5>BK</h5></th>
                           <th width='3%' class='align'><h5>ST</h5></th>
                           <th width='3%' class='align'><h5>3S</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result3);
                        extract($row);
						$f_statsP = number_format($PTS);
						$f_statsR = number_format($RBS);
						$f_statsA = number_format($AST);
						$f_statsB = number_format($BLK);
						$f_statsS = number_format($STL);
						$f_statsT = number_format($TPM);
                  
                        echo "<tr class='viewPow3 leagueLeaders'>\n
						<td>$First_Name $Last_Name, $Team_INTL</td>\n                        
						<td class='align'>$f_statsP</td>\n
						<td class='align'>$f_statsR</td>\n
						<td class='align'>$f_statsA</td>\n
						<td class='align'>$f_statsB</td>\n
						<td class='align'>$f_statsS</td>\n
						<td class='align'>$f_statsT</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n";

                    $query2 = "SELECT Players.First_Name, Players.Last_Name, Teams.Team_INTL, Players_Games_Stats.Player_GameTotalPoints AS PTS, Players_Games_Stats.Player_GameTotalRebounds AS RBS, Players_Games_Stats.Player_GameTotalAssists AS AST, Players_Games_Stats.Player_GameTotalBlocks AS BLK, (Player_GameTotalPoints + Player_GameTotalRebounds + Player_GameTotalAssists + Player_GameTotalBlocks + Player_GameTotalSteals + Player_GameTotal3PTM) AS PI,
                              Players_Games_Stats.Player_GameTotalSteals AS STL, Players_Games_Stats.Player_GameTotal3PTM AS TPM
                              FROM Players, Teams, Players_Games_Stats, Scores
                              WHERE Players.Player_ID=Players_Games_Stats.Player_ID AND Teams.Team_ID=Players.Team_ID AND Players_Games_Stats.Game_Number=Scores.Game_Number AND Scores.Game_Date='2015-9-21'
							  ORDER BY PI DESC
							  LIMIT 1;";
                   $result2 = mysqli_query($cxn,$query2)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result2);

                   echo "<table style='width: 100%;'>\n";
				   echo "<tr class='checkPow2'>\n					 
                           <th class='scores'>WEEK 2</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewPow2'>\n					 
                           <th class='alignL' width='70%'><h6>9/21</h6></th>
                           <th width='3%' class='align'><h5>PTS</h5></th>
                           <th width='3%' class='align'><h5>RBS</h5></th>
                           <th width='3%' class='align'><h5>AT</h5></th>
                           <th width='3%' class='align'><h5>BK</h5></th>
                           <th width='3%' class='align'><h5>ST</h5></th>
                           <th width='3%' class='align'><h5>3S</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result2);
                        extract($row);
						$f_statsP = number_format($PTS);
						$f_statsR = number_format($RBS);
						$f_statsA = number_format($AST);
						$f_statsB = number_format($BLK);
						$f_statsS = number_format($STL);
						$f_statsT = number_format($TPM);
                  
                        echo "<tr class='viewPow2 leagueLeaders'>\n
						<td>$First_Name $Last_Name, $Team_INTL</td>\n                        
						<td class='align'>$f_statsP</td>\n
						<td class='align'>$f_statsR</td>\n
						<td class='align'>$f_statsA</td>\n
						<td class='align'>$f_statsB</td>\n
						<td class='align'>$f_statsS</td>\n
						<td class='align'>$f_statsT</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n";

                    
                    $query1 = "SELECT Players.First_Name, Players.Last_Name, Teams.Team_INTL, Players_Games_Stats.Player_GameTotalPoints AS PTS, Players_Games_Stats.Player_GameTotalRebounds AS RBS, Players_Games_Stats.Player_GameTotalAssists AS AST, Players_Games_Stats.Player_GameTotalBlocks AS BLK, (Player_GameTotalPoints + Player_GameTotalRebounds + Player_GameTotalAssists + Player_GameTotalBlocks + Player_GameTotalSteals + Player_GameTotal3PTM) AS PI,
                              Players_Games_Stats.Player_GameTotalSteals AS STL, Players_Games_Stats.Player_GameTotal3PTM AS TPM
                              FROM Players, Teams, Players_Games_Stats, Scores
                              WHERE Players.Player_ID=Players_Games_Stats.Player_ID AND Teams.Team_ID=Players.Team_ID AND Players_Games_Stats.Game_Number=Scores.Game_Number AND Scores.Game_Date='2015-9-14'
							  ORDER BY PI DESC
							  LIMIT 1;";
                   $result1 = mysqli_query($cxn,$query1)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result1);

                   echo "<table style='width: 100%;'>\n";
				   echo "<tr class='checkPow1'>\n					 
                           <th class='scores'>WEEK 1</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewPow1'>\n					 
                           <th class='alignL' width='70%'><h6>9/14</h6></th>
                           <th width='3%' class='align'><h5>PTS</h5></th>
                           <th width='3%' class='align'><h5>RBS</h5></th>
                           <th width='3%' class='align'><h5>AT</h5></th>
                           <th width='3%' class='align'><h5>BK</h5></th>
                           <th width='3%' class='align'><h5>ST</h5></th>
                           <th width='3%' class='align'><h5>3S</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result1);
                        extract($row);
						$f_statsP = number_format($PTS);
						$f_statsR = number_format($RBS);
						$f_statsA = number_format($AST);
						$f_statsB = number_format($BLK);
						$f_statsS = number_format($STL);
						$f_statsT = number_format($TPM);
                  
                        echo "<tr class='viewPow1 leagueLeaders'>\n
						<td>$First_Name $Last_Name, $Team_INTL</td>\n                        
						<td class='align'>$f_statsP</td>\n
						<td class='align'>$f_statsR</td>\n
						<td class='align'>$f_statsA</td>\n
						<td class='align'>$f_statsB</td>\n
						<td class='align'>$f_statsS</td>\n
						<td class='align'>$f_statsT</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n";					

                  ?>
			   <p>Assists (AT) Blocks (BK) Steals (ST)</p>
			   
			 </li>
                </div>				
				 
				 <li id='record'>
                    <h3 class='schedule' title='Schedule Image'>SCHEDULE</h3>
                    <table style="width: 100%"> 
                    <tr>
                             <th style="width: 5%">DATE</th>
                             <th style="width: 5%">TIME</th>
                             <th style="width: 30%">TEAMS</th>
                             <th class="align" style="width: 2%">RECORD</th>
                    </tr>
                    <tr class='scores'>
                             <td>9/21</td>
                             <td>7pm</td>
                             <td>Nothing But Nets</td>
                             <td class="align pointGreen">(4-3)</td>
                    </tr>
                    <tr class='scores'>
                             <td></td>
                             <td></td>
                             <td>Trey Bueno</td>
                             <td class="align pointRed">(1-5)</td>
                    </tr>
					                   
                    <tr class='scores'>
                             <td></td>
                             <td>8pm</td>
                             <td>Nothing But Nets</td>
                             <td class="align pointGreen">(4-3)</td>
                    </tr>
                    <tr class='scores'>
                             <td></td>
                             <td></td>
                             <td>Trey Bueno</td>
                             <td class="align pointRed">(1-5)</td>
                    </tr>
					<tr class='scores'>
                             <td></td>
                             <td>9pm</td>
                             <td>Nothing But Nets</td>
                             <td class="align pointGreen">(4-3)</td>
                    </tr>
                    <tr class='scores'>
                             <td></td>
                             <td></td>
                             <td>Trey Bueno</td>
                             <td class="align pointRed">(1-5)</td>
                    </tr>
					</table>
                  <p class="align"><a href="/">Complete Schedule</a><br>All Times Central</p>
                </li> 
				 
                
			  
			  
								                
			  
             </div><!--primary column-->
			 			             
             <div class="secondary col"> 
			 
			 
                <li class="pow">                             
                   <h3 class='play alignL' title='Playbook Clipboard Image'><a href="/playbook.php">PLAY OF THE WEEK</a></h3>
				   <iframe class="fastModelContent" frameborder="0" scrolling="no" src="https://www.fastmodelsports.com/library/embedImage.jsp?id=bdc8e679-b7b8-433c-b9d9-5874272d4b60" width="265" height="380" ></iframe>
                </li>				
                
			 
                <li>
                 <?php
                  
                  //Create Search Query to populate League Stats by PPG Top 3
                  $query = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                  FROM Players, Teams, Players_Games_Stats
                  WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                  GROUP BY Last_Name
				  HAVING Total_Games >= Min_Games
				  ORDER BY PPG DESC
                  LIMIT 5";
                  $result = mysqli_query($cxn,$query)
                  or die ("Couldn't execute query.");
                  $nrows = mysqli_num_rows($result);

                                       
                     echo "<h3 class='leaders' title='League Leaders Image'><a href='/sampleBox.php'>LEAGUE LEADERS</a></h3>";
                     echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 2%;'>RK</th>
                           <th class='alignL' style='width: 50%;'>POINTS</th>
                           <th class='align' style='width: 1%;'><abbr title='Points per Game'>PPG</abbr></th>
                           </tr>\n";

                          
 
                    for($i=0;$i<$nrows;$i++)
                    {
                   
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result);
                        extract($row);

                        $f_stats = number_format($PPG,1);
                        echo "<tr class='leagueLeaders'>\n
                        <td class='number'>$n</td>\n
                        <td class='alignL'>$First_Name $Last_Name, $Team_INTL</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
						
                    }
                    echo "</table>\n";
					echo "<br>";
				 ?>
                                    
                 <?php
                   
                   //Create Search Query to populate League Stats by RPG Top 3
                   $query2 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY RPG DESC
                   LIMIT 5";
                   $result2 = mysqli_query($cxn,$query2)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result2);
                      
					  echo "<table style='width: 100%;'>\n";
                      echo "<tr class='checkRebounds'>\n
                           <th style='width: 2%;'>RK</th>
                           <th class='alignL' style='width: 50%;'>REBOUNDS</th>
                           <th class='align' style='width: 1%;'><abbr title='Rebounds per Game'>RPG</abbr></th>
                            </tr>\n";

                     for($i=0;$i<$nrows;$i++)
                     {
                         $n = $i + 1;
                         $row = mysqli_fetch_assoc($result2);
                         extract($row);
                         
                         $f_stats = number_format($RPG,1);
                         echo "<tr class='leagueLeaders viewRebounds'>\n
                         <td class='number'>$n</td>\n
                         <td class='alignL'>$First_Name $Last_Name, $Team_INTL</td>\n
                         <td class='align'>$f_stats</td>\n
                         </tr>\n";
                     }

                     echo "</table>\n";
					 echo "<br>";
				  ?>
                  
                  
                  <?php
                  
                   //Create Search Query to populate League Stats by APG Top 3
                   $query3 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY APG DESC
                   LIMIT 5";
                   $result3 = mysqli_query($cxn,$query3)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result3);

                      echo "<table style='width: 100%;'>\n";
                      echo "<tr class='checkAssists'>\n
                            <th style='width: 2%;'>RK</th>
                           <th class='alignL' style='width: 50%;'>ASSISTS</th>
                           <th class='align' style='width: 1%;'><abbr title='Assists per Game'>APG</abbr></th>
                            </tr>\n";

                     for($i=0;$i<$nrows;$i++)
                     {
                         $n = $i + 1;
                         $row = mysqli_fetch_assoc($result3);
                         extract($row);
                         $f_stats = number_format($APG,1);

                         echo "<tr class='leagueLeaders viewAssists'>\n
                               <td class='number'>$n</td>\n
                               <td class='alignL'>$First_Name $Last_Name, $Team_INTL</td>\n
                               <td class='align'>$f_stats</td>\n
                               </tr>\n";
                     }

                    echo "</table>\n";
                    echo "<br>";					
                  ?>
                                 
				 
                   <?php
                  
                   //Create Search Query to populate League Stats by BPG Top 3
                   $query4 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY BPG DESC
                   LIMIT 5";
                   $result4 = mysqli_query($cxn,$query4)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result4);

                     echo "<table style='width: 100%;'>\n";
                     echo "<tr class='checkBlocks'>\n
                           <th style='width: 2%;'>RK</th>
                           <th class='alignL' style='width: 50%;'>BLOCKS</th>
                           <th class='align' style='width: 1%;'><abbr title='Blocks per Game'>BPG</abbr></th>
                            </tr>\n";


                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result4);
                        extract($row);
                        $f_stats = number_format($BPG,1);

                        echo "<tr class='leagueLeaders viewBlocks'>\n
                              <td class='number'>$n</td>\n
                              <td class='alignL'>$First_Name $Last_Name, $Team_INTL</td>\n
                              <td class='align'>$f_stats</td>\n
                              </tr>\n";
                    }

                    echo "</table>\n";
                    echo "<br>";					
                   ?>
                   
                   
                   <?php
                  
                    //Create Search Query to populate League Stats by SPG Top 3
                    $query5 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                    FROM Players, Teams, Players_Games_Stats
                    WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                    GROUP BY First_Name, Last_Name
					HAVING Total_Games >= Min_Games
					ORDER BY SPG DESC
                    LIMIT 5";
                    $result5 = mysqli_query($cxn,$query5)
                    or die ("Couldn't execute query.");
                    $nrows = mysqli_num_rows($result5);

                     echo "<table style='width: 100%;'>\n";
                     echo "<tr class='checkSteals'>\n
                           <th style='width: 2%;'>RK</th>
                           <th class='alignL' style='width: 50%;'>STEALS</th>
                           <th class='align' style='width: 1%;'><abbr title='Steals per Game'>SPG</abbr></th>
                            </tr>\n";

                   for($i=0;$i<$nrows;$i++)
                   {
                       $n = $i + 1;
                       $row = mysqli_fetch_assoc($result5);
                       extract($row);
                       $f_stats = number_format($SPG,1);
                       
                       echo "<tr class='leagueLeaders viewSteals'>\n
                             <td class='number'>$n</td>\n
                             <td class='alignL'>$First_Name $Last_Name, $Team_INTL</td>\n
                             <td class='align'>$f_stats</td>\n
                             </tr>\n";
                   }

                   echo "</table>\n";
                   echo "<br>";				   
                  ?>
                  
                   
                   <?php
                  
                   //Create Search Query to populate League Stats by TPG Top 3
                   $query6 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY TPG DESC
                   LIMIT 5";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result6);

                     echo "<table style='width: 100%;'>\n";
                     echo "<tr class='checkThrees'>\n
                           <th style='width: 2%;'>RK</th>
                           <th class='alignL' style='width: 50%;'>THREES</th>
                           <th class='align' style='width: 1%;'><abbr title='Steals per Game'>3PG</abbr></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result6);
                        extract($row);
                        $f_stats = number_format($TPG,1);
                  
                        echo "<tr class='leagueLeaders viewThrees'>\n
                        <td class='number'>$n</td>\n
                        <td class='alignL'>$First_Name $Last_Name, $Team_INTL</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n";             
                    
                  ?>
                <p><a href='/sampleBox.php#three'>Complete List</a><br>*Minimum 65% of games played</p>
              </li>
             </div><!--secondary column-->             
           </section>
		   </ul>
           </div><!--container div-->
          </div><!--wrap div-->

           <?php include("inc/footer.php"); ?>
