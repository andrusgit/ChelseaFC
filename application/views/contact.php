		<!-- Contact & map etc-->
        <div class="container">
            <?php $xml=simplexml_load_file("kontakt.xml"); ?>  
            <h2><?php echo lang("CONTACT_PAGE_TITLE"); ?></h2>
            <strong><?php echo lang("CONTACT_PAGE_CNTCTUS") ?></strong> <br>
            
            <?php echo $xml->ETTEVÕTE[0]->NIMI ?> <br>
            <?php echo lang("CONTACT_PAGE_PHONE") . $xml->ETTEVÕTE[0]->TELEFON ?> <br>
            <?php echo "E-mail: " . $xml->ETTEVÕTE[0]->EMAIL ?> <br><br>
            
            <button type="button" class="btn btn-lg" onclick="loadXMLDoc(); "><?php echo lang("CONTACT_PAGE_WRTUS") ?></button>
		<br><br>
		<table id="demo" class="table table-striped"></table>
		
		
		   
            
            <strong><?php echo lang("CONTACT_PAGE_ADDRESS") ?></strong> <br>
            
            <?php echo $xml->AADRESS[0]->TÄNAV . " " . $xml->AADRESS[0]->MAJA . ", " . $xml->AADRESS[0]->LINN . " " . $xml->AADRESS[0]->POSTIINDEKS ?>
		
            <div id="googleMap" style="height:350px;"></div>
            <script src="/js/googleMap.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb38Ul4HJ-GAKgKCWoo492ASn6_A-lRX4&callback=myMap"></script>
            
            
            <?php
	
	    function getCurrentDate() {
		    $dt = new DateTime("now", new DateTimeZone('Europe/Helsinki'));
			return $dt->format('Y-m-d\TH:i:s\+0300');
		}	
	    require_once 'application/controllers/config.php';
	
	    /**
	     * Loome nĆ¤itliku ostukorvi ning nende vĆ¤Ć¤rtuste pĆµhjal loome
	     * vormi tehingu parameetritega.
	     *
	     * Ostukorvi sisu vĆµiks tegelikult tulla andmebaasist, kus vastava
	     * rea ID pannakse ka tehingu identifikaatoriks.
	     *
	     * NB! VĆ¤Ć¤rtused PEAVAD olema UTF-8 kodeeringus!
	     */
	    $shoppingCart = array(
	        /* Tehingu summa, mis klient tasuma peab */
	        'price'     => 5,
	
	        /* Valuuta, milles ta tasub */
	        'currency'  => 'EUR',
	
	        /* Teenuse/kauba kirjeldus */
	        'description' => 'Annetus',
	
	        /* Tehingu identifikaator - see on kaupmehe loodud unikaalne vĆ¤Ć¤rtus,
	         * millega kaupmees saab identifitseerida kĆ¤esoleva tehingu.
	         *
	         * Kuna tehingu saatmine panka ning pangast vastuse lugemine
	         * toimuvad tĆ¤iesti eraldiseisvate protsessidena, siis on pangast
	         * vastuse lugemise skriptis ID jĆ¤rgi konkreetset tehingut tuvastada.
	         */
	        'transaction_id' => rand(1000, 9999 ),
	    );
	    
	    
	
	    /**
	     * Loome massiivi tehingu andmetega, mis lĆ¤hevad panka
	     */
	    $fields = array(
	        'VK_SERVICE'    => '1011',
	        'VK_VERSION'    => '008',
	        'VK_SND_ID'     => to_banklink_ch ($preferences['my_id']),
	        'VK_STAMP'      => to_banklink_ch ($shoppingCart['transaction_id']),
	        'VK_AMOUNT'     => to_banklink_ch ($shoppingCart['price']),
	        'VK_CURR'       => to_banklink_ch ($shoppingCart['currency']),
	        'VK_ACC'        => to_banklink_ch ($preferences['account_number']),
	        'VK_NAME'       => to_banklink_ch ($preferences['account_owner']),
	        'VK_REF'        => '',
	        'VK_MSG'        => to_banklink_ch ($shoppingCart['description']),
	        'VK_RETURN'     => "http://chelseafc.cs.ut.ee/index.php/contact/success",
	        'VK_CANCEL'     => "http://chelseafc.cs.ut.ee/index.php/contact/failure",
	        "VK_DATETIME"    => getCurrentDate(),
        	"VK_ENCODING"    => "utf-8",
	    	);
		
		$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
		        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
		        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
		        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
		        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 0.05 */
		        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
		        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE871600161234567892 */
		        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* Ako TĆµnissoo */
		        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /*  */
		        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
		        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://chelseafc.cs.ut.ee/offers/received */
		        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /*  */
		        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2017-04-05T02:53:09+0300 */

	        
	    // Lisame charset parameetri juhul kui pank seda toetab
	    $p = $banks[$preferences['bankname']]['charset_parameter'];
	    if ($p != '') {
	        $fields[$p] = $banklinkCharset;
	    }
	
	    /**
	     * Genereerime tehingu vĆ¤Ć¤rtustest signatuuri
	     */
	    $key = openssl_pkey_get_private (
	        file_get_contents ($preferences['my_private_key']),
	        $preferences['my_private_key_password']
	    );
	
	    if (!openssl_sign ($data, $signature, $key)) {
        trigger_error ("Unable to generate signature", E_USER_ERROR);
    }
	    


		/* xZ1/Y/3uCgFyeKy4+8o6oMgd9f+iQq6v+4gnnSeouHKaEJ7vfkhK5N1AcYkj4+uiQSW/XAX/BC7E6VQdcu6ipE+Ty1dcN0VhBjpF0UZfYXpgBY41sMNgFg+R/ZRfp+VTGhfz8Ngr/vVVipbf+7wE4YVi0eoeKM+XT8QkVQJECzxlLfgvnGscc7CymP1ugGM9bTjr+pZq/7pMEeM6CMR5G4iqB5qxyjKknuQ8VOxoTPDtxcwxC87tY5JhfwzSOcOvPSKzi8bgoytrrDv6+74N7Xo9AekxXdbuNlYSxbXmP0E2xj4KhI3BpmxqMcFVjpDKrnSgbipmll70kqP3yFzs9g== */
		$fields["VK_MAC"] = base64_encode($signature);
	
	    /**
	     * Genereerime maksmise vormi
	     */
	    header ("Content-Type: text/html; charset=" . $banklinkCharset);
	?>
        <p><?php echo lang("CONTACT_BANK_PAGE_DESC") ?></p>

        <form method="post" action="http://localhost:8080/banklink/ipizza">
            <!-- include all values as hidden form fields -->
	<?php foreach($fields as $key => $val):?>
	            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
	<?php endforeach; ?>

            <!-- draw table output for demo -->
            

            <div class="form-group">
          <label for="PANGALINK_NAME"><?php echo lang('CONTACT_PAGE_BANK_NAME1') ?></label>
          <input type="text" name="PANGALINK_NAME" id="PANGALINK_NAME" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="PANGALINK_ACCOUNT"><?php echo lang('CONTACT_PAGE_BANK_ACC1') ?> </label>
          <input type="text" id="PANGALINK_ACCOUNT" class="form-control" name="PANGALINK_ACCOUNT" required>
        </div>
        
	

                <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
                <button type="submit" class="btn btn-lg" ><?php echo lang('CONTACT_PAGE_BANK_FWD') ?></button>

        </form>


        </div>
        