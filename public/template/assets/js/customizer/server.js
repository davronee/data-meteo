var socket = require('socket.io'),
    express = require('express'),
    http = require('http'),
    logger = require('winston'),
    bodyParser = require('body-parser'),
    port = 3001;

var app = express();
var server = http.createServer(app);
var io = socket(server, {
	cors: {
		origin: '*'
	}
});

logger.remove(logger.transports.Console);
logger.add(new logger.transports.Console, {colorize: true, timestamp: true});
logger.info('Socket server: listening port ' + port);

app.use(bodyParser.json());

app.post('/emit/:event/', function(req, res) {
    var event = req.params.event;
    var data = req.body;

    io.emit(event, data);
});

io.sockets.on('connection', function(client) {
	console.log("Connected!");

	client.on('notification', function(data) {
		io.sockets.emit('notification', data);
	});
});

server.listen(port);
