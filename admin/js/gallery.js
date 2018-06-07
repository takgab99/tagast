$(document).ready(function(){
    gallery.init();
});

var gallery = {
    sortable: null,
    savebtn: null,
    init: function() {
        var _ = this;
        // init sortable
        _.sortable = $( ".images-holder" ).sortable({
            stop : function(event, ui){
                $('#save-image-sequence').attr("disabled", false);
            }
        });
        _.sortable.disableSelection();

        _.savebtn = $('#save-image-sequence').attr("disabled", true);
        _.bindseq();
        _.binddesc();
    },
    bindseq: function () {
        var _ = this;
        _.savebtn.on('click', function () {
            $.ajax({
                type: "post",
                url: "galleryajax.php",
                data: {
                    idsort: JSON.stringify(_.sortable.sortable('toArray')),
                    action: 'sequence'
                },
                success: function () {
                    _.savebtn.after('<span id="saved" style="color:red;">A sorrend mentésre került!</span>');
                    _.savebtn.attr("disabled", true);
                    setTimeout( function () {
                        $('#saved').fadeOut(300, function () {
                            $('#saved').remove();
                        });
                    }, 1000);
                }
            });
        });
    },
    binddesc: function () {
        var _ = this;
        _.sortable.find('.description').each(function () {
            var form = this;
            _.buttondescription(form);
        });
    },
    buttondescription: function (form) {
        var _ = this;
        $(form).find('button').on('click', function () {
            $(form).find('textarea').fadeIn(100);
            $(this).html('Menés');
            $(this).on('click', function () {
                var btn = this;
                $.ajax({
                    type: "post",
                    url: "galleryajax.php",
                    data: {
                        description: $(form).find('textarea').val(),
                        image: $(btn).data('image'),
                        action: 'description-update'
                    },
                    success: function () {
                        $(form).find('textarea').fadeOut(300);
                        $(btn).html('Kép aláirás frissítve!');
                        $(btn).attr("disabled", true);
                        $(btn).unbind();
                        $(btn).on('click', function() {_.buttondescription(form);});
                        setTimeout( function() {
                            $(btn).attr("disabled", false);
                            $(btn).html('Kép aláírás módosítása');
                        }, 2000);
                    }
                });
            });
        });
    }
}