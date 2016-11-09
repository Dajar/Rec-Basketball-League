           <?php include("inc/header.php"); ?>
 
			<div class="primary col tabx">
			
			<li>
			<h3>STATS LEADERBOARD</h3>
			
			<ul id="viewMenu" class="tabx-menu weeks">
                   <li><a href="#" data-tabx="tab1">PTS</a></li>
				   <li><a href="#" data-tabx="tab2">RBS</a></li>
				   <li><a href="#" data-tabx="tab3">AST</a></li>
				   <li><a href="#" data-tabx="tab4">BLK</a></li>
				   <li><a href="#" data-tabx="tab5">STL</a></li>
				   <li><a href="#" data-tabx="tab6">3'S</a></li>
				   <li><a href="#" data-tabx="tab7">PWI*</a></li>
			</ul>
			
				   
				   <div class="tabs">
				    <div class="tab tab1">
                 <?php
                  include("db.php");

                  //Create Search Query to populate League Stats by PPG
                  $query = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                  FROM Players, Teams, Players_Games_Stats
                  WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                  GROUP BY First_Name, Last_Name
				  HAVING Total_Games >= Min_Games
				  ORDER BY PPG DESC, Last_Name ASC";
                  $result = mysqli_query($cxn,$query)
                  or die ("Couldn't execute query.");
                  $nrows = mysqli_num_rows($result);

                     echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>#</th>
                           <th class='alignL' style='width: 25%;'>Name, Team</th>
                           <th class='align' style='width: 1%;'><abbr title='Points per Game'>Points/G</abbr></th>
                           </tr>\n";
 
                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result);
                        extract($row);

                        $f_stats = number_format($PPG,1);
                        echo "<tr class='leagueLeaders'>\n
                        <td>$n.</td>\n
                        <td>$First_Name $Last_Name, $Team_INTL</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }
                    
                    echo "</table>\n";
                    ?>
                   </div><!---div tab1-->
				   
				   <div class="tab tab2">
				     <?php
                     
                   //Create Search Query to populate League Stats by RPG
                   $query2 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY RPG DESC, Last_Name ASC";
                   $result2 = mysqli_query($cxn,$query2)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result2);

                      echo "<table style='width: 100%;'>\n";
                      echo "<tr>\n
                           <th style='width: 1%;'>#</th>
                           <th class='alignL' style='width: 25%;'>Name, Team</th>
                           <th class='align' style='width: 1%;><abbr title='Rebounds per Game'>Rebounds/G</abbr></th>
                            </tr>\n";

                     for($i=0;$i<$nrows;$i++)
                     {
                         $n = $i + 1;
                         $row = mysqli_fetch_assoc($result2);
                         extract($row);
                         
                         $f_stats = number_format($RPG,1);
                         echo "<tr class='leagueLeaders'>\n
                         <td>$n.</td>\n
                         <td>$First_Name $Last_Name, $Team_INTL</td>\n
                         <td class='align'>$f_stats</td>\n
                         </tr>\n";
                     }

                     echo "</table>\n";
                   ?>
				   </div><!---div tab2-->
				   
				   <div class="tab tab3">
				     <?php
				  
                   //Create Search Query to populate League Stats by APG
                   $query3 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY APG DESC, Last_Name ASC";
                   $result3 = mysqli_query($cxn,$query3)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result3);

                      echo "<table style='width: 100%;'>\n";
                      echo "<tr>\n
                           <th style='width: 1%;'>#</th>
                           <th class='alignL' style='width: 25%;'>Name, Team</th>
                           <th class='align' style='width: 1%;><abbr title='Assists per Game'>Assists/G</abbr></th>
                            </tr>\n";

                     for($i=0;$i<$nrows;$i++)
                     {
                         $n = $i + 1;
                         $row = mysqli_fetch_assoc($result3);
                         extract($row);
                         $f_stats = number_format($APG,1);

                         echo "<tr class='leagueLeaders'>\n
                               <td>$n.</td>\n
                               <td>$First_Name $Last_Name, $Team_INTL</td>\n
                               <td class='align'>$f_stats</td>\n
                               </tr>\n";
                     }

                    echo "</table>\n";          
                   ?>
				   </div><!---div tab3-->
				   
				   <div class="tab tab4">
				    <?php
				  
                   //Create Search Query to populate League Stats by BPG
                   $query4 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY BPG DESC, Last_Name ASC";
                   $result4 = mysqli_query($cxn,$query4)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result4);

                     echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>#</th>
                           <th class='alignL' style='width: 25%;'>Name, Team</th>
                           <th class='align' style='width: 1%;><abbr title='Blocks per Game'>Blocks/G</abbr></th>
                            </tr>\n";


                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result4);
                        extract($row);
                        $f_stats = number_format($BPG,1);

                        echo "<tr class='leagueLeaders'>\n
                              <td>$n.</td>\n
                              <td>$First_Name $Last_Name, $Team_INTL</td>\n
                              <td class='align'>$f_stats</td>\n
                              </tr>\n";
                    }

                    echo "</table>\n";
                   ?>
				   </div><!---div tab4-->
				   
				   <div class="tab tab5">				   
                   <?php

                    //Create Search Query to populate League Stats by SPG
                    $query5 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                    FROM Players, Teams, Players_Games_Stats
                    WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                    GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY SPG DESC, Last_Name ASC";
                    $result5 = mysqli_query($cxn,$query5)
                    or die ("Couldn't execute query.");
                    $nrows = mysqli_num_rows($result5);

                     echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>#</th>
                           <th class='alignL' style='width: 25%;'>Name, Team</th>
                           <th class='align' style='width: 1%;><abbr title='Steals per Game'>Steals/G</abbr></th>
                            </tr>\n";

                   for($i=0;$i<$nrows;$i++)
                   {
                       $n = $i + 1;
                       $row = mysqli_fetch_assoc($result5);
                       extract($row);
                       $f_stats = number_format($SPG,1);
                       
                       echo "<tr class='leagueLeaders'>\n
                             <td>$n.</td>\n
                             <td>$First_Name $Last_Name, $Team_INTL</td>\n
                             <td class='align'>$f_stats</td>\n
                             </tr>\n";
                   }

                   echo "</table>\n";
                  ?>              
                  </div><!---div tab5-->
				   
				   <div class="tab tab6">
				    <?php
                  
                   //Create Search Query to populate League Stats by TPG
                   $query6 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY TPG DESC, Last_Name ASC";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result6);

                     echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>#</th>
                           <th class='alignL' style='width: 25%;'>Name, Team</th>
                           <th class='align' style='width: 1%;><abbr title='Threes per Game'>Threes/G</abbr></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result6);
                        extract($row);
                        $f_stats = number_format($TPG,1);
                  
                        echo "<tr class='leagueLeaders'>\n
                        <td>$n.</td>\n
                        <td>$First_Name $Last_Name, $Team_INTL</td>\n
                        <td class='align'>$f_stats</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n";             

                  ?>
				   </div><!---div tab6-->
				   
				   <div class="tab tab7">
				    <?php
				  
                   //Create Search Query to populate League Stats by PWI/G
                   $query6 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games, 
				   (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals ) + AVG( Player_GameTotal3PTM )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name
				   HAVING Total_Games >= Min_Games
				   ORDER BY PI DESC, Last_Name ASC";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result6);

                     echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th style='width: 1%;'>#</th>
                           <th class='alignL' style='width: 25%;'>Name, Team</th>
                           <th class='align' style='width: 1%;><abbr title='Power Index per Game'>PWI/G*</abbr></th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result6);
                        extract($row);
						$f_statsPI = number_format($PI,1);
                  
                        echo "<tr class='leagueLeaders'>\n
                        <td>$n.</td>\n
                        <td>$First_Name $Last_Name, $Team_INTL</td>\n
                        <td class='align'>$f_statsPI</td>\n
                        </tr>\n";
                    }

                    echo "</table>\n";             

                  ?>
				   </div><!---div tab7-->
				   
                  </div><!---div tabs-->
				  <p><a href="/sampleTeams.php">team stats</a></p><p>*Power Index (PWI) is a cumulative statistical metric.<br>Minimum 65% of games played.</p>                 				  
				</li>
				
			    <!--<li>
			   
			    <?php
				   
                   //Create Search Query to populate all player's League Stats
                   $query6 = "SELECT First_Name, Last_Name, Team_INTL, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, 
				   (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals ) + AVG( Player_GameTotal3PTM )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY Last_Name ORDER BY TPG DESC";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result6);
                     
					 echo "<h3>Player Averages</h3>\n";
                     echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n                           
                           <th class='alignL' width='50%'>Name, Team</th>
                           <th width='3%' class='align'>PPG</th>
                           <th width='3%' class='align'>RPG</th>
                           <th width='3%' class='align'>APG</th>
                           <th width='3%' class='align'>BPG</th>
                           <th width='3%' class='align'>SPG</th>
                           <th width='3%' class='align'>3PG</th>
						   <th width='3%' class='align'>PWI</th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
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
                  
                        echo "<tr>\n                        
                        <td>$First_Name $Last_Name, $Team_INTL</td>\n                        
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
				  <p style="color:gray; text-align:right"><i>PWI (Power Index) is a cumulative statistical metric.</i></p>
			   </li>-->
			</div><!--primary column-->
			 
			<div class="secondary col">

      <li>
         <h3>AWARDS</h3>
         <?php
                  
                   //Create Search Query to populate MVP Race based on Power Index query 
				   $reg_season = 6;
                   $query6 = "SELECT First_Name, Last_Name, Team_INTL, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games, (SUM(Player_Wins)/$reg_season) AS Win_PCT, AVG( Player_GameTotalPoints ) AS PPG, AVG( Player_GameTotalRebounds ) AS RPG, AVG( Player_GameTotalAssists ) AS APG, AVG( Player_GameTotalBlocks ) AS BPG, AVG( Player_GameTotalSteals ) AS SPG, AVG( Player_GameTotal3PTM ) AS TPG, 
           (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalRebounds ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals )) AS PI
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID
                   GROUP BY First_Name, Last_Name 
				   HAVING Total_Games >= Min_Games
				   AND Win_PCT >= .500
				   ORDER BY PI DESC, Last_Name ASC
                   LIMIT 10";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result6);
                     
           echo "<h4>MVP RACE</h4>\n";
           echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th class='alignL' width='5%'>RK</th>          
                           <th class='alignL' width='70%'>Name</th>
                           <th width='10%' class='align'>UPV*</th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                      
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result6);
                        extract($row);
                        $f_statsPI = number_format($PI,1);
                        $f_statsP = number_format($PPG,1);
            $f_statsR = number_format($RPG,1);
            $f_statsA = number_format($APG,1);
            $f_statsB = number_format($BPG,1);
            $f_statsS = number_format($SPG,1);
            $f_statsT = number_format($TPG,1);
            
                  
                        echo "<tr class='leagueLeaders'>\n 
                        <td>$n.</td>            
                        <td>$First_Name $Last_Name, $Team_INTL</td>\n
                        <th class='align'>$f_statsPI</th>\n 
                        </tr>\n";
                    }

                    echo "</table>\n"; 


                  ?>
         <p>*Ultimate Player Value (UPV) = PPG + APG + RBG + BPG + SPG.<br>
         To qualify: 1. Contributed Win % needs to be greater than .500.<br>Contributed Win % = Team Wins Played in/Team Regular Season Games<br>2. Minimum 65% of games played.</p>
         
         
       </li>
	   
	   
	   <li>
         
         <?php
                  
                   //Create Search Query to populate Offensive Player of Season Award based on Points/G + Assists/G playing a minimum of 4 games
                   $query6 = "SELECT First_Name, Last_Name, Team_INTL, (AVG( Player_GameTotalBlocks ) + AVG( Player_GameTotalSteals )) AS DPOS, (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalAssists )) AS OPOS, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID 
                   GROUP BY First_Name, Last_Name 
				   HAVING Total_Games >= Min_Games
				   ORDER BY DPOS DESC
		           LIMIT 5";
                   $result6 = mysqli_query($cxn,$query6)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result6);
                     
           echo "<h4>DEFENSIVE PLAYER RANKING</h4>\n";
           echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th class='alignL' width='5%'>RK</th>          
                           <th class='alignL' width='70%'>Name</th>
                           <th width='10%' class='align'>DPR*</th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result6);
                        extract($row);
						
						$f_statsDPOS = number_format($DPOS,1);
						
						echo "<tr class='leagueLeaders'>\n 
                        <td>$n.</td>            
                        <td>$First_Name $Last_Name, $Team_INTL</td>\n
                        <th class='align'>$f_statsDPOS</th>\n						
                        </tr>\n";
						
                    }

                    echo "</table>\n"; 


                  ?>
         <p>*Defensive Player Rating (DPR) = BPG + SPG.<br> Minimum 65% of games played.</p>
         
         
       </li>
	   
	   <li>
         
         <?php
                  
                   //Create Search Query to populate Offensive Player of Season Award based on Points/G + Assists/G playing a minimum of 4 games 
                   $query7 = "SELECT First_Name, Last_Name, Team_INTL, (AVG( Player_GameTotalPoints ) + AVG( Player_GameTotalAssists ) + AVG( Player_GameTotal3PTM )) AS OPOS, SUM(Games_Played) AS Total_Games, (Total_Games * .65) AS Min_Games
                   FROM Players, Teams, Players_Games_Stats
                   WHERE Teams.Team_ID = Players.Team_ID AND Players_Games_Stats.Player_ID = Players.Player_ID AND Teams.Team_ID = Players_Games_Stats.Team_ID 
                   GROUP BY First_Name, Last_Name 
				   HAVING Total_Games >= Min_Games
				   ORDER BY OPOS DESC
		           LIMIT 5";
                   $result7 = mysqli_query($cxn,$query7)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result7);
                     
           echo "<h4>OFFENSIVE PLAYER RANKING</h4>\n";
           echo "<table style='width: 100%;'>\n";
                     echo "<tr>\n
                           <th class='alignL' width='5%'>RK</th>          
                           <th class='alignL' width='70%'>Name</th>
                           <th width='10%' class='align'>OPR*</th>
                            </tr>\n";

                    for($i=0;$i<$nrows;$i++)
                    {
                        $n = $i + 1;
                        $row = mysqli_fetch_assoc($result7);
                        extract($row);
						
						$f_statsOPOS = number_format($OPOS,1);
												
						echo "<tr class='leagueLeaders'>\n 
                        <td>$n.</td>            
                        <td>$First_Name $Last_Name, $Team_INTL</td>\n
                        <th class='align'>$f_statsOPOS</th>\n						
                        </tr>\n";
						
                    }

                    echo "</table>\n"; 


                  ?>
         <p>*Offensive Player Rating (OPR) = PPG + APG + 3PG.<br>Minimum 65% of games played.</p>
         
         
       </li>




			 
		
			 
            </div><!--secondary column-->			
			 
			 </ul>
            			
           </div><!--container div-->
          </div><!--wrap div-->

           <?php include("inc/footer.php"); ?>
