module.exports = function(app, db, sessions) {
    var origins = ["http://127.0.0.1:3000", "http://localhost:3000"];

    app.use((req, res, next) => {
        if (origins.indexOf(req.header("Origin")) >= 0) {
            res.header("Access-Control-Allow-Origin", req.header("Origin"));
        }
        next();
    });

    app.options("/*", function(req, res, next){
        res.header('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, OPTIONS');
        res.header('Access-Control-Allow-Headers', 'Content-Type, Authorization, Content-Length, X-Requested-With');
        res.sendStatus(200);
    });

    require('./login')(app, db, sessions);
    require('./history')(app, db, sessions);
    require('./transfer')(app, db, sessions);

    app.get('/', (req, res) => {
        res.send('hello');
    });

};