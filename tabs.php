<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script> 
<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>
<style>
   /* Example Styles for Demo */
   .etabs { margin: 0; padding: 0; }
   .tab { display: inline-block; zoom:1; *display:inline; background: #eee; border: solid 1px #999; border-bottom: none; -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; }
   .tab a { font-size: 14px; line-height: 2em; display: block; padding: 0 10px; outline: none; }
   .tab a:hover { text-decoration: underline; }
   .tab.active { background: #fff; padding-top: 6px; position: relative; top: 1px; border-color: #666; }
   .tab a.active { font-weight: bold; }
   .tab-container .panel-container { background: #fff; border: solid #666 1px; padding: 10px; -moz-border-radius: 0 4px 4px 4px; -webkit-border-radius: 0 4px 4px 4px; }
   .panel-container { margin-bottom: 10px; }
</style>
<script type="text/javascript">
   $(document).ready( function() {
     $('#tab-container').easytabs();
   });
</script>
<script type="text/javascript">
   $(document).ready( function() {
     $('#tab-container2').easytabs();
   });
</script>
<div id="tab-container2" class='tab-container'>
   <ul class='etabs'>
      <li class='tab'><a href="#recentactivities">Recent Activities</a></li>
      <li class='tab'><a href="#messages">Messages</a></li>
      <li class='tab'><a href="#notes">Notes</a></li>
   </ul>
   <div class='panel-container'>
      <div id="recentactivities">
         <?php 
            $recent=sitesettingsClass::gettenrecentActivitiesList();
            foreach($recent as $recentact)
            {
            ?>
         <?php echo $recentact->date_time."</br>";?>
         <?php echo $recentact->matter."</br>";?> 
         <?php 
            }
            ?>
      </div>
      <div id="messages">
         <?php 
            $recent=sitesettingsClass::gettenrecentActivitiesList();
            
            if($_SESSION['agent_id']!="")
            	{
            foreach($recent as $recentact)
            {
            	
   		
          if($recentact->order_number==$_GET['id']) {
            ?>
         <?php
            if($recentact->role=='agent')	
            { 
            
            echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	echo $recentact->matter."</br></br>";
         	}
            elseif($recentact->role=='op')
            {
            	
      		echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
         
            }
            elseif($recentact->role=='supervisor')
            {
            	
        	 echo $recentact->date_time."</br>";
         	echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
         
            }
            elseif($recentact->role=='admin')
            {
          	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
         
            }
            
         
            }
            }
            
            } 
            else if($_SESSION['op_id']!="")
            {
            foreach($recent as $recentact)
            {
            
            	
         	if($recentact->order_number==$_GET['id']) {
         
            if($recentact->role=='agent')	
            { 
           	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
			  }
            elseif($recentact->role=='op')
            {
            	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            elseif($recentact->role=='supervisor')
            {
            	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            elseif($recentact->role=='admin')
            {
             echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            
           
            }
            }
            
            } 
            else if($_SESSION['supervisor_id']!="")
            {
            foreach($recent as $recentact)
            {
            
            	
         	if($recentact->order_number==$_GET['id']) {
         
            if($recentact->role=='agent')	
            { 
           	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
			  }
            elseif($recentact->role=='op')
            {
            	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            elseif($recentact->role=='supervisor')
            {
            	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            elseif($recentact->role=='admin')
            {
             echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            
           
            }
            }
            
            } 
            else if($_SESSION['admin_id']!="")
            {
            foreach($recent as $recentact)
            {
            
            	
         	if($recentact->order_number==$_GET['id']) {
         
            if($recentact->role=='agent')	
            { 
           	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
			  }
            elseif($recentact->role=='op')
            {
            	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            elseif($recentact->role=='supervisor')
            {
            	 echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            elseif($recentact->role=='admin')
            {
             echo $recentact->date_time."</br>";
         	 echo $recentact->role."</br>";
          	 echo $recentact->matter."</br></br>";
            }
            
           
            }
            }
            
            } 
            
            ?>
      </div>
      <div id="notes">
         <textarea name="notes"><?php print $indivdata->notes;?></textarea>
      </div>
   </div>
</div>
</body>
</html>

