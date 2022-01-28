<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <ul class="profile-title">
        <li class="active"><a href="#Products" data-toggle="tab" aria-expanded="false"><i class="fa fa-cart-plus" aria-hidden="true"></i> Ürünler (

                <?php
                $urunsay = $db->prepare("SELECT COUNT(urun_id) AS say FROM urun WHERE kullanici_id=:id");
                $urunsay->execute(array(
                    'id' => $kullanicicek['kullanici_id']
                ));
                $saycek = $urunsay->fetch(PDO::FETCH_ASSOC);

                echo $saycek['say'];
                ?>
                )</span></a></li>
    </ul>
</div>