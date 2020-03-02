JavaScriptManager = {

    getGradeClass: function (grade_id) {

        $.get('/grades/get-class/'+grade_id, {}, function (data) {
            $('#grade_class_id').html(data.classgrade);
            $('#subject_id').html(data.subjects);
        });

    },

    getSubjectForPayment: function () {

        let subjects = $('#subject_id').val(), grade_id = $('#grade_id').val();;

        $.get('/subjectsTotal', {subjects:subjects, grade_id: grade_id}, function (data) {

            let data_table = '<tr>\n' +
                '                    <th scope="row">1</th>\n' +
                '                    <td>Tution Fee</td>\n' +
                '                    <td>3</td>\n' +
                '                    <td>'+data.tution+' <input type="hidden" value="'+data.tution+'" name="tution_fee"> </td>\n' +
                '                </tr>\n' +
                '                <tr>\n' +
                '                    <th scope="row">2</th>\n' +
                '                    <td>Exam Fee</td>\n' +
                '                    <td>3</td>\n' +
                '                    <td>'+data.exam+' <input type="hidden" value="'+data.exam+'" name="exam_fee"> </td>\n' +
                '                </tr>\n' +
                '                <tr>\n' +
                '                    <th scope="row">3</th>\n' +
                '                    <td>Book Fee </td>\n' +
                '                    <td>3</td>\n' +
                '                    <td>'+data.book+' <input type="hidden" value="'+data.book+'" name="book_fee"></td>\n' +
                '                </tr>\n' +
                '                <tr>\n' +
                '                    <th scope="row">3</th>\n' +
                '                    <td>Projects Fee </td>\n' +
                '                    <td>3</td>\n' +
                '                    <td>'+data.projects+' <input type="hidden" value="'+data.projects+'" name="projects_fee"></td>\n' +
                '                </tr>\n' +
                '                <tr>\n' +
                '                    <th scope="row">4</th>\n' +
                '                    <td colspan="2">Total</td>\n' +
                '                    <td>'+data.total+' <input type="hidden" value="'+data.total+'" name="total_fee"></td>\n' +
                '                </tr>';

            $('#subject-amount').html(data_table);
            $('#payment_total').val(data.total).setAttribute('readonly').css('font-weight', 'larger');

        });
    },

    saveStudentData: function () {
        $.get('/saveStudent', {}, function (data) {

        });
    },

    getFilters: function () {

        $('#filters').css('display', 'block');
    },

    getReport: function (id)
    {
        $('#view').attr('src', '/studentProfile/'+id)
        $('#exampleModal').modal('show');


    },

    getMyDate: function (date_value) {

        $.get('/calender', {my_date: date_value}, function (data) {

            if(data)
            {
                $('#calender').html(data.strwidgetTags);
                $('#events-loader').attr('onclick', 'JavaScriptManager.loadCalenderEvents("'+data.date+'")');
            }
        });
    },

    loadCalenderEvents: function (date_value) {


        $.get('/get-calender-events', {my_date: date_value}, function (data) {

            if(data)
            {
                $('#calender-events-modal').modal('show');
                $('#calender-events').html(data.upcoming_events);
                $('#events-loader').attr('onclick', 'JavaScriptManager.loadCalenderEvents("'+data.date+'")');
            }
        });
    },

    addEventToCalender: function () {

        $('#add-events-modal').modal('show');
    },

    loadStats: function(id_chat) {

        $('#' + id_chat).highcharts({
            title: {
                text: 'Monthly Average Temperature',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: WorldClimate.com',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'New York',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'London',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });

    }

}

// $(document).ready(function(){
//     // your code
//     setTimeout(function(){
//         //your code here
//         hide();
//     }, 3000);
// });
