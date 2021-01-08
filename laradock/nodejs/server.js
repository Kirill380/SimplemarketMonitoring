'use strict';


const appmetrics = require('appmetrics');
const monitoring = appmetrics.monitor();
const express = require('express');
const http = require('http');


// Constants
const PORT = 8080;
const HOST = '0.0.0.0';

function newPostReq() {
  return http.request({
    host: 'telegraf',
    port: 8180,
    path: '/write?precision=ms',
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
  }, (res) => {
    console.log(`STATUS: ${res.statusCode}`);
    console.log(`HEADERS: ${JSON.stringify(res.headers)}`);
    res.setEncoding('utf8');
    res.on('data', (chunk) => {
      console.log(`BODY: ${chunk}`);
    });
    res.on('end', () => {
      console.log('No more data in response.');
    });
  });
}

monitoring.on('eventloop', (eventLoop) => {
  const postData = `event_loop_latency min=${eventLoop.latency.min},max=${eventLoop.latency.max},avg=${eventLoop.latency.avg} ${eventLoop.time}`;
  const req = newPostReq();
  req.on('error', (e) => { console.error(`problem with request: ${e.message}`); });
  req.write(postData);
  req.end();
});

monitoring.on('gc', (gc) => {
  const postData = `gc,type=${gc.type} size=${gc.size},used=${gc.used},duration=${gc.duration} ${gc.time}`;

  const req = newPostReq();
  req.on('error', (e) => { console.error(`problem with request: ${e.message}`); });
  req.write(postData);
  req.end();
});


monitoring.on('http', (request) => {
  console.log(request);
  const postData = `http_requests,method=${request.method},url=${request.url},status=${request.statusCode} duration=${request.duration}  ${request.time}`;
  const req = newPostReq();
  req.on('error', (e) => { console.error(`problem with request: ${e.message}`); });
  req.write(postData);
  req.end();
});

// App
const app = express();
app.get('/', (req, res) => {
  res.send('Hello World');
});

app.listen(PORT, HOST);
console.log(`Running on http://${HOST}:${PORT}`);
