<?php $count = is_numeric($galleries_count) ? $galleries_count : 1; ?>

<div id="w2pg-container">
    <?php for ($i = 1; $i <= $count; $i++) : ?>
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
                if (isset($galleries_attachments[$i])) {
                    foreach ($galleries_attachments[$i] as $attachment) {
                        $image_attributes = wp_get_attachment_image_src($attachment->ID);

                        $gallery_item = str_replace('%src%', $image_attributes[0], $base_template);
                        $gallery_item = str_replace('%id%', $attachment->ID, $gallery_item);
                        $gallery_item = str_replace('%i%', $i, $gallery_item);

                        echo $gallery_item;
                    }
                }
                ?>
            </div>
        </div>
    <?php endfor; ?>

    <input type="hidden"
           name="w2pg_noncename"
           value="<?= wp_create_nonce(W2PG_NONCE) ?>" />
</div>

