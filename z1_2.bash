
datenow="$(date +%s)"
expdate="$(date +%s -d "+30 days")"

for f in *.cookies; do
    vim "$f"
    host="${f%.*}"
    if [[ "$host" =~ www\. ]]; then
        host="${host#*.}"
    fi

    while read -r line; do
        name="${line%%=*}"
        value="${line#*=}"
        value="${value%%;*}"
#        echo "insert into cookies values($datenow, '$host', '$name', '$value', '/', 0, 0, 0, $datenow, 0,0,1,null,0);"
#    done <"$f" | sqlite3 "${HOME}/.config/google-chrome/Default/Cookies"

        echo "insert into moz_cookies('baseDomain', 'name', 'value', 'host', 'path', 'expiry', 'lastAccessed', 'creationTime', 'isSecure', 'isHttpOnly') values('$host', '$name', '$value', '.$host', '/', $expdate, ${datenow}000000, ${datenow}000000, 0, 0);"
    done <"$f" | sqlite3 "${HOME}/.mozilla/firefox/***.default/cookies.sqlite"
done
