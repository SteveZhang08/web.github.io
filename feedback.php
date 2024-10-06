<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>漳州三中 2024级3班 事务反馈页面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>反馈表单</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">姓名 (选填):</label>
            <input type="text" id="name" name="name">

            <label for="email">电子邮箱 (选填):</label>
            <input type="email" id="email" name="email">

            <label for="feedback">反馈内容: (对班级班干部的意见，或对同学行为的不满等，恕不接受对老师的意见 awa)</label>
            <textarea id="feedback" name="feedback" required></textarea>

            <label>
                <input type="checkbox" name="anonymous" value="yes"> 匿名提交
            </label>

            <input type="submit" value="提交反馈">
        </form>
    </div>

    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/vdb1/wwwroot/world.our-soviet.cn/feedback/PHPMailer/src/Exception.php';
require '/vdb1/wwwroot/world.our-soviet.cn/feedback/PHPMailer/src/PHPMailer.php';
require '/vdb1/wwwroot/world.our-soviet.cn/feedback/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "匿名";
    $email = isset($_POST['email']) ? $_POST['email'] : "未提供";
    $feedback = $_POST['feedback'];
    $anonymous = isset($_POST['anonymous']) ? "是" : "否";

    if ($anonymous == "是") {
        $name = "匿名用户";
        $email = "未提供";
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        
        $mail->CharSet='UTF-8';
        $mail->isSMTP();
        $mail->Host       = 'smtp.qq.com';  // 替换为您的SMTP服务器
        $mail->SMTPAuth   = true;
        $mail->Username   = '1715149267@qq.com';     // 替换为您的SMTP用户名
        $mail->Password   = 'cvarkgkeiyumehec';     // 替换为您的SMTP密码
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('1715149267@qq.com', 'Mailer');
        $mail->addAddress('SteveZhang05962022@outlook.com');

        // Content
        $mail->isHTML(true);       
        $mail->Subject = "新的反馈意见" . base64_encode($title) . "?=";
        $mail->Body    = "
            <h1>新的反馈意见</h1>
            <p><strong>姓名:</strong> $name</p>
            <p><strong>电子邮箱:</strong> $email</p>
            <p><strong>是否匿名:</strong> $anonymous</p>
            <p><strong>反馈内容:</strong></p>
            <p>$feedback</p>
        ";

        $mail->send();
        echo "<p>感谢您的反馈！我们已经收到您的信息。</p>";
    } catch (Exception $e) {
        echo "<p>抱歉，发送反馈时出现错误。错误信息: {$mail->ErrorInfo}</p>";
        // 记录错误到日志文件
        error_log("邮件发送失败: {$mail->ErrorInfo}", 0);
    }
}
?>

</body>
</html>