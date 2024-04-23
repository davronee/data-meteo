var socket = io.connect('http://localhost:3001');

socket.on('connect', function () {
    console.log('connected');

    socket.on('notification', function(data) {
        console.log(data);
        // TODO: load new notifications and add to the header
    });

    socket.on('disconnect', function () {
        socket.removeAllListeners('notification');
        socket.removeAllListeners('disconnect');
    });
});
