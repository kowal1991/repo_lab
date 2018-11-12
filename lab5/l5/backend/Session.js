const crypto = require("crypto");

class Session {
    constructor() {
        this.sessions = {
            "test": {
                userid: "5a0da72f2b89cc3c125eb1ec",
                time: Date.now() + 1000*60*60
            }
        };
    }

    newSession(userid) {
        var hash;
        do {
            hash = crypto.randomBytes(64).base64Slice();
        } while (hash in this.sessions)

        this.sessions[hash] = {
            userid: userid,
            time: Date.now() + 1000*60*10
        };

        return hash;
    }

    getSession(hash) {
        var session = this.sessions[hash];
        if (typeof session != "undefined" && session.time > Date.now()) {
            var newTime = Date.now() + 1000*60*10;
            if (session.time < newTime) {
                session.time = newTime;
            }
            return session;
        }

        return null;
    }
}

module.exports = Session;