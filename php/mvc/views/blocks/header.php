<nav class="header">
    <div class="nav-container-top">
        <div class="nav-home">
            <a href="/">Home</a>
        </div>
        <div class="center">     
            <?php
            if(isset($_SESSION["un"])){
            ?>
                <div>
                    <div class="dropdown">
                        <div class="dropbtn" style="display: flex; align-items: center;">
                            <div class="avatarWrapper" style="width:3rem;height:3rem;border-radius: 50%; overflow: hidden;">
                                <?php if($_SESSION["avatar"] != 0) {?>
                                    <img src="<?php echo $_SESSION["avatar"]; ?>">
                                <?php }else{ ?>
                                    <div class="no-image center">
                                        <svg style="width:2rem; height: 2rem;" enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="iconHeadshot"><g><circle cx="7.5" cy="4.5" fill="none" r="3.8" stroke-miterlimit="10"></circle><path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none" stroke-linecap="round" stroke-miterlimit="10"></path></g></svg>
                                    </div>
                                <?php }; ?>
                            </div>
                            <span style="margin-left: 1rem;"><?php echo ucfirst($_SESSION["un"]); ?></span>
                        </div>
                        <div class="dropdown-content">
                            <a href="/user/profile">Profile</a>
                            <a href="/signin/signout">Sign out</a>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="nav-user">
                    <a href="/signup">Sign Up</a>
                    <a href="/signin">Sign In</a>
                </div>
            <?php
            };
            ?>
            <a href="/cart" style="margin-left:3rem;">
                <svg viewBox="0 0 26.6 25.6" class="icon-cart" style="width:2.6rem; height:2.6rem; fill:#e27d0d; stroke:#e27d0d;"><polyline fill="none" points="2 1.7 5.5 1.7 9.6 18.3 21.2 18.3 24.6 6.1 7 6.1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2.5"></polyline><circle cx="10.7" cy="23" r="2.2" stroke="none"></circle><circle cx="19.7" cy="23" r="2.2" stroke="none"></circle></svg>
            </a>
        </div>
    </div>
</nav>
