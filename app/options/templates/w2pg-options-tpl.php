<div class="wrap">
    <h1><?php _e('WP Post Galleries') ?></h1>

    <form method="POST">
        <input type="hidden" name="w2pg_noncename" value="<?= wp_create_nonce('androrim_w2pg') ?>" />

           <table class="form-table">
            <tbody>
                <tr>
                    <th><label><?php _e('Activated on contexts') ?></label></th>
                    <td>
                        <?php foreach (get_post_types('', 'objects') as $post_type) : ?>
                            <?php if (!in_array($post_type->name, $not_in)) : ?>
                                <p>
                                    <table>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input <?= in_array($post_type->name, $options['in']) ? 'checked' : null ?>
                                                        type="checkbox"
                                                        name="w2pg_options[in][]"
                                                        value="<?= $post_type->name ?>" />
                                                    <?= $post_type->label ?>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input
                                                        style="width: 50px"
                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                        type="number"
                                                        name="w2pg_options[<?= $post_type->name ?>]"
                                                        value="<?= isset($options[$post_type->name]) ? $options[$post_type->name] : 1 ?>" />
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <?= submit_button(__('Save options'), 'primary', 'w2pg_options_save') ?>
    </form>
</div>

