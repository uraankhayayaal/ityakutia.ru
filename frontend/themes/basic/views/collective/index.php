<?php

$this->title = "Коллектив";

?>

<div class="container">
    <div class="row my-5">
            <?php for ($i=0; $i < 20; $i++) { ?>
                <?= $this->render('_item', [
                    'id' => $i,
                ]); ?>
            <?php } ?>
    </div>
</div>