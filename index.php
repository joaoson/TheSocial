<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>TheSocial</title>
</head>
<body>
    <header>
        <h1>TheSocial</h1>
        <div>
            <h3>Already have an account?</h3>
            <form action="login_php.php" method="post">
                <input name="emailLogin" type="text" placeholder="Email">
                <input name="passwordLogin" type="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
    </header>
    <main>
        <section id="leftPanel">
            <h2>Connect with people all around the globe</h2>
            <h3>Share all your thoughts on the latest news.</h3>
            <img src="./social-network-connecting-people-line-icon_116137-6483.avif" alt="">
        </section>
        <section id="rightPanel">
            <div class="forms">
                <h2>Sign up</h2>
                <h3>Quick and easy setup to get started</h3>
                <form id="form" action="signup_php.php" method="post">
                    <div>
                        <label for="name">Full Name:</label>
                        <input name="name" id="name" type="text">
                    </div>
                    <div>
                        <label for="email">Your Email:</label>
                        <input name="email" id="email" type="text">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input name="password" id="password" type="password">
                    </div>
                    <div>
                        <label for="gender">I am a:</label>
                        <select name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="PNTS">Prefer not to say</option>
                        </select>
                    </div>
                    <div>
                        <label for="date">Date of Birth:</label>
                        <input name="date" id="date" type="date">
                    </div>
                    <button type="submit">Sign Up</button>

                </form>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>