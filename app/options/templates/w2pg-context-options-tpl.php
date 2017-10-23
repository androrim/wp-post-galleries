 <tr>
    <th>
        <label><?php _e('Activated on contexts') ?></label>
    </th>
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

                                <label>
                                    <input
                                        style="width: 50px"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                        type="number"
                                        name="w2pg_options[<?= $post_type->name ?>]"
                                        value="<?= isset($options[$post_type->name]) ? $options[$post_type->name] : 1 ?>" />
                                    <?php _e('Galleries') ?>
                                </label>

                            </td>
                        </tr>
                    </table>
                </p>
            <?php endif; ?>
        <?php endforeach; ?>
                
        <p class="description"><?php _e('Check the context and add number of galleries that should display per post.') ?></p>
    </td>
</tr>
  