<div id="w2pg-container">
    <?php for ($i = 1; $i <= 2; $i++) : ?>
        <div id="w2pg<?= $i ?>" class="w2pg" data-index="<?= $i ?>">
            <h3><?php _e('Gallery') ?> <?= $i ?></h3>

            <div class="actions">
                <a class="add-images" href="<?= $upload_link ?>">
                    <?php _e('Add images on gallery') ?>
                </a>

                <a class="delete-images hidden" href="#">
                    <?php _e('Delete selecteds') ?>
                </a>
            </div>

            <div class="items" data-parent="w2pg<?= $i ?>">
                <?php
                foreach ($attachments as $attachment) {
                    echo _w2pg_parse_image_base($attachment);
                }
                ?>
            </div>
        </div>
    <?php endfor; ?>

    <input type="hidden"
           name="w2pg_noncename"
           value="<?= wp_create_nonce(W2PG_NONCE) ?>" />
</div>

