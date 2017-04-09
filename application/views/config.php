<?php
    /*************************************************
     * Pangalingi näiteprogramm                      *
     * --------------------------------------------- *
     * (C) 2006-2011 Margus Kaidja (margus@zone.ee)  *
     *     Zone Media OÜ                             *
     * --------------------------------------------- *
     * Käesolev fail on UTF-8 kodeeringus            *
     *************************************************/

    if (!extension_loaded ("mbstring")) {
        trigger_error ("MBSTRING moodul peab olema laetud (http://ee.php.net/mbstring)");
    }

    /**
     * Pangaga suhtlemiseks vajalikud parameetrid
     *
     * NB! Kontrolli ükshaaval üle ja vajadusel seadista siin massiivis KÕIK väärtused.
     */
    $preferences = array(
        /* Sertifikaadipäringu loomisel saadud privaatvõtme fail */
        'my_private_key'    => 'my_private_key.pem',

        /* Juhul, kui privaatvõti on parooliga kaitstud, siis
         * peab ka parool alati siin kirjas olema */
        'my_private_key_password' => '',

        /* Panga poolt saadetud sertifikaat */
        'bank_certificate'  => 'bank_certificate.pem',

        /* Panga poolt saadetud kaupmehe identifikaator */
        'my_id'             => 'uid100010',

        /* Pangakonto number, kuhu maksed laekuma hakkavad */
        'account_number'    => 'EE871600161234567892',

        /* Pangakonto omaniku nimi (NB! peab olema UTF-8 kodeeringus) */
        'account_owner'     => 'Jooksupoiss OÜ',

        /**
         * Kasutatav pank. Üks järgmistest väärtustest:
         *  'swedbank', 'seb', 'sampo'
         */
        'bankname'          => 'test',
    );
    // --

    // Erinevate pankade pangalingi aadressid ja kodeeringud
    $banks = array(
        'swedbank' => array(
            'url' => 'https://www.swedbank.ee/banklink',
            'charset_parameter' => 'VK_ENCODING',
            'charset' => 'utf-8'
        ),
        'seb' => array(
            'url' => 'https://www.seb.ee/cgi-bin/unet3.sh/un3min.r',
            'charset_parameter' => 'VK_CHARSET',
            'charset' => 'utf-8'
        ),
        'sampo' => array(
            'url' => 'https://www2.sampopank.ee/ibank/pizza/pizza',
            'charset_parameter' => '',
            'charset' => 'iso-8859-1'
        ),

        'test' => array(
            'url' => 'http://localhost:8080/banklink/ipizza',
            'charset_parameter' => 'VK_CHARSET',
            'charset' => 'UTF-8'
        ),
    );

    $banklinkCharset = $banks[ $preferences['bankname'] ]['charset'];

    /**
     * Päringute/vastuste muutujate järjekorrad
     */
    $VK_variableOrder = array(
        1001 => array(
            'VK_SERVICE','VK_VERSION','VK_SND_ID',
            'VK_STAMP','VK_AMOUNT','VK_CURR',
            'VK_ACC','VK_NAME','VK_REF','VK_MSG'
        ),

        1101 => array(
            'VK_SERVICE','VK_VERSION','VK_SND_ID',
            'VK_REC_ID','VK_STAMP','VK_T_NO','VK_AMOUNT','VK_CURR',
            'VK_REC_ACC','VK_REC_NAME','VK_SND_ACC','VK_SND_NAME',
            'VK_REF','VK_MSG','VK_T_DATE'
        ),

        1901 => array(
            'VK_SERVICE','VK_VERSION','VK_SND_ID',
            'VK_REC_ID','VK_STAMP','VK_REF','VK_MSG'
        ),
    );

    /**
     * Genereerib sisseantud massiivi väärtustest jada.
     *
     * Jadasse lisatakse iga väärtuse pikkus (kolmekohalise arvuna)
     * ning selle järel väärtus ise.
     */
    function generateMACString ($macFields)
    {
        global  $VK_variableOrder,
                $banklinkCharset,
                $preferences;

        $requestNum = $macFields['VK_SERVICE'];

		$data = '';

		foreach ((array)$VK_variableOrder[$requestNum] as $key) {
		    $v = $macFields[$key];
		    $l = ($preferences['bankname'] == 'swedbank' ? mb_strlen ($v, $banklinkCharset) : strlen ($v));
			$data .= str_pad ($l, 3, '0', STR_PAD_LEFT) . $v;
		}

		return $data;
    }

    /**
     * Teisendab väärtuse UTF-8 kodeeringust pangalingi kodeeringusse.
     */
    function to_banklink_ch ($v)
    {
        global  $banklinkCharset;

        return mb_convert_encoding ($v, $banklinkCharset, 'utf-8');
    }

    /**
     * Teisendab väärtuse pangalingi kodeeringust UTF-8sse
     */
    function from_banklink_ch ($v)
    {
        global  $banklinkCharset;

        return mb_convert_encoding ($v, 'utf-8', $banklinkCharset);
    }
?>