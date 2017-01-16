@include('sider-ketua-lokaliti')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Jadual Bancian
            <small>Jadual Bancian</small>
          </h1>
          <ol class="breadcrumb">
                <li><a href="{{ url('/ketuaLokaliti') }}"><i class="fa fa-dashboard"></i> Utama</a></li>
                <li><a href="{{ url('/calendar') }}">Daftar Jadual Bancian</a></li>
                <li class="active">Pendaftaran Jadual Bancian</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-5">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Daftar Jadual Bancian</h4>
                </div>
                <div class="box-body">

                  @if (count($errors) > 0)
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                  @endif
                  <form class="form-horizontal" method="POST" action= "{{ URL('daftar-bancian') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-horizontal" >
                          <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Pembanci</label>
                              <div class="col-sm-10">
                                <select class="form-control m-bot15" name="pembanci" id="pembanci" required>
                                  <option value=""> Sila Pilih </option>
                                  @foreach($kawasanbancian as $key => $value)
                                  <?php
                                      $table1 = DB::table('users')->where('id', $value->user_id)->first();
                                      $table2 = DB::table('jadual_bancians')->where('pembanci_id', $value->user_id)->first();
                                      if($table2 == null) {
                                  ?>
                                    <option value="{{$table1->name}}"> {{$table1->name}} </option>
                                  <?php } else if( $table2->status != "Dalam Proses" AND $table2->status != "Dihantar") { ?>
                                   <option value="{{$table1->name}}"> {{$table1->name}} </option>
                                   <?php } ?>
                                @endforeach
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Kawasan Bancian</label>
                              <div class="col-sm-10">
                                <select class="form-control m-bot15" name="kawasan" id="kawasan">
                                    <option value=""> Kawasan Bancian </option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputName" class="col-sm-2 control-label">Tarikh Mula</label>
                              <div class="col-sm-10">
                                  <input type="date" name="mula" class="form-control" id="inputName" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputExperience" class="col-sm-2 control-label">Tarikh Tamat</label>
                              <div class="col-sm-10">
                                  <input type="date" name="akhir" class="form-control" id="inputSkills" required>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-pencil">Daftar</button>
                            </div>
                          </div>
                        </div>
                      </form>
                </div><!-- /.box-body -->
              </div>
            </div><!-- /.col -->
            <div class="col-md-7">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> 1.0
        </div>
        <strong>Hak Cipta  &copy; 2016</strong> HAMMADI ZHORIF MOHD YUSOB.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ url('/eAedesEx/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ url('/eAedesEx/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{ url('/eAedesEx/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('/eAedesEx/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/eAedesEx/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('/eAedesEx/dist/js/demo.js') }}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ url('/eAedesEx/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'hari ini',
            month: 'bulan',
            week: 'minggu',
            day: 'hari'
          },
          //Random default events
          events: [
            //hzhorif
            // {
            //   title: 'All Day Event',
            //   start: new Date(y, m, 1),
            //   backgroundColor: "#f56954", //red
            //   borderColor: "#f56954" //red
            // },
            // {
            //   title: 'Long Event',
            //   start: new Date(y, m, d - 5),
            //   end: new Date(y, m, d - 2),
            //   backgroundColor: "#f39c12", //yellow
            //   borderColor: "#f39c12" //yellow
            // },
            // {
            //   title: 'Meeting',
            //   start: new Date(y, m, d, 10, 30),
            //   allDay: false,
            //   backgroundColor: "#0073b7", //Blue
            //   borderColor: "#0073b7" //Blue
            // },
            // {
            //   title: 'Lunch',
            //   start: new Date(y, m, d, 12, 0),
            //   end: new Date(y, m, d, 14, 0),
            //   allDay: false,
            //   backgroundColor: "#00c0ef", //Info (aqua)
            //   borderColor: "#00c0ef" //Info (aqua)
            // },
            // {
            //   title: 'Birthday Party',
            //   start: new Date(y, m, d + 1, 19, 0),
            //   end: new Date(y, m, d + 1, 22, 30),
            //   allDay: false,
            //   backgroundColor: "#00a65a", //Success (green)
            //   borderColor: "#00a65a" //Success (green)
            // },
            // {
            //   title: 'Click for Google',
            //   start: new Date(y, m, 28),
            //   end: new Date(y, m, 29),
            //   url: 'http://google.com/',
            //   backgroundColor: "#3c8dbc", //Primary (light-blue)
            //   borderColor: "#3c8dbc" //Primary (light-blue)
            // }
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
    </script>
    <script>
      $('#calendar').fullCalendar({
        events: [
          @foreach($jadualbanci as $jadual)
          {
            <?php $table = DB::table('users')->where('id', $jadual->pembanci_id)->first();?>
            title: '{!! $table->name !!}',
            start: '{!! $jadual->tarikh_mula !!}',
            end: '{!! $jadual->tarikh_akhir !!}'
          },
          @endforeach
        ]
      });
    </script>
    <script>
        $('#pembanci').on('change', function(e){

            var state_id = e.target.value;

            $.get('/dropdown?pembanci=' + state_id, function(data) {

                $('#kawasan').empty();
                // $('#kawasan').append('<option value="">Sila pilih satu</option>');
                $.each(data, function(index,subcategories){
                    $('#kawasan').append('<option value="' + subcategories.nama +'">' + subcategories.nama + '</option>');
                });
            });
        });
    </script>
  </body>
</html>
