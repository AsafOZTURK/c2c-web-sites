<?php 
//dosyanın dışsardan görünmesini engelleme
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    exit("Bu sayfaya erişim yasak");
}

?>
<!-- Main Banner 1 Area Start Here -->
<div class="inner-banner-area">
    <div class="container">
        <div class="inner-banner-wrapper">
            <p>Aradğınız ürün yada hizmetin adını giriniz.</p>
            <form action="arama-detay.php" method="post">
                <div class="banner-search-area input-group">
                    <input class="form-control" name="searchkeyword" required minlength="3" placeholder="Ne arıyorsunuz?" type="text">
                    <span class="input-group-addon">
                        <button type="submit" name="search">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Main Banner 1 Area End Here -->