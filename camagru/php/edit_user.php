<div id="edit" class="logout">
    <div class="animate undercam posCam" style="background-color:white;padding:10px;height:auto;">
        <div style="position:relative;">
            <span class="close" onclick="document.getElementById('edit').style.display='none'">&times;</span>
            <form method="POST" action="../php/new_user.php">
            <h2>Sign Up</h2>
            <label class="log" for="nuser"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="nuser" required>
            <label class="log" for="fname"><b>First Names</b></label>
            <input type="text" placeholder="Enter Username" name="fname" required>
            <label class="log" for="lname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Username" name="lname" required>
            <label class="log" for="email"><b>Email Adress</b></label>
            <input type="email" placeholder="Enter Email Address" name="email" required>
            <label class="log" for="passwd"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name=passwd required>
            <label class="log" for="npass"><b>Re-enter Password</b></label>
            <input type="password" placeholder="Enter Password" name="npass" required>
            <button type="submit">Sign Up</button>
        </form>
        </div>
    </div>
</div>