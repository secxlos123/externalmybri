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
    var ajx = $.ajax({
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
             var id;
             var title;
             var start;
             var className;
             var desc;
             var lat;
             var long;
             var status;
             var guest;
             var refNum;
            console.log("====didieu====");
            console.log(response.data);
            $.each(response.data, function(key, value){
              var event = {
                    id : value.id,
                    title : value.title,
                    start : new Date(value.appointment_date),
                    className: 'bg-primary',
                    desc: value.desc,
                    lat: value.latitude,
                    long: value.longitude,
                    status: value.status,
                    guest: value.guest_name,
                    refNum: value.ref_number,
                    address: value.address
                }
                eventValues.push(event);
                console.log(event);
            });
        },
        error: function(response){
            console.log("=====eror=response=====");
            console.log(response);
        }
    });

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
        if(calEvent.desc == '-'){
            $("textarea[name='description']").val(calEvent.address);    
        }else{
            $("textarea[name='description']").val(calEvent.desc || '');
        }
        $("input[name='lng']").val(calEvent.long || '');
        $("input[name='lat']").val(calEvent.lat || '');
        $("input[name='id_schedule']").val(calEvent.id || '');
       
    },
    /* Initializing */
    CalendarApp.prototype.init = function() {
        // this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());
        var $this = this;
       
        $this.$calendarObj = $this.$calendar.fullCalendar({
            displayEventTime : false,
            allDay: false,
            Time: false,
            defaultView: 'month',
            handleWindowResize: true,
            height: $(window).height() - 200,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
        
            },
            events: eventValues,
            editable: true,
            droppable: false, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            eventDrop: function(event, delta, revertFunc) {
                console.log(event);
                console.log(delta);
                console.log(revertFunc);
     
            },
            // select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClickTag(calEvent, jsEvent, view); },
            // eventClick: function(calEvent, jsEvent, view) { $this.onSelect(calEvent, jsEvent, view); }

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