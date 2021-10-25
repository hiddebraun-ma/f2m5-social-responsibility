<?php $this->layout('layouts::website');?>

<h2>Login</h2>

<form id="inlog" action = "<?php echo url('login.handle')?>" method="POST">
           <p> E-mail</p>
           <input class="form-control" type="email" name="email" placeholder="E-mail" value="<?php echo input('email')?>" required>*<br>
           <?php if (isset ($errors['email'] ) ): ?>
            <?php echo $errors['email']; ?>
            <?php endif;?></br>
           <p> Wachtwoord</p>
           <input class="form-control" type="password" name="password" placeholder="Password" required>
            <?php if (isset ($errors['password'] ) ): ?>
            <?php echo $errors['password']; ?>
            <?php endif;?>
            <br><br>
            <input class="submit" type ="submit" value = "Inloggen!">
 </form>