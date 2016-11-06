<script type="text/javascript">

    var socket = {}

    socket.fetchCount = function() {

        $.ajax({

            url: "{{url('/notifications/fetch')}}",
            type: 'post',
            data: { _token: "{{ csrf_token() }}" },
            success: function(count) {
                $("#notification-count").text(count);

                if(count>0){

                    socket.fetchAll();

                }
            }

        });

    }

    socket.fetchAll = function () {

        $.ajax({

            url: "{{url('/notifications/fetchunread')}}",
            type: 'post',
            data: { _token: "{{ csrf_token() }}" },
            success: function(str) {

                $("#notifications").html(str);
            }


        });

    }

    socket.interval = setInterval(socket.fetchCount , 3000);
    socket.fetchCount();


    function markAsRead(){
        var sendData = JSON.stringify({
            hit: true,
            _token: "{{ csrf_token() }}"
        });



        $.ajax({
            url: "{{url('/notifications/markasread')}}",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            type: "POST",
            data: sendData,
            success: function (result) {

                if(result == 200){

                    $("#notification-count").text('0');
                    $("#pending-count").text('0');

                }

            }, error: function (request, status, error) {
                alert(request.responseJSON.Message);
            }
        });



    }



</script>




<li class="dropdown dropdown-extended dropdown-notification dropdown-light" id="header_notification_bar">
    <a onclick="markAsRead();" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
        <i class="icon-bell"></i>
        <span id="notification-count" class="badge badge-default">{{ App\Notification::unreadNotificationsCount() }}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="external">
            <h3>You have
                <strong><span id="pending-count">{{ App\Notification::unreadNotificationsCount() }}</span> pending</strong> Notifications</h3>
            <a href="">view all</a>
        </li>

        <li>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                <ul id="notifications" class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">

                    <?php $notifications = App\Notification::allNotifications()  ?>

                    @if(isset($notifications))

                        @foreach($notifications as $notification)

                            <li>
                                <a href={{ url('/submissions/'.$notification->submission_id  ) }}>

                                                    <span class="details">

                                                        {{--<span class="time">{{ \Carbon\Carbon::parse($notification->sent_at)->diffForHumans() }}</span>--}}

                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span><b> {{ App\User::find($notification->from_user)->name }}</b> {{ $notification->body }}

                                                        <?php $item = new $notification->object_type; ?>
                                                        <b>   {{ $notification->subject  }} </b>


                                                        </span>

                                    <br>
                                </a>
                            </li>
                        @endforeach

                    @else
                        <li>
                            <a href="">
                                <span class="time">Infinite</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> No Notifications </span>
                            </a>
                        </li>
                    @endif

                </ul>

                <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 121.359px; background: rgb(99, 114, 131);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);">

                </div>

            </div>
        </li>
    </ul>
</li>


