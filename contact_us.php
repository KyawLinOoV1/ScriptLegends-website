<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Contact Us Page | ScriptLegends </title>
  <link rel="stylesheet" href="css/contact.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-two">He He</div>
        </div>

        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">scriptlegends89@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Sent Message to owner</div>
        <p style="color:black;">If you have any business for me or suggestion or feedback for this website, you can
          contact us directly at my phone number 09751433521 or my gmail scriptlegends89@gmail.com.</p>
        <form action="save_message.php" method="post">
          <div class="input-box">
            <input type="text" name="name" placeholder="Name" required>
          </div>
          <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
          </div>
          <div class="input-box message-box">
            <textarea name="message" placeholder="Send message" class="form-field" rows="6" required></textarea>
          </div>
          <div class="button">
            <input type="submit" name="submit" value="Message" onclick="return confirmSendMessage();">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function confirmSendMessage() {
      return confirm("Are you sure you want to send this message?");
    }
  </script>

</body>

<?php
require 'footer.php';
?>

</html>