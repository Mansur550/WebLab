<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION["user"])) {
    header("Location: lab2/index.html");
    exit();
}

require_once 'database.php';
$user = $_SESSION["user"];

/* ── Handle profile photo upload ─────────────────────────────── */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['ProfilePhoto'])) {
    $targetDir = __DIR__ . "/ProfilePhoto/";
    $fileName = basename($_FILES["ProfilePhoto"]["name"]);
    $uniqueName = time() . "_" . $fileName;
    $targetFilePath = $targetDir . $uniqueName;
    $relativeFilePath = "ProfilePhoto/" . $uniqueName; // path stored in DB & used by <img>
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $allowed = ["jpg", "jpeg", "png"];
    if (in_array($fileType, $allowed)) {
        if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], $targetFilePath)) {
            /* ---- use procedural style prepare for max compatibility ---- */
            $stmt = mysqli_prepare($conn, "UPDATE user_info SET profile_photo = ? WHERE email = ?");

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $relativeFilePath, $user['email']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                // Update session variable
                $_SESSION['user']['profile_photo'] = $relativeFilePath;
                $user['profile_photo'] = $relativeFilePath;
                $uploadMsg = "Profile photo updated.";
            } else {
                $uploadMsg = "DB error: " . mysqli_error($conn);
            }
        } else {
            $uploadMsg = "Error uploading file.";
        }
    } else {
        $uploadMsg = "Only JPG, PNG, or GIF files allowed.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Profile</title>
<style>

    body{
        font-family:Arial,Helvetica,sans-serif;
        background:#f7f7f7;
        margin:0
    }

    .container{max-width:600px;
        margin:40px auto;
        background:#fff;
        padding:30px;
        border-radius:6px;
        box-shadow:0 2px 8px rgba(0,0,0,.1)
    }

    .user-info img{
        width:150px;
        height:150px;
        object-fit:cover;
        border-radius:100%;
        margin-bottom:15px;
        display:block
    }
    label{
        display:block;
        margin:12px 0 4px;
        font-weight:bold
    }
    input[type=file]{width:100%;
        padding:8px
    }
    button{
        margin-top:10px;
        padding:8px 16px;
        border:none;
        background:#4caf50;
        color:#fff;
        border-radius:4px;
        cursor:pointer}
    button:hover{
        background:#43a047}
    .msg{
        color:#2e7d32;
        margin-bottom:10px
        }
</style>
</head>
<body>
<div class="container">
    <h2><strong>Name:</strong> <?= htmlspecialchars($user['username']); ?></h2>

    <div class="user-info">
        <!-- Profile photo inside user-info -->
        <?php if (!empty($user['profile_photo'])): ?>
            <img src="<?= htmlspecialchars($user['profile_photo']); ?>" alt="Profile Photo">
        <?php else: ?>
            <p>No profile photo uploaded.</p>
        <?php endif; ?>

        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($user['address']); ?></p>
        <p><strong>ZIP:</strong> <?= htmlspecialchars($user['zip']); ?></p>
    </div>

    <?php if (isset($uploadMsg)) echo '<p class="msg">' . htmlspecialchars($uploadMsg) . '</p>'; ?>

    <form method="post" enctype="multipart/form-data">
        <label for="ProfilePhoto">Upload/Change Profile Photo:</label>
        <input type="file" name="ProfilePhoto" id="ProfilePhoto" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>
</div>
</body>
</html>
