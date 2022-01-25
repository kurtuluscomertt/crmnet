<?php
$sorgu2=$db->prepare('SELECT *FROM islem ORDER BY id DESC LIMIT 0,5');
$sorgu2->execute();
$personellist2=$sorgu2-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.

?>

<div id="sidebar" class='active bg-dark'>
            <div class="sidebar-wrapper bg-dark active">
                <div class="sidebar-header">
                    <img src="/img/LOGO.png" height="190px" width="100px" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>İşlem Menüsü</li>



                        <li class="sidebar-item active ">
                            <a href="index.php" class='sidebar-link bg-dark'>
                                <i data-feather="home" width="20"></i>
                                <span>Anasayfa</span>
                            </a>

                        </li>
                        <li class="sidebar-item has-active ">
                            <a href="/chat/login.php" class='sidebar-link bg-dark'>
                                <i data-feather="inbox" width="20"></i>
                                <span>Mesajlar</span>
                            </a>

                        </li>
						  <li class="sidebar-item has-active ">
                            <a href="mail-gonder.php" class='sidebar-link bg-dark'>
                                <i data-feather="mail" width="20"></i>
                                <span>Mail Gönder</span>
                            </a>

                        </li>
                      
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Stok</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="urun-ekle.php">Stok Ekle</a>
                                </li>

                                <li>
                                    <a href="urun-listele.php">Stok Listele</a>
                                </li>
                                


                            </ul>

                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Müşteri Yönetimi</span>
                            </a>
                            

                            <ul class="submenu ">

                                <li>
                                    <a href="musteri-ekle.php">Müşteri Ekle</a>
                                </li>

                                <li>
                                    <a href="musteri-listele.php">Müşteri Listele</a>
                                </li>

                                

                            </ul>

                        </li>




                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i>
                                <span>Sipariş</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="cari-sec.php">Sipariş Ekle (Cari)</a>
                                </li>

                                <li>
                                    <a href="siparis-ekle-perekande.php">Sipariş Ekle (Perekande)</a>
                                </li>
                                <li>
                                    <a href="siparis-listele.php">Sipariş Listele</a>
                                </li>

                            </ul>

                        </li>

 <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="dollar-sign" width="20"></i>
                                <span>Kasa</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="odeme-ekle.php">Gelen Ödeme Ekle</a>
                                </li>

                                <li>
                                    <a href="giden-odeme-ekle.php">Giden/Ödeme Masraf Ekle</a>
                                </li>
                                <li>
                                    <hr>
                                </li>
                                <li>
                                    <a href="kasa-gelen-listele.php">Gelen Kasa Listele</a>
                                </li>
                                <li>
                                    <a href="kasa-giden-listele.php">Giden Kasa Listele</a>
                                </li>


                            </ul>

                        </li>
                        <li class='sidebar-title'>Performans</li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="bar-chart-2" width="20"></i>
                                <span>Satış Raporu</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="urun-grafik.php">Ürün Gelir Grafiği</a>
                                </li>

                              


                            </ul>

                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="bar-chart-2" width="20"></i>
                                <span>Personel Gelir Raporu</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="personel-grafik.php">Personel Satış Grafiği</a>
                                </li>

                              


                            </ul>

                        </li>



                        <li class='sidebar-title'>Kurumsal </li>



                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="user-check" width="20"></i>
                                <span>Personel Yönetimi</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="personel-ekle.php">Personel Ekle</a>
                                </li>

                                <li>
                                    <a href="personel-listele.php">Personel Listele</a>
                                </li>

                               

                            </ul>

                        </li>





                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Bildirimler</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="bildirim.php">Son İşlemler</a>
                                </li>

                              
                            </ul>

                        </li>








                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Son İşlemler</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="alert-circle"></i></span>
                                        </div> 
                                        <div>
                                            
                                            <p class='text-xs'><?php   
			 foreach($personellist2 as $person2){?>
                                            <?= $person2->islem?> | <?= $person2->saat?> <br><br>
                                            <?php } ?> </p>
                                        </div>

                                        
                                    </li>
                                 
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                
                            </a>
                            
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block"><?php  echo $_SESSION['kullanici_adi'];?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="ayar.php"><i data-feather="settings"></i>Firma Ayarları</a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="log-out"></i> Çıkış Yap</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>