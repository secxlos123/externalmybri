!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
        this.$event = ('#external-events div.external-event'),
        this.$calendar = $('#calendar'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$categoryForm = $('#add-category form'),
        this.$extEvents = $('#external-events'),
        this.$calendarObj = null
    };

    var eventValues = [];
    var today = new Date($.now());

    // $.ajax({
    //     url: '/schedule/data-list',
    //     dataType: "JSON",
    //     type: 'GET',
    //     data: {
    //         month: today.getMonth() + 1
    //         , year: today.getFullYear()
    //     },
    //     async: false,
    //     allDay: false,
    //     success: function(response){
    //         console.log("====didieu====");
    //         console.log(response.data);
    //         $.each(response.data, function(key, value){
    //             event = {
    //                 id : value.id,
    //                 title : value.title,
    //                 start : new Date(value.appointment_date),
    //                 className: 'bg-primary',
    //                 desc: value.desc,
    //                 lat: value.latitude,
    //                 long: value.longitude,
    //                 status: value.status,
    //                 guest: value.guest_name,
    //                 refNum: value.ref_number
    //             };
    //             eventValues.push(event);
    //         });
    //      //    $( document ).ready(function() {
    //      //     $('.fc-time').remove();
    //      // });
    //     },
    //     error: function(response){
    //         console.log(response);
    //     }
    // });

    var defaultEvents =  [{
                title: 'Jadwal 1',
                start: new Date($.now() + 158000000),
                className: 'bg-primary'
            },
            {
                title: 'Jadwal 2',
                start: today,
                end: today,
                className: 'bg-primary'
            },
            {
                title: 'Jadwal 3',
                start: new Date($.now() + 168000000),
                className: 'bg-primary'
            },
            {
                title: 'Jadwal 4',
                start: new Date($.now() + 338000000),
                className: 'bg-primary'
            },
            {
                title: 'Jadwal 5',
                start: new Date($.now() + 398000000),
                className: 'bg-primary'
            }];


    /* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date) {
        var $this = this;
            console.log(eventObj);
            console.log(date);
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
    },
    /* Edit Event */
    CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
        var $this = this;
            var form = $("<form></form>");
            form.append("<label>Nama Jadwal</label>");
            form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>");
            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                    return (ev._id == calEvent._id);
                });
                $this.$modal.modal('hide');
            });
            $this.$modal.find('form').on('submit', function () {
                calEvent.title = form.find("input[type=text]").val();
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                $this.$modal.modal('hide');
                return false;
            });
    },
    /* Create New */
    CalendarApp.prototype.onSelect = function (start, end, allDay,) {
        var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var moment = $('#calendar').fullCalendar('getDate');
            console.log(moment.format());
            var form = $("<form></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Tanggal</label><input class='form-control' type='text' name='date' readonly='' value='12 September 2017' /></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>No. Referensi</label><select class='form-control select2' name='eform-id'></select></div></div>")
                .find("select[name='eform-id']")
                .append("<option value=''>-- Pilih --</option>")
                .append("<option value=''>54321</option>")
                .append("<option value=''>31245</option>")
                .append("<option value=''>52341</option></div></div>");
            form.find(".select2").select2()
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Title</label><input class='form-control' type='text' name='title' /></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Guest</label><input class='form-control' type='text' name='guest' readonly='' value='John Doe' /></div></div>")
            form.find(".row")
                .append("<div class='col-md-12'><div class='form-group'><label class='control-label'>Deskripsi</label><textarea name='description' class='form-control' rows='3'></textarea></div></div>")

            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                if (title !== null && title.length != 0) {
                    $this.$calendarObj.fullCalendar('renderEvent', {
                        title: title,
                        start:start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);
                    $this.$modal.modal('hide');
                }
                else{
                    alert('You have to give a title to your event');
                }
                return false;

            });
            $this.$calendarObj.fullCalendar('unselect');
    },
    CalendarApp.prototype.enableDrag = function() {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    },
    CalendarApp.prototype.buildForm = function (calEvent, disabled) {
      var $this = this;
        $this.$modal.modal({
            backdrop: 'static'
        });
        var form = $("<form></form>");
        form.append("<div class='row'></div>");
        form.find(".row")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Tanggal</label><input class='form-control appointment_date' readonly type='text' name='date' /></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>No. Referensi</label><select class='form-control select2' " + disabled + " name='eform-id'></select></div></div>")
            .find("select[name='eform-id']");
        form.find(".select2").append("<option value='" + calEvent.eform_id + "' selected='selected'>" + calEvent.ref_number +"</option>");
        form.find(".select2").trigger('change');
        form.find(".select2").select2(ajaxConfig);
        form.find(".row")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Title</label><input class='form-control' type='text' name='title' /></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Guest</label><input class='form-control' type='text' name='guest' readonly='' value='John Doe' /></div></div>")
        // form.find(".row")
        //     .append("<div class='col-md-12'><div class='form-group'><label class='control-label'>Deskripsi</label><textarea name='description' class='form-control' rows='3'></textarea></div></div>")
        $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').find('.form').empty().prepend(form);
        $this.$modal.find('.save-event').unbind('click').click(function () {
            form.submit();
        });
        return form;
    },
    CalendarApp.prototype.valid = function (data) {
      return data !== '' && data !== null && data !== undefined && data.length > 0;
    },
    /* Edit Event */
    CalendarApp.prototype.onEventClickTag =  function (calEvent, jsEvent, view) {
        var $this = this;
        $this.$modal.modal({
            backdrop: 'static'
        });
        console.log(calEvent);
        $("input[name='title']").val(calEvent.title || '');
        $("input[name='guest']").val(calEvent.guest || '');
        $("input[name='date']").val(calEvent.start.format('YYYY-MM-DD') || '');
        $("input[name='reference']").val(calEvent.refNum || '');
        $("textarea[name='description']").val(calEvent.desc || '');
        $("input[name='lng']").val(calEvent.long || '');
        $("input[name='lat']").val(calEvent.lat || '');
        $("input[name='id_schedule']").val(calEvent.id || '');
        // if (calEvent.status.toString() == "waiting") {
        //     $this.$modal.find(".approval").show();
        // }else{
        //     $this.$modal.find(".approval").hide();
        // }
       //initializeMapPosition(calEvent);
        // $this.$modal.find(".save-event").html("Update Jadwal").attr('type', 'submit');
        // $this.$modal.find('form').on('submit', function () {
        //     var title = form.find("input[name='title']").val();
        //     var beginning = form.find("input[name='beginning']").val();
        //     var ending = form.find("input[name='ending']").val();
        //     var categoryClass = form.find("select[name='category'] option:checked").val();
        //     var eForm = form.find('select[name="eform-id"]');
        //     // var desc = form.find('textarea[name="description"]').val();
        //     var eFormTexts = eForm.find('option:selected').text().split('</span>').map(function(text) {
        //         return text.replace('<span>', '').replace('<span class="none">', '');
        //     });

        //     var updateEvent = {
        //         id: calEvent.id,
        //         title: eForm.find('option:selected').text(),
        //         origin_title: title,
        //         start: moment($('.appointment_date').val()),
        //         // end: end,
        //         allDay: false,
        //         eform_id: eForm.val(),
        //         // desc: desc,
        //         ref_number: calEvent.ref_number || undefined,
        //         guest_id: calEvent.guest_id || undefined,
        //         guest_name: calEvent.guest_name || undefined,
        //         address: calEvent.address,
        //         latitude: calEvent.latitude,
        //         longitude: calEvent.longitude,
        //         className: 'bg-primary'
        //     }
        //     if (!$this.valid(updateEvent.origin_title)) {
        //         form.find("input[name='title']").parent().parent().addClass('has-error');
        //     } else {
        //         var schedule = new Schedule();
        //         schedule.update(updateEvent, true)
        //             .then(function(event) {
        //             toastr.success('Schedule Has Been Updated');
        //             calEvent.origin_title = title;
        //             calEvent.start = moment($('.appointment_date').val());
        //             calEvent.latitude = event.latitude;
        //             calEvent.longitude = event.longitude;
        //             calEvent.address = event.address;
        //         $this.$calendarObj.fullCalendar('updateEvent', calEvent);
        //         $this.$modal.modal('hide');
        //         })
        //         .catch(function(reason) {
        //             toastr.error('Fail For Update Schedule');
        //         });
        //     }
        // return false;
        // });
        // $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
        //     $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
        //         return (ev._id == calEvent._id);
        //     });
        //     $this.$modal.modal('hide');
        // });
        // $this.$modal.find('form').on('submit', function () {
        //     calEvent.title = form.find("input[type=text]").val();
        //     $this.$calendarObj.fullCalendar('updateEvent', calEvent);
        //     $this.$modal.modal('hide');
        //     return false;
        // });
    },
    /* Initializing */
    CalendarApp.prototype.init = function() {
        this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());
        var $this = this;
       // displayEventTime : false
        $this.$calendarObj = $this.$calendar.fullCalendar({
            displayEventTime : false,
            allDay: true,
            Time: false,
           // slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
           // minTime: '08:00:00',
           // maxTime: '19:00:00',
            defaultView: 'month',
            handleWindowResize: true,
            height: $(window).height() - 200,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
               // right: 'month,agendaWeek,agendaDay'
            },
            eventSources: [{
                events: function (start, end, timezone, callback) {
                    $.ajax({
                        url: '/schedule/data-list',
                        dataType: "JSON",
                        type: 'GET',
                        data: {
                            month: today.getMonth() + 1
                            , year: today.getFullYear()
                        },
                        async: false,
                        allDay: false,
                        success: function(response){
                            $.each(response.data, function(key, value){
                                event = {
                                    id : value.id,
                                    title : value.title,
                                    start : new Date(value.appointment_date),
                                    className: 'bg-primary',
                                    desc: value.desc,
                                    lat: value.latitude,
                                    long: value.longitude,
                                    status: value.status,
                                    guest: value.guest_name,
                                    refNum: value.ref_number
                                };
                                eventValues.push(event);
                            });
                            callback(eventValues);
                         //    $( document ).ready(function() {
                         //     $('.fc-time').remove();
                         // });
                        },
                        error: function(response){
                            console.log(response);
                            callback(eventValues);
                        }
                    });
                }
            }],
            // events: eventValues,
            editable: true,
            droppable: false, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            eventDrop: function(event, delta, revertFunc) {
                console.log(event);
                console.log(delta);
                console.log(revertFunc);
                // $this.onDrop($(this), date);
            },
            // select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClickTag(calEvent, jsEvent, view); },
            // eventClick: function(calEvent, jsEvent, view) { $this.onSelect(calEvent, jsEvent, view); }

        }).on('click', '.fc-agendaWeek-button, .fc-agendaDay-button', function() {
            $this.$calendar.fullCalendar('refetchEvents');
        });

        //on new event
        this.$saveCategoryBtn.on('click', function(){
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="external-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });
    },

    //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);
