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
     * Loome näitliku ostukorvi ning nende väärtuste põhjal loome
     * vormi tehingu parameetritega.
     *
     * Ostukorvi sisu võiks tegelikult tulla andmebaasist, kus vastava
     * rea ID pannakse ka tehingu identifikaatoriks.
     *
     * NB! Väärtused PEAVAD olema UTF-8 kodeeringus!
     */
    $shoppingCart = array(
        /* Tehingu summa, mis klient tasuma peab */
        'price'     => 0.05,

        /* Valuuta, milles ta tasub */
        'currency'  => 'EUR',

        /* Teenuse/kauba kirjeldus */
        'description' => 'Torso Tiger',

        /* Tehingu identifikaator - see on kaupmehe loodud unikaalne väärtus,
         * millega kaupmees saab identifitseerida käesoleva tehingu.
         *
         * Kuna tehingu saatmine panka ning pangast vastuse lugemine
         * toimuvad täiesti eraldiseisvate protsessidena, siis on pangast
         * vastuse lugemise skriptis ID järgi konkreetset tehingut tuvastada.
         */
        'transaction_id' => 12345,
    );

    /**
     * Loome massiivi tehingu andmetega, mis lähevad panka
     */
    $macFields = array(
        'VK_SERVICE'    => '1001',
        'VK_VERSION'    => '008',
        'VK_SND_ID'     => to_banklink_ch ($preferences['my_id']),
        'VK_STAMP'      => to_banklink_ch ($shoppingCart['transaction_id']),
        'VK_AMOUNT'     => to_banklink_ch ($shoppingCart['price']),
        'VK_CURR'       => to_banklink_ch ($shoppingCart['currency']),
        'VK_ACC'        => to_banklink_ch ($preferences['account_number']),
        'VK_NAME'       => to_banklink_ch ($preferences['account_owner']),
        'VK_REF'        => '',
        'VK_MSG'        => to_banklink_ch ($shoppingCart['description']),
        'VK_RETURN'     => to_banklink_ch ('http' . ($_SERVER['HTTPS'] ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] .
                                            dirname ($_SERVER['PHP_SELF']) . '/notify.php'),
    );

    // Lisame charset parameetri juhul kui pank seda toetab
    $p = $banks[$preferences['bankname']]['charset_parameter'];
    if ($p != '') {
        $macFields[$p] = $banklinkCharset;
    }

    /**
     * Genereerime tehingu väärtustest signatuuri
     */
    $key = openssl_pkey_get_private (
        file_get_contents ($preferences['my_private_key']),
        $preferences['my_private_key_password']
    );

    if (!openssl_sign (generateMACString ($macFields), $signature, $key)) {
        trigger_error ("Unable to generate signature", E_USER_ERROR);
    }

    $macFields['VK_MAC'] = base64_encode ($signature);

    /**
     * Genereerime maksmise vormi
     */
    header ("Content-Type: text/html; charset=" . $banklinkCharset);
?>
<form method="POST" action="<?php echo $banks[ $preferences['bankname'] ]['url']; ?>">
<?php
    foreach ($macFields as $f => $v) {
        echo '<input type="hidden" name="' . $f . '" value="' . htmlspecialchars ($v) . '" />' . "\n";
    }
?>
<table cellpadding="0" cellspacing="0" border="2">
    <tr>
        <th colspan="2">Makse päringu info</th>
    </tr>

    <tr>
        <td>Summa:</td>
        <td><?php echo htmlspecialchars (to_banklink_ch ($shoppingCart['price'] . ' ' . $shoppingCart['currency'])); ?>
    </tr>

    <tr>
        <td>Kellele:</td>
        <td><?php echo htmlspecialchars (to_banklink_ch ($preferences['account_owner'])) . ' (' . htmlspecialchars (to_banklink_ch ($preferences['account_number'])) . ')'; ?>
    </tr>

    <tr>
        <td>Mille eest:</td>
        <td><?php echo htmlspecialchars (to_banklink_ch ($shoppingCart['description'])); ?></td>
    </tr>

    <tr>
        <td>Tehingu ID:</td>
        <td><?php echo htmlspecialchars (to_banklink_ch ($shoppingCart['transaction_id'])); ?></td>
    </tr>


    <tr>
        <th colspan="2">Maksevormi seaded</th>
    </tr>

    <tr>
        <td>Maksja nimi:</td>
        <td><input type="text" name="PANGALINK_NAME" /></td>
    </tr>

    <tr>
        <td>Maksja konto:</td>
        <td><input type="text" name="PANGALINK_ACCOUNT" /></td>
    </tr>
    <tr>
        <td>Automaatmakse:</td>
        <td>
            <select name="PANGALINK_AUTOPAY">
                <option value="">Ei</option>
                <option value="accept">Jah, teosta makse</option>
                <option value="cancel">Jah, katkesta makse</option>
                <option value="reject">Jah, l&uuml;kka tagasi</option>
            </select>
        </td>
    </tr>

    <tr>
        <td colspan="2" align="center"><input type="submit" value="MAKSMA" /></td>
    </tr>
</table>
</form>