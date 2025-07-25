<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location:../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if ($userdata['status'] == 0) {
    $status = '<b style="color:red"> Not Voted </b>';
} else {
    $status = '<b style="color:green"> Voted </b>';
}
?>
<html>
<head>
    <title>Online voting system-Registration</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
<style>
    #backbtn, #logoutbtn {
        padding: 10px;
        border-radius: 5px;
        background-color: #48dbfb;
        color: white;
        margin: 10px;
    }
    #backbtn {
        float: left;
    }
    #logoutbtn {
        float: right;
    }
    #Profile {
        background-color: white;
        width: 30%;
        padding: 20px;
        float: left;
    }
    #Group {
        background-color: white;
        width: 60%;
        padding: 20px;
        float: right;
    }
    #votebtn {
        padding: 10px;
        border-radius: 5px;
        background-color: #48dbfb;
        color: white;
        margin-top: 10px;
    }
    .groupCard {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #f9f9f9;
        clear: both;
    }
    .groupCard img {
        float: right;
        border-radius: 10px;
    }
    .groupCard b {
        display: block;
        margin-top: 5px;
    }
    #mainpannel {
        padding: 10px;
        overflow: auto;
    }
</style>

<div id="mainsection">
    <center>
        <div id="headerSection">
            <a href="../"><button id="backbtn">Back</button></a>
           <a href="logout.php"><button id="logoutbtn">Logout</button></a>

            <h1>Online Voting System</h1>
        </div>
    </center>
    <hr>

    <div id="mainpannel">
        <div id="Profile">
            <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"></center><br><br>
            <b>NAME:</b> <?php echo $userdata['name'] ?><br><br>
            <b>MOBILE:</b> <?php echo $userdata['mobile'] ?><br><br>
            <b>ADDRESS:</b> <?php echo $userdata['address'] ?><br><br>
            <b>STATUS:</b> <?php echo $status ?><br><br>
        </div>

        <div id="Group">
            <?php
            if ($groupsdata) {
                for ($i = 0; $i < count($groupsdata); $i++) {
                    ?>
                    <div class="groupCard">
                        <img src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="80" width="80">
                        <b>GROUP NAME:</b> <?php echo $groupsdata[$i]['name'] ?><br>
                        <b>VOTES:</b> <?php echo $groupsdata[$i]['votes'] ?><br>
                        <?php if ($userdata['status'] == 0) { ?>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                <input type="submit" value="VOTE" id="votebtn">
                            </form>
                        <?php } else { ?>
                            <b style="color:green;">Voted</b>
                        <?php } ?>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
