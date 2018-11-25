$(document).ready(function () {
    // showData();
    showMonthlyAverage();
    showLast30days();
    showLastMinMax();
    // show last 30 days activity
    function showLast30days() {
        $('#last_30_days').empty();
        $('#last_30_days').append('<h4>Ostatnie 30 dni<h4>')
        
        
    $.ajax({
            type: 'get',
            url: 'q_last30days.php',
            success: function (response) {
                // console.log(response);
              $('#last_30_days').append(response);

            }
        });
    }; // end of show last 30 days
    
    function showLastMinMax() {
        $('#last_min_max').empty();
        $.ajax({
            type: 'get',
            url: 'last_min_max.php',
            success: function(response) {
                //console.log(response);
                $('#last_min_max').append(response);
            }
        })
    }; // end of showLastMinMax
function showLastMinMaxYear() {
        $('#last_min_max_year').empty();
        $.ajax({
            type: 'get',
            url: 'last_min_max_year.php',
            success: function(response) {
                //console.log(response);
                $('#last_min_max_year').append(response);
            }
        })
    }; // end of showLastMinMax

    // add data
    $('#form').submit(function (e) {
        e.preventDefault();
        let date = $('#learn_date').val();
        let hours = $('#hours').val();
         hours = parseInt(hours);
        // hours = hours == NaN ? 0  : hours;
        let minutes = $('#minutes').val();
         minutes = parseInt(minutes);
        let time_of_study = hours*60 + minutes;
        //console.log(date, hours, minutes, time_of_study);

        $.ajax({
            type: "POST",
            url: "add.php",
            data: {
                data: date,
                period: time_of_study
                   },

            success: function (response) {
                console.dir(response);
                $('#data').empty();
                showMonthlyAverage();
                showLast30days();
                alertify.success("Dodano nowy rekord");
            }
        });

    }
                      )
    // show all data


    $('#show-data').click(function() {
        showLast14days();
    })
    $('#last_min_max_button').click(function() {
        showLastMinMaxYear();
    })


    function showLast14days() {

        $('#table').empty();

        $.ajax({

            type: 'GET',
            url: 'get_data.php',
            success: function (response) {
               // console.log(response);
                var html ='<ol><span>DATA</span><span>Czas nauki</span>';
                $.each(response, function (index) {
                 html += '<li><span>'+response[index].data +'</span><span>' + minutes(parseInt(response[index].period))+'</span></li>';
                 
                });
                html += '</ol>';
                $('#table').append(html);
             

            }
        });
    }
    // end of showData

    function showMonthlyAverage() {
        $('#data').append('<ol id="average-data"></ol>')
        $('#average-data').append('<span>Miesiąc</span><span>średnia</span><span>średnia przez ilość dni</span>');
        $.ajax({
            type: 'get',
            url: 'query.php',
            success: function (response) {
                // console.log(response);
                $.each(response, function (index) {
                    var st = "date in some format"

                    //console.log(dt);
                    $('#average-data').append('<li><span>' + display_year_month(response[index].mc) + '</span><span>' + minutes(parseInt(response[index].avg)) + '</span><span>' + minutes(parseInt(response[index].avg2)) + '</span></li>');




                });

            }
        });
        //$('#data').append('</ol>');
    }

    function minutes(mins) {
        //  console.log(mins);
        let h = Math.floor(mins / 60);
        let m = mins % 60;
        h = h < 10 ? '0' + h : h;
        m = m < 10 ? '0' + m : m;
        return `${h}:${m}`;

    }

    function display_year_month(date) {

      let month = date.substr(4, 6);
       let year = date.substr(0, 4);
       let str = month + " - " + year;

        return str;
    }

   /* function daysInMonth (date) {
        let month = date.substr(4, 6);
       let year = date.substr(0, 4);
  return new Date(year, month, 0).getDate();
}*/



});
