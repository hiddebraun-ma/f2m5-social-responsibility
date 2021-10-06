<?php $this->layout('layouts::website');?>



        <form id="inlog" action ="<?php echo url('aanmelding.check'); ?>" method="POST" enctype="multipart/form-data">
            <h2>Profile picture</h2>
        <input  type="file" name="image" accept="image/*" /><br><br>
        <input type = "text" name = "username" placeholder = "Username" required>*<br><br>
        <input type = "password" name = "password1" placeholder = "Password" required>*<br><br>
        <input type= "password" name="password2" placeholder = "Repeat password" required>*<br><br>
        <input type = "text" name = "voornaam" placeholder = "First name" required>*<br><br>
        <input type = "text" name = "achternaam" placeholder = "Last name" required>*<br><br>
        <input type = "email" name = "email" placeholder = "E-mail" required>*<br><br>
        <input type = "hidden" name = "code" value="L1GaCPLAC/qRRDod7Oo9OxahRcRIwI">
        <input type = "submit" value = "Sign up">
        <p>Already made an account? <a href="../index.html">Click here</a> to log in</p>