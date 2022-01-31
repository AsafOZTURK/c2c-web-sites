<?php 
include "header.php"; 
include "search.php"; 


?>

<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Page Error Area Start Here -->
<div class="page-error-area bg-secondary section-space-bottom">
    <div class="container">
        <h2 class="title-section">Hata Sayfası</h2>
        <div class="page-error-top">
            <img width="300" src="img\404.png" alt="404" class="img-responsive">
            <p>Üzgünüz aradığınız sayfayı bulamadık</p>
            <div class="page-error-bottom">
                <p>Aradığınız sayfa silinmiş ya da yayından kaldırılmış olabilir</p>
                <a href="index.php" class="default-btn">Anasayfaya Dön</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Error Area End Here -->
<?php include "footer.php"; ?>