const bcrypt            = require('bcrypt');

module.exports = function(app, db, sessions) {
    app.post('/login', (req, res) => {
        if (req.body.user && req.body.password) {
            db.collection("users").findOne({number: req.body.user}, (err, result) => {
                if (!err && result !== null && bcrypt.compareSync(req.body.password, result.password)) {
                    res.send({sessionId: sessions.newSession(result._id)});
                } else {
                    res.status(403);
                    res.send(JSON.stringify({error: "Nieprawidłowe dane logowania"}));
                }
            });
        } else {
            res.status(403);
            res.send(JSON.stringify({error: "Nieprawidłowe dane logowania"}));
        }
    });
};
