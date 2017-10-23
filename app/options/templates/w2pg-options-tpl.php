<div class="wrap">
    <h1><?php _e('WP Post Galleries') ?></h1>

    <form method="POST">
        <input type="hidden" name="w2pg_noncename"
               value="<?= wp_create_nonce('androrim_w2pg') ?>" />

           <table class="form-table">
            <tbody>
                <?php require W2PG_OPTIONSDIR . '/templates/w2pg-context-options-tpl.php' ?>
                <?php require W2PG_OPTIONSDIR . '/templates/w2pg-template-item-options-tpl.php' ?>
            </tbody>
        </table>

        <?= submit_button(__('Save options'), 'primary', 'w2pg_options_save') ?>
    </form>
</div>

