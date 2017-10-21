<div class="wrap">
    <h1><?php _e('WP Post Galleries') ?></h1>

    <form>
        <table>
            <tbody>
                <tr>
                    <th><?php _e('Activated on contexts') ?></th>
                    <td>
                        <?php foreach (get_post_types('', 'objects') as $post_type) : ?>
                            <?php if (!in_array($post_type->name, $in)) : ?>
                                <p>
                                    <label>
                                        <input type="checkbox" name="w2pg-in-post-type[]" value="<?= $post_type->name ?>" />
                                        <?= $post_type->label ?>
                                    </label>
                                </p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

