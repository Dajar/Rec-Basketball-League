              		   
<?php
			   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$firstName = trim($_POST["user_firstName"]);
                $lastName = trim($_POST["user_lastName"]);
                $email = trim($_POST["user_email"]);
                $phone = trim($_POST["user_phone"]);
                $freeAgent = trim($_POST["user_freeAgent"]);
                $position = trim($_POST["user_position"]);
                $comments = trim($_POST["user_comments"]);
				
				if ($firstName == "" || $lastName == "" || $email == "" || $phone == "" || $freeAgent == "" || $position == "" || $comments == "") {
					echo "All fields must be filled in to proceed.";
					exit;
				}
				

                echo "<pre>";
                $email_body = "";
                $email_body .= "First Name: ". $firstName . "\n";
                $email_body .=  "Last Name: ". $lastName . "\n";
                $email_body .=  "Email: ". $email . "\n"; 
                $email_body .=  "Phone: ". $phone . "\n";
                $email_body .=  "Free Agent: ". $freeAgent . "\n";
                $email_body .=  "Position: ". $position . "\n";
                $email_body .=  "Comments: ". $comments;
                echo $email_body;
                echo "</pre>";
				
				
				//To Do: Send Email
                header("location:signup.php?status=thankyou");
}
			   
			   $pageTitle = "Thank You";
               $section = null;
				include("inc/header.php"); ?>
				
				<div class="primary"> 
				<h3>League Sign Up Form</h3>
				<?php if  (isset($_GET["status"]) && $_GET["status"] == "thankyou") {
					echo "<p>Thanks for signing up.  You should receive an email shortly with League Information.</p>";
				} else { ?>
								
				<!--<div>
				<p>- Start Date: Wednesday,  January 11 2017<br>
				- $729/per team<br>
				- 6-game Season + Playoffs (Single Elimination)<br>
				- Player and Team Stats updated online<br>
				- Awards: MVP, Defensive Player of the Season, All-League Teams, Customized Team/Player Championship T-Shirts<br>
				- TSAA Certified Officials</p>			
				</div>-->
				<br>
							
				<form action="signup.php" id="signUpForm" method="post">
				  <label for="firstName">First Name:</label>
				  <input type="text" id="firstName" name="user_firstName">
				  <br>
				  <label for="lastName">Last Name:</label>
				  <input type="text" id="lastName" name="user_lastName">
				  <br>
				  
				  <label for="email">Email Address:</label>
				  <input type="email" id="email" name="user_email">
				  <br>
				  <label for="phone">Phone:</label>
				  <input type="text" id="phone" name="user_phone">
				  <br>
				  
				  <label>Free Agent:</label><br>
				  <input type="radio" id="yes" value="yes" name="user_freeAgent">
				  <label for="yes">Yes</label><br>
				  <input type="radio" id="no" value="no" name="user_freeAgent">
				  <label for="no">No</label>
				  

				  <br>
				  <br>
				  <label for="position">What position do you play:</label>
				  <br>
				  <select id="position" name="user_position">
				   <optgroup label="Backcourt">
				    <option value="">Select a Position</option>
				    <option value="point_guard">Point Guard</option>
					<option value="shooting_guard">Shooting Guard</option>
					<option value="combo_guard">Combo Guard</option>
				   </optgroup>
				   <optgroup label="Frontcourt">
					<option value="small_forward">Small Forward</option>
					<option value="power_forward">Power Forward</option>
					<option value="center">Center</option>
				   </optgroup>
				  </select>
				  <br>
				  
				  <br>
				  <label for="comments">Comments:</label>
				  <textarea placeholder="We appreciate your feedback. Thank you."  rows="5" id="comments" name="user_comments"></textarea>
				  <br>
				  <button class="formButton" type="submit">SIGN UP</button>
				</form>
				<?php } ?>
				</div>	
				
                </div><!-- end primary column-->
				
            
          </div><!--container div-->
          </div><!--wrap div-->

           <?php include("inc/footer.php"); ?>
