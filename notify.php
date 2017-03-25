<?php
    /*************************************************
     * Pangalingi näiteprogramm                      *
     * --------------------------------------------- *
     * (C) 2006-2011 Margus Kaidja (margus@zone.ee)  *
     *     Zone Media OÜ                             *
     * --------------------------------------------- *
     * Käesolev fail on UTF-8 kodeeringus            *
     *************************************************/

    require_once 'config.php';

    /**
     * Koostame VK_* muutujatest massiivi
     */
    $macFields = array ();

    foreach ((array)$_REQUEST as $f => $v) {
        if (substr ($f, 0, 3) == 'VK_') {
            $macFields[$f] = $v;
        }
    }

    // Kontrollime andmete charset parameetrit juhul kui pank selle saadab
    $p = $banks[ $preferences['bankname'] ]['charset_parameter'];

    $banklinkCharset = '';

    if ($p != '') {
        $banklinkCharset = $macFields[$p];
    }

    if ($banklinkCharset == '') {
        $banklinkCharset = 'iso-8859-1';
    }

    /**
     * Kontrollime väärtusi, mis pangast tulid.
     * Selleks arvutame nende väärtuste põhjal signatuuri ning
     * võrdleme seda selle signatuuriga, mis pank koos väärtustega meile saatis.
     */
    $key = openssl_pkey_get_public (file_get_contents ($preferences['bank_certificate']));

    if (!openssl_verify (generateMACString ($macFields), base64_decode ($macFields['VK_MAC']), $key)) {
        trigger_error ("Invalid signature", E_USER_ERROR);
    }

    header ("Content-Type: text/html; charset=utf-8");

    /**
     * Teavitame tehingu sooritajat tehingu õnnestumisest või ebaõnnestumisest
     */
    if ($macFields['VK_SERVICE'] == '1901') {

        echo '<h2><font color="red">Makse sooritamine katkestati!</font></h2>' . "\n";
?>
<table cellpadding="0" cellspacing="0" border="2">
    <tr>
        <td>Katkestatud tehingu ID:</td>
        <td><?php echo htmlspecialchars (from_banklink_ch ($macFields['VK_STAMP'])); ?></td>
    </tr>
</table>

<?php
    } else if ($macFields['VK_SERVICE'] == '1101') {

        if (from_banklink_ch ($macFields['VK_REC_ID']) != $preferences['my_id']) {
            echo '<h2><font color="red">Pank tagastas tehingu tundmatu kaupmehe ID-ga!</font></h2>' . "\n";
?>

<table cellpadding="0" cellspacing="0" border="2">
    <tr>
        <td>Tehingu ID:</td>
        <td><?php echo htmlspecialchars (from_banklink_ch ($macFields['VK_STAMP'])); ?></td>
    </tr>

    <tr>
        <td>Panga saadetud kaupmehe ID:</td>
        <td><?php echo htmlspecialchars (from_banklink_ch ($macFields['VK_SND_ID'])); ?></td>
    </tr>

    <tr>
        <td>Minu kaupmehe ID:</td>
        <td><?php echo htmlspecialchars ($preferences['my_id']); ?></td>
    </tr>
</table>
<?php
        } else {
            echo '<h2><font color="green">Makse sooritamine õnnestus!</font></h2>' . "\n";
?>
<table cellpadding="0" cellspacing="0" border="2">
    <tr>
        <td>Maksja:</td>
        <td><?php echo htmlspecialchars (from_banklink_ch ($macFields['VK_SND_NAME'] . ' (' . $macFields['VK_SND_ACC'] .')')); ?></td>
    </tr>

    <tr>
        <td>Maksekorralduse number:</td>
        <td><?php echo htmlspecialchars (from_banklink_ch ($macFields['VK_T_NO'])); ?></td>
    </tr>

    <tr>
        <td>Summa:</td>
        <td><?php echo htmlspecialchars (from_banklink_ch ($macFields['VK_AMOUNT'] . ' ' . $macFields['VK_CURR'])); ?></td>
    </tr>

    <tr>
        <td>Teade:</td>
        <td><?php echo htmlspecialchars (from_banklink_ch ($macFields['VK_MSG'])); ?></td>
    </tr>

    <tr>
        <td>Tehingu identifikaator:</td>
        <td><?php echo htmlspecialchars (from_banklink_ch ($macFields['VK_STAMP'])); ?></td>
    </tr>
</table>
<?php
        }
    } else {
        echo '<h2><font color="red">Tundmatu vastus: <b>' . $macFields['VK_SERVICE']  . '</b>!</font></h2>' . "\n";
    }
?>