<!DOCTYPE html>
<html>

<body>

    <h1>Hello your balance is here:</h1>

    <p id="bal"></p>

    <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
    <script type="text/javascript">
        var socketId;
        var pusher = new Pusher("e0951f610f43e2b73e0f", {});
        
        var channel = pusher.subscribe("254704800563");
        var presenceData = {
            user_id: "1",
            user_info: {
                name: "John Smith"
            }
        };
        pusher.connection.bind("connected", () => {
            socketId = pusher.connection.socket_id;
            console.log(socketId);
        });

        channel.bind('pusher:subscription_succeeded', function () {
            alert("subscription succeeded")
            var triggered = channel.trigger("client-event", {})
            alert("triggered " + triggered)
        })
        channel.bind('pusher:subscription_error', function (error) {
            console.log(error);
            alert("subscription error " + error) //<-- This error gets returned
        })
        channel.bind("balance", (data) => {
            // Method to be dispatched on trigger.

            document.getElementById('bal').innerHTML = data
            alert(data);


        });
    </script>
</body>

</html>