$(document).ready(function(){
    gallery.init();
});


var gallery = {
    images: [],
    categories: '',
    spinner: '',
    overlay: '<div class="gallery-overlay"><div class="gallery-left-arrow"></div><div class="gallery-holder"><div class="gallery-closer"></div><div class="gallery-actual"></div><div class="gallery-description"></div></div><div class="gallery-right-arrow"></div></div>',
    init: function() {
        var _ = this;

        // Check for categories
        if($('.gallery').find('div').length > 0) {
            $('.gallery').find('.category').each( function () {
                $(this).on('click', function() {
                    _.loadCategory($(this).data('category'));
                });
            });
        } else {
            $('.gallery').html('<h1>Jelenleg üres a galéria!</h1>');
        }
    },
    loadCategory: function (cat) {
        var _ = this ;
        if(_.categories == '' ) {
            _.categories = $('.gallery').html();
        }

        $('.gallery').fadeOut(300, function() {
            $.ajax({
                method: "POST",
                url: "galleryimages.php",
                data: {category: cat},
                success: function (data) {
                    var url = window.location.hostname == 'localhost' ? '/tagaster/gallery/' : '/gallery/';
                    var text = '';
                    for (var image in data) {
                        text += "<div class='img' style='background-image: url(" + url + 'thumbnail/' + data[image].name + ")' data-description='" + data[image].description + "' data-original='" + url  + data[image].name + "'></div>";
                    }
                    text += '<h4 class="gallery-back"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Vissza a kategóriákhoz</h4>';
                    $('.gallery').html(text);
                    $('.gallery').find('.img').each(function () {
                        _.images.push(this);
                        _.bind(this);
                    });
                    $('.gallery').find('.gallery-back').on('click', function() {
                        $('.gallery').fadeOut(300, function() {
                            $('.gallery').html(_.categories);
                            _.images = [];
                            _.actualImg = null;
                            $('.gallery').find('.category').each( function () {
                                $(this).on('click', function() {
                                    _.loadCategory($(this).data('category'));
                                });
                            });
                            $('.gallery').fadeIn(300);
                        });
                    });
                    $('.gallery').fadeIn(300);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    },
    bind: function(img) {
        var _ = this;
        $(img).on('click', function() {
            _.actualImg = img;
            _.rotator();
        });

    },
    rotator: function() {
        var _ = this;
        $('body').append(_.overlay);

        $('.gallery-overlay').fadeIn(300);

        $('.gallery-closer').on('click', function () {
            $('.gallery-overlay').fadeOut(300, function() {
                $('.gallery-overlay').remove();
            });
        });

        _.slideImg();

        $('.gallery-left-arrow').on('click', function() {
            if(_.images.indexOf(_.actualImg) == 0) {
                _.actualImg = _.images[(_.images.length - 1)];
            } else {
                _.actualImg = _.images[(_.images.indexOf(_.actualImg) - 1)];
            }

            _.slideImg();
        });
        $('.gallery-right-arrow').on('click', function() {
            if(_.images.indexOf(_.actualImg) == (_.images.length - 1 )) {
                _.actualImg = _.images[0];
            } else {
                _.actualImg = _.images[(_.images.indexOf(_.actualImg) + 1)];
            }
            _.slideImg();
        });
    },
    slideImg: function(){
        var _ = this;
        var bg = 'url(' + $(_.actualImg).data('original') + ')';
        $('.gallery-actual').fadeOut(300, function () {
            $('.gallery-actual').css('background-image', bg);
            if($(_.actualImg).data('description') !== null) {
                $('.gallery-description').fadeIn(300);
                $('.gallery-description').html($(_.actualImg).data('description'));
            } else {
                $('.gallery-description').fadeOut(300);
            }
            $(this).fadeIn(300);
        });

    }
}