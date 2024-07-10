<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupdata'];

$status = ($_SESSION['userdata']['status'] == 0) ? '<b style="color:red">Not Voted</b>' : '<b style="color:green">Voted</b>';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <!-- <link rel="stylesheet" href="../css/stylesheet.css"> -->
    <!-- Add any additional stylesheets or libraries for animations here -->
    <style>
        /* Reset some default styles for better cross-browser consistency */
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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        #mainsection {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }

        /* Add responsiveness with media queries */
        @media (max-width: 768px) {
            #Profile,
            #Group {
                width: 100%;
                float: none;
            }
        }

        /* Add a simple fade-in animation */
        #mainsection {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Add hover effect for buttons */
        #backbtn,
        #logoutbtn,
        #votebtn,
        #voted {
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #backbtn:hover,
        #logoutbtn:hover,
        #votebtn:hover {
            background-color: #2670B2;
        }

        #headerSection {
            background-color: #3498db;
            color: white;
            padding: 20px; /* Adjusted padding to match code2 */
            text-align: center;
            position: relative; /* Add position relative for button positioning */
            border-radius: 10px; /* Added border-radius */
        }

        h1 {
            margin: 0;
        }

        /* Enhance responsiveness for Profile and Group */
        #Profile,
        #Group {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease; /* Add transition for smooth effect */
        }

        /* Add more space between sections on small screens */
        @media (max-width: 768px) {
            #Profile,
            #Group {
                width: 100%;
                float: none;
                margin: 20px 0; /* Increase margin for more space */
            }
        }

        #Profile {
            width: 30%;
            float: left;
        }

        #Group {
            width: 63%;
            float: right;
        }

        /* Your existing styles here */
        #votebtn {
            padding: 5px;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            font-size: 15px;
        }

        #mainpanel {
            padding: 15px;
            transition: all 0.3s ease; /* Add transition for smooth effect */
        }

        #mainpanel:hover {
            background-color: #ecf0f3; /* Lighter background on hover for mainpanel */
            transform: scale(1.02); /* Scale effect on hover for mainpanel */
        }

        #voted {
            padding: 5px;
            border-radius: 5px;
            background-color: green;
            color: white;
            font-size: 15px;
        }

        /* Circular image style */
        img.circular {
            border-radius: 50%;
            overflow: hidden;
        }

        /* Position the buttons */
        #backbtn,
        #logoutbtn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%); /* Center vertically */
        }

        #backbtn {
            left: 20px;
        }

        #logoutbtn {
            right: 20px;
        }

        #backbtn,
        #logoutbtn {
            background-color: #2670B2;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #backbtn:hover,
        #logoutbtn:hover {
            background-color: #14558E;
        }

        /* Styling for Group members */
        #Group div {
            margin-bottom: 20px; /* Add space after each group member */
            border: 1px solid #ddd; /* Add a border for separation */
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease; /* Add transition for smooth effect */
        }

        #Group div:hover {
            background-color: #ecf0f3; /* Lighter background on hover for group member */
            transform: scale(1.02); /* Scale effect on hover for group member */
        }

        #Group img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <div id="mainsection">
        <div id="headerSection">
            <a href="../frontpage/index.html"><button id="backbtn">Back</button></a>
            <a href="logout.php"><button id="logoutbtn">Logout</button></a>
            <h1>Online Voting System</h1>
        </div>
        <hr>

        <div id="mainpanel">
            <div id="Profile">
                <center>
                    <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100" alt="Profile Photo" class="circular">
                </center><br><br>
                <b>Name: </b> <?php echo $userdata['name'] ?> <br><br>
                <b>Mobile: </b> <?php echo $userdata['mobile'] ?><br><br>
                <b>Address: </b> <?php echo $userdata['address'] ?> <br><br>
                <b>Status: </b> <?php echo $status ?> <br><br>
            </div>

            <div id="Group">
                <?php
                if (isset($_SESSION['groupdata']) && is_array($_SESSION['groupdata'])) {
                    foreach ($groupsdata as $group) {
                ?>
                        <div>
                            <img style="float: right" src="../uploads/<?php echo $group['photo'] ?>" alt="Group Photo" height="100" width="100">
                            <b>Group Name: </b> <?php echo $group['name'] ?><br><br>
                            <b>Votes: </b> <?php echo $group['votes'] ?><br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $group['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $group['id'] ?>">
                                <?php
                                if ($_SESSION['userdata']['status'] == 0) {
                                ?>
                                    <input type="submit" name="votebtn" id="votebtn" value="Vote">
                                <?php
                                } else {
                                ?>
                                    <button disabled id="voted" type="button" name="votebtn" value="Vote">Voted</button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                        <hr>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>


