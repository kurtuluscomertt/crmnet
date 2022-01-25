<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header style="text-align: center;">Alaraph</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>İsim</label>
            <input type="text" name="fname" placeholder="İsim" required>
          </div>
          <div class="field input">
            <label>Soyisim</label>
            <input type="text" name="lname" placeholder="Soyisim" required>
          </div>
        </div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="Email adresinizi girin" required>
        </div>
        <div class="field input">
          <label>Şifre</label>
          <input type="password" name="password" placeholder="Şifrenizi Girin" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Profil Resmi</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Kayıt Ol">
        </div>
      </form>
      <div class="link">Hesabınız var mı? <a href="login.php">Giriş Yap</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
