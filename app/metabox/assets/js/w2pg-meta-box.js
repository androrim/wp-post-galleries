
;(function ($) {
    $(document).ready(function () {

        var $galleries = $('#w2pg-container .w2pg');

        $galleries.each(function () {
            $(this).W2PG_Media();
        });

    });

    $.fn.W2PG_Media = function () {
        var frame;
        var gallery = $(this);
        var imagesContainer = gallery.find('.items');
        var addButton = gallery.find('.add-images');
        var deleteButton = gallery.find('.delete-images');
        
        var addGalleryItem = function (attachments, baseTemplate) {
            if (baseTemplate) {
                $.each(attachments, function () {
                    var baseElement = $(baseTemplate);
                    
                    if (imagesContainer.find('input[value="' + this.id + '"]').length == 0) {
                        baseElement.data('id', this.id);
                        baseElement.data('index', gallery.data('index'));
                        baseElement.find('input').val(this.id);
                        baseElement.find('input').attr('name', 'w2pg-item[' + gallery.data('index') + '][]');
                        baseElement.find('img').attr('src', this.sizes.thumbnail.url);

                        imagesContainer.append(baseElement);
                    }
                });
            } 
            else {
                $.post(ajaxurl, {
                    action: 'w2pg_base_image_tpl'
                }, function (baseTemplate) {
                    addGalleryItem(attachments, baseTemplate);
                });
                
            }
        };

        gallery.on('selectImage', function () {
            var selecteds = gallery.find('.item.selected');

            if (selecteds.length) {
                deleteButton.removeClass('hidden');
            } else {
                deleteButton.addClass('hidden');
            }
        });

        deleteButton.click(function (event) {
            event.preventDefault();

            var selecteds = gallery.find('.item.selected');

            selecteds.fadeOut(200, function () {
                selecteds.remove();
                deleteButton.addClass('hidden');
            });
        });

        addButton.click(function (event) {
            event.preventDefault();
            
            var attachments = [];

            frame = wp.media({
                title: 'Select images to gallery',
                button: {
                    text: 'Add to this Gallery'
                },
                multiple: true
            });

            frame.on('select', function (teste) {
                frame.state().get('selection').map(function (attach, i, attachs) {
                    attachments.push(attach.toJSON());
                    
                    if (i === attachs.length - 1) {
                        addGalleryItem(attachments);
                    }
                });
            });

            frame.open();
        });
    };

    $.W2PG_SelectImage = function (item) {
        var parentId = $(item).parent().data('parent');
        var parent = document.getElementById(parentId);

        $(item).toggleClass('selected');
        $(parent).trigger('selectImage');
    };

})(jQuery);


