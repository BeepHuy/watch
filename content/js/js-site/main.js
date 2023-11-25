window.addEventListener("load", function() {
    // TABS
        $('.tab-links li:first-child').addClass('active');
        $('.tab-content').hide();
        $('.tab-content:first').show();
    
        $('.tab-links li').click(function(){
            $('.tab-links li').removeClass('active');
            $(this).addClass('active');
            $('.tab-content').hide();
    
            var activeTab = $(this).find('a').attr('href');
            $(activeTab).fadeIn();
            return false;
        })
    
    // PLUS AND MINUS QUANTITY
        $('input.ip-quantity').each(function() {
            var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
            if (min == 0) {
            var d = 0
            } else d = min
            $(qty).on('click', function() {
            if ($(this).hasClass('btn-minus-quantity')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('btn-plus-quantity')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
            })
        })
    });