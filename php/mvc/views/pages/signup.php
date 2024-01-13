<main>
    <form class="form" action="/signup/submitForm" method="POST" onsubmit="return(up.validateForm(event));">
        <h3 class="form-title">Sign Up Form</h3>
        <?php
        if($data['error'] != '') {
        ?>
        <div class="pd1" style="background-color: yellow; color:red;"><?php echo $data['error'] ?></div>
        <?php    
        }
        ?>
        <div class="form-group">
            <label class="label" for="userName">User Name</label>
            <input class="input" id="userName" name="userName" type="text" onblur="up.validate(this);">
            <span class="span"></span>
        </div>
        <div class="form-group">
            <label class="label" for="email">Email</label>
            <input class="input" id="email" name="email" type="text" onblur="up.validateEmail(this);">
            <span class="span"></span>
        </div>
        <div class="form-group">
            <label class="label" for="phone">Phone number</label>
            <input class="input" id="phone" name="phone">
            <span class="span"></span>
        </div>
        <div class="form-group">
            <label class="label" for="password">Password</label>
            <input class="input" id="password" name="password" type="password">
            <span class="span"></span>
        </div>
        <div style="margin-top:3rem; text-align:center; font-size:1.3rem">
            <span>Do you have already an account?</span>
            <a href="/signin" style="color:red;">Sign In</a>
        </div>
        <button class="btn" type="submit" name="submit">Send</button>
    </form>
</main>
