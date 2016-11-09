            <?php include("inc/header.php"); ?>
            
			<div class="primary tabx">
			
			<li>
			<h3>TEAM STATS LEADERBOARD</h3>
			
			<ul id="viewMenu" class="tabx-menu weeks">
                   <li><a href="#" data-tabx="tab1">PS</a></li>
				   <li><a href="#" data-tabx="tab2">PA</a></li>
				   <li><a href="#" data-tabx="tab3">REB</a></li>
				   <li><a href="#" data-tabx="tab4">AST</a></li>
				   <li><a href="#" data-tabx="tab5">BLK</a></li>
				   <li><a href="#" data-tabx="tab6">STL</a></li>
				   <li><a href="#" data-tabx="tab7">3'S</a></li>
			</ul>
			
				   
				   <div class="tabs">
				    <div class="tab tab1">
                 <?php
                  include("db.php");
                 
                  //Create Search Query to populate League Team Stats by Points Scored per Game
                  $query15 = "SELECT Team_Name, SUM(Points_Scored) AS Total_Points, (SUM(Points_Scored) / SUM(Team_Wins + Team_Losses)) AS AVG_Points 
                   FROM Scores, Teams 
                   WHERE Teams.Team_ID = Scores.Team_ID 
                   GROUP BY Team_Name ORDER BY AVG_Points DESC";
                   $result15 = mysqli_query($cxn,$query15)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result15);

                     //Average Team Points Scored per game during season
                    echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>RK</th>
                           <th class='alignL' style='width: 25%;'>Team</th>
                           <th class='align' style='width: 10%;'><abbr title='Average Points Teams Scored per Game'>Points Scored/G</abbr></th>
                           </tr>\n";
 
                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result15);
                        extract($row);

                        $f_stats = number_format($AVG_Points,1);
                        echo "<tr class='teams'>\n
                        <td>$n.</td>\n
                        <td>$Team_Name</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }
                    
                    echo "</table>\n";
                    ?>
                   </div><!---div tab1-->
				   
				   <div class="tab tab2">
				     <?php
                   
                   //Create Search Query to populate League Team Stats by Points Allowed per Game
                   $query16 = "SELECT Team_Name, SUM(Points_Allowed) AS Total_PointsAllowed, (SUM(Points_Allowed) / SUM(Team_Wins + Team_Losses)) AS AVG_PointsAllowed
                   FROM Scores, Teams 
                   WHERE Teams.Team_ID = Scores.Team_ID 
                   GROUP BY Team_Name ORDER BY AVG_PointsAllowed ASC";
                   $result16 = mysqli_query($cxn,$query16)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result16);

                      //Average Team Points Allowed per game during season
                    echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>RK</th>
                           <th class='alignL' style='width: 25%;'>Team</th>
                           <th class='align' style='width: 10%;'><abbr title='Average Points Teams Allowed per Game'>Points Allowed/G</abbr></th>
                           </tr>\n";
 
                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result16);
                        extract($row);

                        $f_stats = number_format($AVG_PointsAllowed,1);
                        echo "<tr class='teams'>\n
                        <td>$n.</td>\n
                        <td>$Team_Name</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }
                    
                    echo "</table>\n";
                   ?>
				   </div><!---div tab2-->
				   
				   <div class="tab tab3">
				     <?php
                  
                   //Create Search Query to populate League Team Stats by Rebounds per Game
                   $query17 = "SELECT Team_Name, Total_Games, SUM(Player_GameTotalRebounds/Total_Games) AS AVG_TeamRebounds
                   FROM Players_Games_Stats, Players, Teams
                   WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID
				   GROUP BY Team_Name
				   ORDER BY AVG_TeamRebounds DESC";
                   $result17 = mysqli_query($cxn,$query17)
                   or die ("Couldn't execute query.");
                   $nrows1 = mysqli_num_rows($result17);

                      //Average Team Rebounds per game during season
					echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>RK</th>
                           <th class='alignL' style='width: 25%;'>Team</th>
                           <th class='align' style='width: 10%;'><abbr title='Average Team Rebounds per Game'>Rebounds/G</abbr></th>
                           </tr>\n";
 
                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result17);
                        extract($row);

                        $f_stats = number_format($AVG_TeamRebounds,1);
                        echo "<tr class='teams'>\n
                        <td>$n.</td>\n
                        <td>$Team_Name</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }
                    
                    echo "</table>\n";     
                   ?>
				   </div><!---div tab3-->
				   
				   <div class="tab tab4">
				    <?php

                   //Create Search Query to populate League Team Stats by Assists per Game
                   $query18 = "SELECT Team_Name, Total_Games, SUM(Player_GameTotalAssists/Total_Games) AS AVG_TeamAssists
                   FROM Players_Games_Stats, Players, Teams
                   WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID
				   GROUP BY Team_Name
				   ORDER BY AVG_TeamAssists DESC";
                   $result18 = mysqli_query($cxn,$query18)
                   or die ("Couldn't execute query.");
                   $nrows1 = mysqli_num_rows($result18);

                     //Average Team Assists per game during season
					echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>RK</th>
                           <th class='alignL' style='width: 25%;'>Team</th>
                           <th class='align' style='width: 10%;'><abbr title='Average Team Assists per Game'>Assists/G</abbr></th>
                           </tr>\n";
 
                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result18);
                        extract($row);

                        $f_stats = number_format($AVG_TeamAssists,1);
                        echo "<tr class='teams'>\n
                        <td>$n.</td>\n
                        <td>$Team_Name</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }
                    
                    echo "</table>\n";
                   ?>
				   </div><!---div tab4-->
				   
				   <div class="tab tab5">				   
                   <?php
                  $host="localhost";
                  $user="hardwop0_Me";
                  $password="Dajar36.";
                  $dbname ="hardwop0__FallLeague2015Test";

                  //Create Connection
                  $cxn=mysqli_connect($host, $user, $password, $dbname)
                  or die("<p>Error connecting to database: " .
                  mysqli_error() . "</p>");

                    //Create Search Query to populate League Team Stats by Blocks per Game
                   $query19 = "SELECT Team_Name, Total_Games, SUM(Player_GameTotalBlocks/Total_Games) AS AVG_TeamBlocks
                   FROM Players_Games_Stats, Players, Teams
                   WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID
				   GROUP BY Team_Name
				   ORDER BY AVG_TeamBlocks DESC";
                   $result19 = mysqli_query($cxn,$query19)
                   or die ("Couldn't execute query.");
                   $nrows1 = mysqli_num_rows($result19);

                     //Average Team Blocks per game during season
					echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>RK</th>
                           <th class='alignL' style='width: 25%;'>Team</th>
                           <th class='align' style='width: 10%;'><abbr title='Average Team Blocks per Game'>Blocks/G</abbr></th>
                           </tr>\n";
 
                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result19);
                        extract($row);

                        $f_stats = number_format($AVG_TeamBlocks,1);
                        echo "<tr class='teams'>\n
                        <td>$n.</td>\n
                        <td>$Team_Name</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }
                    
                    echo "</table>\n";
                  ?>              
                  </div><!---div tab5-->
				   
				   <div class="tab tab6">
				    <?php
                  
                   //Create Search Query to populate League Team Stats by Steals per Game
                   $querySteals = "SELECT Team_Name, Total_Games, SUM(Player_GameTotalSteals/Total_Games) AS AVG_TeamSteals
                   FROM Players_Games_Stats, Players, Teams
                   WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID
				   GROUP BY Team_Name
				   ORDER BY AVG_TeamSteals DESC";
                   $resultSteals = mysqli_query($cxn,$querySteals)
                   or die ("Couldn't execute query.");
                   $nrows1 = mysqli_num_rows($resultSteals);

                     //Average Team Steals per game during season
					echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>RK</th>
                           <th class='alignL' style='width: 25%;'>Team</th>
                           <th class='align' style='width: 10%;'><abbr title='Average Team Steals per Game'>Steals/G</abbr></th>
                           </tr>\n";
 
                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($resultSteals);
                        extract($row);

                        $f_stats = number_format($AVG_TeamSteals,1);
                        echo "<tr class='teams'>\n
                        <td>$n.</td>\n
                        <td>$Team_Name</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }
                    
                    echo "</table>\n";  

                  ?>
				   </div><!---div tab6-->
				   
				   <div class="tab tab7">
				    <?php
                  
                   //Create Search Query to populate League team Stats by Three-Pointers Made per Game
                   $queryThrees = "SELECT Team_Name, Total_Games, SUM(Player_GameTotal3PTM/Total_Games) AS AVG_TeamThrees
                   FROM Players_Games_Stats, Players, Teams
                   WHERE Teams.Team_ID = Players_Games_Stats.Team_ID AND Players.Player_ID = Players_Games_Stats.Player_ID AND Teams.Team_ID = Players.Team_ID
				   GROUP BY Team_Name
				   ORDER BY AVG_TeamThrees DESC";
                   $resultThrees = mysqli_query($cxn,$queryThrees)
                   or die ("Couldn't execute query.");
                   $nrows1 = mysqli_num_rows($resultThrees);

                     //Average Team Threes per game during season
					echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>RK</th>
                           <th class='alignL' style='width: 25%;'>Team</th>
                           <th class='align' style='width: 10%;'><abbr title='Average Team 3-Pointers Made per Game'>Threes/G</abbr></th>
                           </tr>\n";
 
                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($resultThrees);
                        extract($row);

                        $f_stats = number_format($AVG_TeamThrees,1);
                        echo "<tr class='teams'>\n
                        <td>$n.</td>\n
                        <td>$Team_Name</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }
                    
                    echo "</table>\n";
                  ?>
				   </div><!---div tab7-->
				   
                  </div><!---div tabs-->
				 <p>Points Scored (PS) Points Allowed (PA)</p> 
            </li>
			</div><!--primary column-->
			 
			<div class="secondary">
		 
		<li>
			   <?php
                  
                   //Create Search Query to populate Player's League Stats per Team
                   $query6 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, 
           (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals ) + AVG( Player_GameTotal3PTM )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID AND Teams.Team_ID = '1'
                   GROUP BY First_Name, Last_Name ORDER BY PI DESC";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows6 = mysqli_num_rows($result6);

                   $query7 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, 
           (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals ) + AVG( Player_GameTotal3PTM )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID AND Teams.Team_ID = '2'
                   GROUP BY First_Name, Last_Name ORDER BY PI DESC";
                   $result7 = mysqli_query($cxn,$query7)
                   or die ("Couldn't execute query.");
                   $nrows7 = mysqli_num_rows($result7);
				   
				   $queryMF = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, 
           (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals ) + AVG( Player_GameTotal3PTM )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID AND Teams.Team_ID = '3'
                   GROUP BY First_Name, Last_Name ORDER BY PI DESC";
                   $resultMF = mysqli_query($cxn,$queryMF)
                   or die ("Couldn't execute query.");
                   $nrowsMF = mysqli_num_rows($resultMF);
				   
				   $queryEE = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, 
           (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals ) + AVG( Player_GameTotal3PTM )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID AND Teams.Team_ID = '4'
                   GROUP BY First_Name, Last_Name ORDER BY PI DESC";
                   $resultEE = mysqli_query($cxn,$queryEE)
                   or die ("Couldn't execute query.");
                   $nrowsEE = mysqli_num_rows($resultEE);
				   
				   $queryTB = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, 
           (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals ) + AVG( Player_GameTotal3PTM )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID AND Teams.Team_ID = '5'
                   GROUP BY First_Name, Last_Name ORDER BY PI DESC";
                   $resultTB = mysqli_query($cxn,$queryTB)
                   or die ("Couldn't execute query.");
                   $nrowsTB = mysqli_num_rows($resultTB);
				   
				   $queryNBN = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, 
           (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals ) + AVG( Player_GameTotal3PTM )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID AND Teams.Team_ID = '6'
                   GROUP BY First_Name, Last_Name ORDER BY PI DESC";
                   $resultNBN = mysqli_query($cxn,$queryNBN)
                   or die ("Couldn't execute query.");
                   $nrowsNBN = mysqli_num_rows($resultNBN);
				   
             
           echo "<h3>Teams</h3>\n";
                     echo "<table style='width: 100%;'>\n";
                     echo "<tr class='checkTeam1'>\n          
                           <th class='scores'>LAF Meatheads</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewTeam1'>\n                           
                           <th class='alignL' width='50%'><h6>Name</h6></th>
                           <th width='3%' class='align'><h5>PPG</h5></th>
                           <th width='3%' class='align'><h5>RPG</h5></th>
                           <th width='3%' class='align'><h5>APG</h5></th>
                           <th width='3%' class='align'><h5>BPG</h5></th>
                           <th width='3%' class='align'><h5>SPG</h5></th>
                           <th width='3%' class='align'><h5>3PG</h5></th>
                           <th width='3%' class='align'><h5>PWI*</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows6;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result6);
                        extract($row);
                        $f_statsP = number_format($PPG,1);
            $f_statsR = number_format($RPG,1);
            $f_statsA = number_format($APG,1);
            $f_statsB = number_format($BPG,1);
            $f_statsS = number_format($SPG,1);
            $f_statsT = number_format($TPG,1);
            $f_statsPI = number_format($PI,1);
                  
                        echo "<tr class='viewTeam1'>\n                        
                        <td>$First_Name $Last_Name</td>\n                        
            <td class='align'>$f_statsP</td>\n
            <td class='align'>$f_statsR</td>\n
            <td class='align'>$f_statsA</td>\n
            <td class='align'>$f_statsB</td>\n
            <td class='align'>$f_statsS</td>\n
            <td class='align'>$f_statsT</td>\n
      <td class='align'>$f_statsPI</td>\n
                        </tr>\n";
                    }
					echo "</table>\n";
					echo "<br>";
					
					
					echo "<table style='width: 100%;'>\n";
                    echo "<tr class='checkTeam2'>\n          
                           <th class='scores'>The Monstars</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewTeam2'>\n                           
                           <th class='alignL' width='50%'><h6>Name</h6></th>
                           <th width='3%' class='align'><h5>PPG</h5></th>
                           <th width='3%' class='align'><h5>RPG</h5></th>
                           <th width='3%' class='align'><h5>APG</h5></th>
                           <th width='3%' class='align'><h5>BPG</h5></th>
                           <th width='3%' class='align'><h5>SPG</h5></th>
                           <th width='3%' class='align'><h5>3PG</h5></th>
                           <th width='3%' class='align'><h5>PWI*</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrows7;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result7);
                        extract($row);
                        $f_statsP = number_format($PPG,1);
            $f_statsR = number_format($RPG,1);
            $f_statsA = number_format($APG,1);
            $f_statsB = number_format($BPG,1);
            $f_statsS = number_format($SPG,1);
            $f_statsT = number_format($TPG,1);
            $f_statsPI = number_format($PI,1);
                  
                        echo "<tr class='viewTeam2'>\n                        
                        <td>$First_Name $Last_Name</td>\n                        
            <td class='align'>$f_statsP</td>\n
            <td class='align'>$f_statsR</td>\n
            <td class='align'>$f_statsA</td>\n
            <td class='align'>$f_statsB</td>\n
            <td class='align'>$f_statsS</td>\n
            <td class='align'>$f_statsT</td>\n
      <td class='align'>$f_statsPI</td>\n
                        </tr>\n";
                    }
                    echo "</table>\n";
					echo "<br>";
					
					
					echo "<table style='width: 100%;'>\n";
                     echo "<tr class='checkTeam3'>\n          
                           <th class='scores'>Mellow Fellows</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewTeam3'>\n                           
                           <th class='alignL' width='50%'><h6>Name</h6></th>
                           <th width='3%' class='align'><h5>PPG</h5></th>
                           <th width='3%' class='align'><h5>RPG</h5></th>
                           <th width='3%' class='align'><h5>APG</h5></th>
                           <th width='3%' class='align'><h5>BPG</h5></th>
                           <th width='3%' class='align'><h5>SPG</h5></th>
                           <th width='3%' class='align'><h5>3PG</h5></th>
                           <th width='3%' class='align'><h5>PWI*</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrowsMF;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($resultMF);
                        extract($row);
                        $f_statsP = number_format($PPG,1);
            $f_statsR = number_format($RPG,1);
            $f_statsA = number_format($APG,1);
            $f_statsB = number_format($BPG,1);
            $f_statsS = number_format($SPG,1);
            $f_statsT = number_format($TPG,1);
            $f_statsPI = number_format($PI,1);
                  
                        echo "<tr class='viewTeam3'>\n                        
                        <td>$First_Name $Last_Name</td>\n                        
            <td class='align'>$f_statsP</td>\n
            <td class='align'>$f_statsR</td>\n
            <td class='align'>$f_statsA</td>\n
            <td class='align'>$f_statsB</td>\n
            <td class='align'>$f_statsS</td>\n
            <td class='align'>$f_statsT</td>\n
      <td class='align'>$f_statsPI</td>\n
                        </tr>\n";
                    }
					echo "</table>\n";
					echo "<br>";
					
					
					echo "<table style='width: 100%;'>\n";
                     echo "<tr class='checkTeam4'>\n          
                           <th class='scores'>Elite Effort</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewTeam4'>\n                           
                           <th class='alignL' width='50%'><h6>Name</h6></th>
                           <th width='3%' class='align'><h5>PPG</h5></th>
                           <th width='3%' class='align'><h5>RPG</h5></th>
                           <th width='3%' class='align'><h5>APG</h5></th>
                           <th width='3%' class='align'><h5>BPG</h5></th>
                           <th width='3%' class='align'><h5>SPG</h5></th>
                           <th width='3%' class='align'><h5>3PG</h5></th>
                           <th width='3%' class='align'><h5>PWI*</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrowsEE;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($resultEE);
                        extract($row);
                        $f_statsP = number_format($PPG,1);
            $f_statsR = number_format($RPG,1);
            $f_statsA = number_format($APG,1);
            $f_statsB = number_format($BPG,1);
            $f_statsS = number_format($SPG,1);
            $f_statsT = number_format($TPG,1);
            $f_statsPI = number_format($PI,1);
                  
                        echo "<tr class='viewTeam4'>\n                        
                        <td>$First_Name $Last_Name</td>\n                        
            <td class='align'>$f_statsP</td>\n
            <td class='align'>$f_statsR</td>\n
            <td class='align'>$f_statsA</td>\n
            <td class='align'>$f_statsB</td>\n
            <td class='align'>$f_statsS</td>\n
            <td class='align'>$f_statsT</td>\n
      <td class='align'>$f_statsPI</td>\n
                        </tr>\n";
                    }
					echo "</table>\n";
					echo "<br>";
					
					
					echo "<table style='width: 100%;'>\n";
                     echo "<tr class='checkTeam5'>\n          
                           <th class='scores'>Trey Bueno</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewTeam5'>\n                           
                           <th class='alignL' width='50%'><h6>Name</h6></th>
                           <th width='3%' class='align'><h5>PPG</h5></th>
                           <th width='3%' class='align'><h5>RPG</h5></th>
                           <th width='3%' class='align'><h5>APG</h5></th>
                           <th width='3%' class='align'><h5>BPG</h5></th>
                           <th width='3%' class='align'><h5>SPG</h5></th>
                           <th width='3%' class='align'><h5>3PG</h5></th>
                           <th width='3%' class='align'><h5>PWI*</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrowsTB;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($resultTB);
                        extract($row);
                        $f_statsP = number_format($PPG,1);
            $f_statsR = number_format($RPG,1);
            $f_statsA = number_format($APG,1);
            $f_statsB = number_format($BPG,1);
            $f_statsS = number_format($SPG,1);
            $f_statsT = number_format($TPG,1);
            $f_statsPI = number_format($PI,1);
                  
                        echo "<tr class='viewTeam5'>\n                        
                        <td>$First_Name $Last_Name</td>\n                        
            <td class='align'>$f_statsP</td>\n
            <td class='align'>$f_statsR</td>\n
            <td class='align'>$f_statsA</td>\n
            <td class='align'>$f_statsB</td>\n
            <td class='align'>$f_statsS</td>\n
            <td class='align'>$f_statsT</td>\n
      <td class='align'>$f_statsPI</td>\n
                        </tr>\n";
                    }
					echo "</table>\n";
					echo "<br>";
					
					
					echo "<table style='width: 100%;'>\n";
                     echo "<tr class='checkTeam6'>\n          
                           <th class='scores'>Nothing but Nets</th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'></th>
                           <th width='3%' class='align'><img src='images/statExpand.svg' alt='Expand icon image' style='width:15px;height:15px;'></th>
                            </tr>\n";
                     echo "<tr class='viewTeam6'>\n                           
                           <th class='alignL' width='50%'><h6>Name</h6></th>
                           <th width='3%' class='align'><h5>PPG</h5></th>
                           <th width='3%' class='align'><h5>RPG</h5></th>
                           <th width='3%' class='align'><h5>APG</h5></th>
                           <th width='3%' class='align'><h5>BPG</h5></th>
                           <th width='3%' class='align'><h5>SPG</h5></th>
                           <th width='3%' class='align'><h5>3PG</h5></th>
                           <th width='3%' class='align'><h5>PWI*</h5></th>
                            </tr>\n";

                    for($i=0;$i<$nrowsNBN;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($resultNBN);
                        extract($row);
                        $f_statsP = number_format($PPG,1);
            $f_statsR = number_format($RPG,1);
            $f_statsA = number_format($APG,1);
            $f_statsB = number_format($BPG,1);
            $f_statsS = number_format($SPG,1);
            $f_statsT = number_format($TPG,1);
            $f_statsPI = number_format($PI,1);
                  
                        echo "<tr class='viewTeam6'>\n                        
                        <td>$First_Name $Last_Name</td>\n                        
            <td class='align'>$f_statsP</td>\n
            <td class='align'>$f_statsR</td>\n
            <td class='align'>$f_statsA</td>\n
            <td class='align'>$f_statsB</td>\n
            <td class='align'>$f_statsS</td>\n
            <td class='align'>$f_statsT</td>\n
      <td class='align'>$f_statsPI</td>\n
                        </tr>\n";
                    }
					echo "</table>\n";
             ?> 
            <br>
            <p><a href='/sampleBox.php'>PLAYER STATS</a></p>			 
            <p>*Power Index (PWI) is a cumulative statistical metric.</p>			 
            </li>       
			 
            </div><!--secondary column-->			
			 
			 </ul>
            			
           </div><!--container div-->
          </div><!--wrap div-->

           <?php include("inc/footer.php"); ?>
