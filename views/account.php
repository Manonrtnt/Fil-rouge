<?php include('header.php'); ?>
    <!-- Section -->
    <main class="container rounded p-2 my-2 shadow-sm">
        <section class="row justify-content-evenly py-3">
            <div class="col-11 col-md-5 bg-white p-2 p-md-4 rounded-3">
                <h2>Change your account</h2>
                <div class="py-3">
                    <h3 class="h4">Change your login : </h3>
                    <form action="" method="post" id="changeLogin">
                    <div class="pb-2">
                        <label for="login_user">Login</label>
                        <input type="text" name="login_user">
                    </div>
                    <div class="pb-2">
                        <label for="email_user">Email</label>
                        <input type="text" name="email_user">
                    </div>
                    <div class="pb-3">
                        <label for="newLogin_user">New login</label>
                        <input type="text" name="newLogin_user">
                    </div>
                        <button class="button" type="submit" value="Change">Change</button>
                    </form>
                </div>
                <div class="py-3">
                    <h3 class="h4">Change your password : </h3>
                    <form action="" method="POST" id="changePassword">
                        <div class="pb-2">
                            <label for="password">New password</label>
                            <input type="password" name="changePassword">
                        </div>
                        <div class="pb-3">
                            <label for="password">Confirm password</label>
                            <input type="password" name="changeConfPassword">
                        </div>
                        <button class="button" type="submit" value="Change">Change</button>
                    </form>
                </div>
            </div>

            <div class="col-11 col-md-5 m-3 m-md-0 bg-white p-2 p-md-4 rounded-3">
                <h2>Delete your account</h2>
                <p>If you want to delete your account, please enter your login, password and click on this delete button.</p>
                <form action="POST" id="deleteForm">
                    <div class="pb-3">
                        <label for="login_user">Login</label>
                        <input type="text" name="login_user">
                    </div>
                    <button class="button" type="submit" value="delete">Delete</button>
                </form>
            </div>
        </section>
    </main>

    <!--* Script JS -->
    <script type="text/javascript" src="../script/change_login.js" ></script>
    <script type="text/javascript" src="../script/delete_account.js" ></script>

<?php include('footer.php'); ?>