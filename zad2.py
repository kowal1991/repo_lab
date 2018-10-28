
import os
import sys

set_cookie_chrome = 'echo "insert into cookies values($datenow,' +  '\'{}\', \'{}\', \'{}\','.format(sys.argv[1], sys.argv[2], sys.argv[3]) + ' \'/\', 0, 0, 0, $datenow, 0,0,1,null,0);"  |  sqlite3 ~/.config/chromium/Default/Cookies'
def main():
	os.system('datenow=\"$(date +%s)\"')
	os.system('expdate=\"$(date +%s -d "+30 days\")\"')
	os.system(set_cookie_chrome)
	print set_cookie_chrome
	

if __name__ == "__main__":
    main()