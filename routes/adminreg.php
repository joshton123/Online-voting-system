
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <style>
        body,
        div,
        h1,
        h2,
        h3,
        p,
        img,
        form,
        button {
            margin: 0;
            padding: 0;
            border: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #ecf0f3; /* Updated background color */
            margin: 0;
            padding: 0;
        }

        center {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        #headerSection,
        .headerSection {
            background-color: #3498db;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
            border-radius: 10px;
        }

        h1 {
            margin: 0;
        }

        #bodySection,
        #bodysection {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2,
        h3 {
            text-align: center;
            color: #3498db;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        form:hover {
            transform: scale(1.02);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        input[type="number"],
        input[type="password"],
        select,
        input[type="text"],
        input[type="file"] {
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            width: calc(100% - 24px);
            box-sizing: border-box;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            border: 1px solid #ccc;
        }

        input[type="number"]:focus,
        input[type="password"]:focus,
        select:focus,
        input[type="text"]:focus,
        input[type="file"]:focus {
            background-color: #f0f8ff; /* Light Blue */
            border-color: #3498db;
        }

        #imagepart,
        #role {
            text-align: left;
            width: 100%;
            padding: 10px 2px; /* Adjusted padding */
            transition: background-color 0.3s ease; /* Added transition for hover effect */
            border-radius: 5px; /* Added border-radius */
        }

        #imagepart:hover,
        #role:hover {
            background-color: #ecf0f3; /* Lighter background on hover */
        }

        #loginbtn,
        #btn {
            padding: 15px;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
            margin-top: 10px;
            border: none;
        }

        #loginbtn:hover,
        #btn:hover {
            background-color: #2670B2;
            transform: scale(1.05);
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
            display: block;
            margin-top: 20px;
        }

        a:hover {
            color: #14558E;
        }

        select,
        input[type="file"] {
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        select:focus,
        input[type="file"]:focus {
            border-color: #3498db;
        }

        /* Adjusted font size for drop-down options*/
        select#dropbox option {
            font-size: 16px;
        } 
    </style>
</head>
<body>
    <center>
        <div class="headerSection">
            <h1>Online Voting System</h1>
        </div>
        <hr>

        <div id="bodySection">
            <form action="../api/login1.php" method="post">
                <h2>Login</h2>
                <input type="text" name="admin" placeholder="Enter admin-id" id="admin"><br><br>
                <input type="password" name="password" placeholder="Enter password" id="password"><br><br>
                <select name="role" id="dropbox">
                    <option value="1">Admin</option> <!-- Added Admin option -->
                </select>
                <br><br>
                <button id="loginbtn">Login</button><br><br>
            </form>
        </div>
    </center>
</body>
</html>
