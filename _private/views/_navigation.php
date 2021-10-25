<ul>
    <li>
        <a href="<?php echo url( 'home' ) ?>"<?php if ( current_route_is( 'home' ) ): ?> class="active"<?php endif ?>>Home</a>
    </li>
    <li>
        <a href="<?php echo url( 'aanmelden' ) ?>"<?php if ( current_route_is( 'aanmelding' ) ): ?> class="active"<?php endif ?>>Aanmelden</a>
    </li>
    <?php if( ! isLoggedIn()):?>
    <li>
        <a href="<?php echo url( 'login.form' ) ?>"<?php if ( current_route_is( 'login.form' ) ): ?> class="active"<?php endif ?>>Login</a>
    </li>
        <?php else: ?>
        <li>
            <a href="<?php echo url( 'logout' ) ?>">Logout</a>
        </li>
        <?php endif;?>

    <?php if(isLoggedIn()): ?>
        <?php echo getLoggedInUserEmail();?>
    <?php endif; ?>
    

</ul>