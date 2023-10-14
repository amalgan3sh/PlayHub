<html>
    <head>
        <title>Book my turf - HOME</title>
    </head>
    <body>
        <h1>User register here</h1>
        <form action="<?php echo site_url(); ?>/Onlinecontroller/userRegistration" method="post">
            <table>
                <tr>
                    <th>First Name</th>
                    <td><input type="text" name="first_name"></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" name="last_name"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><input type="phone" name="phone"></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input type="text" name="location"></td>
                </tr>
                <tr>
                    <th>Pincode</th>
                    <td><input type="text" name="pincode"></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="text" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>