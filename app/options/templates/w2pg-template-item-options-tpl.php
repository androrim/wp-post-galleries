<tr>
    <th>
        <label for="w2pg-gallery-template-item">
            <?php _e('Template gallery item') ?>
        </label>
    </th>
    <td>
        <textarea name="w2pg_options[template]"
                  id="w2pg-gallery-template-item" rows="8" cols="60"><?php
                      if (isset($options['template'])) {
                          echo str_replace('\\', '', $options['template']);
                      }
                      else {
                          echo '<a id="w2pg-%ID%" class="w2pg-item" title="%LEGEND%" href="%IMG%">'
                          . '<img  src="%IMG_MEDIUM%" alt="%ALT%" />'
                          . '<span class="title">%TITLE%</spam>'
                          . '<span class="description">%DESCRIPTION%</spam>'
                          . '<a>';
                      }
                      ?></textarea>

        <p class="description"><?php
            _e('This field is base template for output '
                    . 'html items when use <strong>w2pg_get_gallery</strong> function.')
            ?></p>

        <h3><?php _e('Valid template codes') ?></h3>

        <p><strong><?php _e('ID') ?></strong>: <code>%ID%</code></p>

        <p><strong><?php _e('Title') ?></strong>: <code>%TITLE%</code></p>

        <p><strong><?php _e('Legend') ?></strong>: <code>%LEGEND%</code></p>

        <p><strong><?php _e('Alt text') ?></strong>: <code>%ALT%</code></p>

        <p><strong><?php _e('Description') ?></strong>: <code>%DESCRIPTION%</code></p>

        <p>
            <strong><?php _e('Size') ?>:</strong> 
            <?php _e('Full') ?>: <code>%IMG%</code> |
            <?php _e('Medium') ?>: <code>%IMG_MEDIUM%</code> |
            <?PHP _e('Tumbnail') ?>: <code>%IMG_THUMB%</code>
        </p>
    </td>
</tr>