const {ObjectId} = require('mongodb'); // or ObjectID
const safeObjectId = s => ObjectId.isValid(s) ? new ObjectId(s) : null;

module.exports = function (app, db, sessions) {
    app.post('/transfer', (req, res) => {
        var session = null;
        console.log(req.body);

        if (req.body.account && req.body.title) {
            if (req.body.session && (session = sessions.getSession(req.body.session))) {
                var transaction = {
                    _id: new ObjectId(),
                    account: req.body.account,
                    title: req.body.title
                };

                db.collection("users").updateOne({_id: safeObjectId(session.userid)}, {
                    $push: {
                        transactions: transaction
                    }
                }, {new: true}, (err) => {
                    if (!err) {
                        res.send({account: req.body.account, title: req.body.title});
                    } else {
                        res.status(500);
                        res.send(JSON.stringify({error: "Blad bazy"}));
                    }
                });
            } else {
                res.status(403);
                res.send(JSON.stringify({error: "Sesja wygasła lub jest niepoprawna"}));
            }
        } else {
            res.status(400);
            res.send(JSON.stringify({error: "Nieprawidłowe dane"}));
        }
    });
};
