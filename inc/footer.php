<footer class="main-footer">
           <p>&copy; <?php 
		   $display_name = 'Weekend Warrior Basketball.';
                   $date = date('Y');
                   $copyright = $date." ".$display_name." All Rights Reserved.";  
		   
		   echo $copyright;
           echo "<br>";		   
           // outputs e.g. 'Last modified: March 04 1998 20:43:59.'
                           echo " Last modified: " . date ("F d Y H:i:s.", getlastmod());
                     ?>  
		   </p>

           </footer>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="interactive.js" type="text/javascript" charset="utf-8"></script>  
        </body>
</html>