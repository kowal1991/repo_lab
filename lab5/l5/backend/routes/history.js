const {ObjectId} = require('mongodb'); // or ObjectID
const safeObjectId = s => ObjectId.isValid(s) ? new ObjectId(s) : null;

module.exports = function(app, db, sessions) {
    app.get('/history', (req, res) => {
        var session = null;
        if (req.query.session && (session = sessions.getSession(req.query.session))) {
            db.collection("users").findOne({_id: safeObjectId(session.userid)}, (err, result) => {
                if (!err && result !== null) {
                    res.send({transactions: result.transactions});
                } else {
                    res.status(400);
                    res.send(JSON.stringify({error: "Blad: 123"}));
                }
            });
        } else {
            res.status(403);
            res.send(JSON.stringify({error: "Sesja wygasła lub jest niepoprawna"}));
        }
    });
};
