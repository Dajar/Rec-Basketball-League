               <?php include("inc/header.php"); ?>
			   
                <div class="primary"> 
				<li>
				<?php
                   include("db.php"); 		   
				   
                   //Create Search Query to populate current league standings
				   
				   
                   $schedule = "SELECT *
                   FROM Scores, Teams
                   WHERE Teams.Team_ID = Scores.Team_ID 
				   GROUP BY Game_Number
				   ORDER BY Game_Date, Game_Time";
				   
                   $result_schedule = mysqli_query($cxn,$schedule)
                   or die ("Couldn't execute query.");
                   $nrows = mysqli_num_rows($result_schedule);

                   
                       echo "<h3 class='schedule' title='Schedule Image'>SCHEDULE</h3>";
                       echo "<table style='width: 100%';>\n";
                       echo "<tr>\n
                             <th style='width: 20%';>DATE</th>
                             <th style='width: 10%';>TIME</th>
                             <th style='width: 50%';>TEAM</th>
							 <th style='width: 20%';>SCORE</th>
                             </tr>\n";

                      for($i=0;$i<$nrows;$i++)
                      {
                          $n = $i + 1;
                          $row = mysqli_fetch_assoc($result_schedule);
                          extract($row);

                          $f_stats = number_format($Wins);
                          $f_stats2 = number_format($Losses);
                          $f_stats3 = number_format($Point_Diff);
						  $f_stats4 = number_format($Points_Scored);
						  $f_stats5 = number_format($Points_Allowed);
						  
                          if ($f_stats3 < 0) {
							  $class = 'pointRed';
						  }		
                          else {
							  $class = 'pointGreen';
						  }				  
			                     
                                             
                          echo "<tr class='big'>\n
						  <td>$Game_Date</td>\n
						  <td>$Game_Time</td>\n
                          <td class='alignL' style='width: 60%';>$Opponent vs. $Team_Name</td>\n
                          <td>$f_stats5 - $f_stats4</td>\n
                          </tr>\n
						  ";
                      }
                      
                      echo "</table>\n";
                       
                   ?>
				</li>
							  
                </div><!-- end primary column-->
				
            </ul>       
           </section>
          </div><!--container div-->
          </div><!--wrap div-->

          <?php include("inc/footer.php"); ?>
