<div class="container">
    <h2>Konto</h2>
    <h3>Tere tulemast <?php echo $user['name']; ?>!</h3>
    <div class="account-info">
        <p><b>Nimi: </b><?php echo $user['name']; ?></p>
        <p><b>Email: </b><?php echo $user['email']; ?></p>
        <p><b>Telefon: </b><?php echo $user['phone']; ?></p>
        <p><b>Sugu: </b><?php echo $user['gender']; ?></p>
		<p><b>Lisatud kuulutusi: </b><?php echo $offers['Count']; ?></p>
    </div>
</div>