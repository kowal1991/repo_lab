#!/usr/bin/env bash
set -e

declare -A domain2ip
declare -A ip2domain

parsedump() {
    i=0

    while read -r line; do
        i=$((i+1))
        if [[ "$line" =~ ^[0-9] ]]; then
            host="$(echo $line | awk '{print $3}')"
        elif [[ "$line" =~ ^Set-Cookie: ]]; then
            echo "${line#* }" >> "${ip2domain[$host]}.cookies"
        fi
    done
}

todate() {
    echo $(($1 + 11644473600))000000
}

for host in $@; do
    ip_addr="$(dig +short $host | tail -n1)"
    [[ -z "$ip_addr" ]] && continue

    domain2ip["$host"]="$ip_addr"
    ip2domain["$ip_addr.80"]="$host"
done

[[ -z "${domain2ip[*]}" ]] && echo gimme site && exit

args="src host $(echo "${domain2ip[*]}" | sed 's/ / or src host /g')"
echo $args
sudo tcpdump -s 0 -n "(src port 80) and ($args)" -A | parsedump
