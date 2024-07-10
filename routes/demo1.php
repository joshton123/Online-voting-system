
<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupdata'];

$status = ($_SESSION['userdata']['status'] == 0) ? '<b style="color:red">Not Voted</b>' : '<b style="color:green">Voted</b>';

// Determine the winner and their votes
$winner = null;
$maxVotes = 0;

foreach ($groupsdata as $group) {
    if ($group['votes'] > $maxVotes) {
        $maxVotes = $group['votes'];
        $winner = $group;
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <style>
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

        @media (max-width: 768px) {
            #Profile,
            #Group {
                width: 100%;
                float: none;
            }
        }

        #mainsection {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

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
            padding: 20px;
            text-align: center;
            position: relative;
            border-radius: 10px;
        }

        h1 {
            margin: 0;
        }

        #Profile,
        #Group {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            #Profile,
            #Group {
                width: 100%;
                float: none;
                margin: 20px 0;
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

        #votebtn {
            padding: 5px;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            font-size: 15px;
        }

        #mainpanel {
            padding: 15px;
            transition: all 0.3s ease;
        }

        #mainpanel:hover {
            background-color: #ecf0f3;
            transform: scale(1.02);
        }

        #voted {
            padding: 5px;
            border-radius: 5px;
            background-color: green;
            color: white;
            font-size: 15px;
        }

        img.circular {
            border-radius: 50%;
            overflow: hidden;
        }

        #backbtn,
        #logoutbtn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
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

        #Group div {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        #Group div:hover {
            background-color: #ecf0f3;
            transform: scale(1.02);
        }

        #Group img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 15px;
        }

        #Winner {
            width: 30%;
            float: right;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        #Winner h2 {
            margin: 0;
            color: #3498db;
        }

        #Winner b {
            color: #333;
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
            <div id="Group">
                <?php
                if (isset($_SESSION['groupdata']) && is_array($_SESSION['groupdata'])) {
                    foreach ($groupsdata as $group) {
                ?>
                        <div>
                            <img style="float: right" src="../uploads/<?php echo $group['photo'] ?>" alt="Group Photo" height="100" width="100">
                            <b>Group Name: </b> <?php echo $group['name'] ?><br><br>
                            <b>Votes: </b> <?php echo $group['votes'] ?><br><br>
                        </div>
                        <hr>
                <?php
                    }
                }
                ?>
            </div>

            <!-- New Winner Section -->
            <div id="Winner">
                <h2>Winner</h2>
                <?php
                if ($winner) {
                ?>
                    <b>Group Name: </b> <?php echo $winner['name'] ?><br><br>
                    <b>Votes: </b> <?php echo $winner['votes'] ?><br><br>
                <?php
                } else {
                ?>
                    <p>No winner yet.</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>




