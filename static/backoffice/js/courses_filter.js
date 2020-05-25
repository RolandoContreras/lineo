(function ($) {

    $(document).ready(function () {

        var $filter = $('.stm_lms_courses__filter');
        $filter.eq(0).addClass('active').find('.stm_lms_courses__filter_content').slideDown();
        $filter.eq(1).addClass('active').find('.stm_lms_courses__filter_content').slideDown();
        $filter.eq(2).addClass('active').find('.stm_lms_courses__filter_content').slideDown();
        $filter.eq(3).addClass('active').find('.stm_lms_courses__filter_content').slideDown();

        $filter.find('.stm_lms_courses__filter_heading').on('click', function () {
            $(this).closest('.stm_lms_courses__filter').toggleClass('active').find('.stm_lms_courses__filter_content').slideToggle();
        });


        $('.stm_lms_courses__filter input').each(function () {
            var value = $(this).val();
            var type = $(this).attr('type');

            if (type === 'checkbox' || type === 'radio') {
                value = $(this).is(':checked');
            }

            if (value) {
                $(this).closest('.stm_lms_courses__filter').addClass('active').find('.stm_lms_courses__filter_content').slideDown();
            }

        });

        subcategories();

        $('.stm_lms_courses__category .stm_lms_courses__filter_category input').on('change', function () {
            subcategories($(this));
        });

        courses_filter();


        $('.stm_lms_courses__archive_filter_toggle').on('click', function (e) {
            e.preventDefault();

            $('.stm_lms_courses__archive_filters').slideToggle();

        });

        limits();

        $('.reveal_limited').on('click', function () {
            $(this).slideUp();
            $(this).closest('.limited_list').find('.stm_lms_courses__filter_category').slideDown();
        });

    });

    function subcategories(category) {

        var categories = [];
        var subcategories = [];

        $('.stm_lms_courses__subcategory_item').hide();
        $('.stm_lms_courses__category .stm_lms_courses__filter_category input:checked').each(function () {
            var $this = $(this);
            categories.push($this.val());
        });

        if (categories.length) {
            categories.forEach(function (item) {
                if ($('.stm_lms_courses__subcategory_' + item + ' .stm_lms_courses__filter_category').length) {
                    subcategories.push(item);
                }
            });
        }

        if (subcategories.length) {
            $('.stm_lms_courses__subcategory').show();
            subcategories.forEach(function (subcategory) {
                $('.stm_lms_courses__subcategory_' + subcategory).show();
            });
        } else {
            $('.stm_lms_courses__subcategory').hide();
        }

        /*Uncheck closed cateogories*/
        if (typeof category !== 'undefined') {
            var categoryChecked = category.is(':checked');
            var categoryVal = category.val();

            if (!categoryChecked) {
                console.log('.stm_lms_courses__subcategory_' + categoryVal + ' input');
                $('.stm_lms_courses__subcategory_' + categoryVal + ' input').prop('checked', false);
            }
        }
    }

    function limits() {
        $('.limited_list').each(function () {
            $(this).find('input').each(function(){
                if($(this).is(':checked')) {
                    $(this).closest('.stm_lms_courses__filter_category').slideDown();
                }
            });
        });
    }

})(jQuery);