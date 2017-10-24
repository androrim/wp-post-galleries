# WordPress Post Gallery

Metabox galleries to WordPress posts.

The plugin for WordPress themes developers!

## Get started

1. Download (or clone) WordPress Post Gallery to de plugins folder;
2. Activate WordPress Post Gallery in plugins admin page;
3. Go on options page, under Settings menu, and setup your preferences (is very objective and intuitive);
4. In any post from activated context, below the editor, add images to gallery or galleries;
5. And add the **wp_post_gallery** function on your theme.

## Example

How using the wp_post_gallery funcion:

```html
  <div id="my-gallery-container-1">
    <?php w2pg_get_gallery(1) // Show items from gallery 1 ?>
  </div>

  <div id="my-gallery-container-2">
    <?php w2pg_get_gallery(2) // Show items from gallery 2 ?>
  </div>
```

## You are advanced themes developer?

Get attachments **by gallery id**:

```html
  <div id="my-gallery-container-1">
    <?php foreach (w2pg_get_attachments(1) as $item) : ?>
      <?php $img_src = wp_get_attachment_image_src($item->ID, 'medium'); ?>
      <a href="<?= $item->guid ?>" title="<?= $item->post_content ?>">
        <img src="<?= $img_src[0] ?>" alt="<?= $item->post_title ?>" />
      </a>
    <?php endforeach; ?>
  </div>
```

Get **all attachments** :

```html
    <?php foreach (w2pg_get_attachments() as $id => $gallery) : ?>
      <div id="my-gallery-container-<?= $id ?>">
        <?php foreach ($gallery as $item) : ?>
          <?php $img_src = wp_get_attachment_image_src($item->ID, 'medium'); ?>
          <a href="<?= $item->guid ?>" title="<?= $item->post_content ?>">
            <img src="<?= $img_src[0] ?>" alt="<?= $item->post_title ?>" />
          </a>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
```
