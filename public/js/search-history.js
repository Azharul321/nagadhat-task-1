$(document).ready(function () {
    // Handle checkbox changes
    $('.filter-checkbox').change(function () {
        filterResults();
    });

    function filterResults() {
        var selectedKeywords = $('.keyword:checked').map(function () {
            return $(this).val();
        }).get();

        var selectedUsers = $('.user:checked').map(function () {
            return $(this).val();
        }).get();

        var selectedTimeRanges = $('.time-range:checked').map(function () {
            return $(this).val();
        }).get();

        // Filter results based on selected checkboxes
        $('#search-results li').each(function () {
            var $result = $(this);
            var keywords = $result.data('keywords').split(', ');
            var user = $result.data('user');
            var time = $result.data('time');

            var keywordMatch = selectedKeywords.length === 0 || selectedKeywords.some(keyword => keywords.includes(keyword));
            var userMatch = selectedUsers.length === 0 || selectedUsers.includes(user.toString());
            var timeMatch = selectedTimeRanges.length === 0 || selectedTimeRanges.includes('all') || selectedTimeRanges.includes(getTimeRange(time));

            if (keywordMatch && userMatch && timeMatch) {
                $result.show();
            } else {
                $result.hide();
            }
        });
    }

   function getTimeRange(searchTime) {
    // Parse the searchTime string into a Moment.js object
    const searchTimeMoment = moment(searchTime);

    // Get the current date
    const currentDate = moment();

    // Calculate the difference in days between the search time and the current date
    const daysDifference = currentDate.diff(searchTimeMoment, 'days');

    // Determine the time range based on the days difference
    if (daysDifference === 0) {
        return 'today';
    } else if (daysDifference === 1) {
        return 'yesterday';
    } else if (daysDifference <= 7) {
        return 'last_week';
    } else {
        return 'older';
    }
}

});
