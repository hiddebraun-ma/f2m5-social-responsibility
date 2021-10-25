<?php $this->layout('layouts::website');?>

<link rel="stylesheet" href="<?php echo site_url( '/css/aanmelden.css' ) ?>" media="all">
<?php if ( $this->section( 'css' ) ): ?>
		<?php echo $this->section( 'css' ) ?>
	<?php endif; ?>

	<div id="container">
        <form id="inlog" action ="<?php echo url("aanmelding.check")?>" method="POST" enctype="multipart/form-data">
            <h2>Aanmelden</h2>
        <!-- <input type = "text" name = "voornaam" placeholder = "First name" required>*<br><br>
        <input type = "text" name = "achternaam" placeholder = "Last name" required>*<br><br> -->
        <input class="form-control" type="email" name="email" placeholder="E-mail" value="<?php echo input('email')?>" required>*<br>
        <?php if (isset ($errors['email'] ) ): ?>
            <?php echo $errors['email']; ?>
        <?php endif;?></br>
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <?php if (isset ($errors['password'] ) ): ?>
            <?php echo $errors['password']; ?>
            <?php endif;?>
            *<br><br>
        <input type = "hidden" name = "code" value="L1GaCPLAC/qRRDod7Oo9OxahRcRIwI">
        <input type = "submit" value = "Sign up">
        <p>Already made an account? <a href="../index.html">Click here</a> to log in</p>
    </div>