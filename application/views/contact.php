		<!-- Contact & map etc-->
        <div class="container">
            <h2><?php echo lang("CONTACT_PAGE_TITLE"); ?></h2>
                       
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><?php echo lang("SIGN_UP_FORM_NAME"); ?></th>
<<<<<<< HEAD
				  <th><?php echo lang("SIGN_UP_FORM_PHONE"); ?></th>
=======
                  <th><?php echo lang("SIGN_UP_FORM_PHONE"); ?></th>
>>>>>>> 5bffd9b1a13eeeff9b0c28f83b20290f73985e6b
                  <th><?php echo lang("SIGN_UP_FORM_EMAIL"); ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Andrus Lall</td>
                  <td>5581148</td>
                  <td>andruslall@outlook.com</td>
                </tr>
                <tr>
                  <td>Toomas Veromann</td>
                  <td>58228076</td>
                  <td>toomasveromann@gmail.com</td>
                </tr>
                <tr>
                  <td>Ako Tõnissoo</td>
                  <td>53533329</td>
                  <td>ako.tonissoo@gmail.com</td>
                </tr>
              </tbody>
            </table>
            
            <div id="googleMap" style="height:350px;"></div>
            <script src="/js/googleMap.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb38Ul4HJ-GAKgKCWoo492ASn6_A-lRX4&callback=myMap"></script>
            
            <form action="feedback.php" method="POST">
            	            	
                <br>
		<h3><?php echo lang("CONTACT_PAGE_FEEDBACK_TITLE"); ?></h3><textarea name="message" rows="6" cols="100"></textarea><br />
		<input type="submit" value="<?php echo lang("CONTACT_PAGE_FEEDBACK_SEND"); ?>" onclick="showXMLfeedback()"><input type="reset" value="<?php echo lang("CONTACT_PAGE_FEEDBACK_RESET"); ?>">
	     </form>
        </div>
        