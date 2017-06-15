<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
        <div id="titlecalendar">
            <p id="titlepage-calendar">Calendar</p>
            <hr id="calendar-line">
        </div>
        <div id="calendarpage">
            <?php echo $calendar; ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.calendar .day').click(function() {
                        day_num = $(this).find('.day_num').html();
                        day_data = prompt('Enter Stuff', $(this).find('.content').html());
                        if (day_data != null){

                            $.ajax({
                                url: window.location,
                                type: 'POST',
                                data: {
                                    day: day_num,
                                    data: day_data
                                },
                                success: function(msg) {
                                    location.reload();
                                }
                            });
                        }
                    });
                });
            </script>

        </div>
