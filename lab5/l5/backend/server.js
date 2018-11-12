const express           = require('express');
const MongoClient       = require('mongodb').MongoClient;
const bodyParser        = require('body-parser');

const app            = express();

const port = 4000;
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

const session = require('./Session');

var sessions = new session();

MongoClient.connect("mongodb://127.0.0.1:27017/bkl4", (err, database) => {
    if (err) return console.log(err);
    require('./routes')(app, database, sessions);

    app.listen(port, () => {
        console.log('We are live on ' + port);
    });
})