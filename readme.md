## TelecCard Do-Not-Call

1. Install via git into web root
```bash
cd /var/www/html
git clone https://github.com/91Abdullah/dnc.githttps://github.com/91Abdullah/dnc.git
```
2. Install composer dependencies
```bash
composer install
```
3. Copy .env file
```bash
cp .env.example .env
```
4. Create SHA2 key
```bash
php artisan key:generate
```
5. Create MySQL databased named "dnc"
6. Edit .env file and update database credentials
7. Run migrations
```bash
php artisan migrate --seed
```
8. Copy following lines at the end of extensions_custom.conf and change dbuser and dbpass accordingly

```
; ------------------------------------------------------------------------------------------
; DNC LOOKUP - 
; MAKE SURE THE WEB INTERFACE IS INSTALLED FIRST, OR THIS WILL BLOCK ALL OUTBOUND CALLS!!
;
; ALSO DATABASE INFO MUST BE EDITED APPROPRIATELY!!!
; ------------------------------------------------------------------------------------------

[macro-dialout-trunk-predial-hook]
exten => s,1,NOOP(Checking outbound number against do-not-call list)
;The next bunch of lines are extensions whose calls are NOT checked against the DNC list.
;In other words, these extensions can call numbers that are blacklisted for everyone else
exten => s,n,GotoIf($[${REALCALLERIDNUM} = 400]?next)
exten => s,n,GotoIf($[${REALCALLERIDNUM} = 401]?next)
exten => s,n,GotoIf($[${REALCALLERIDNUM} = 402]?next)
exten => s,n,GotoIf($[${REALCALLERIDNUM} = 403]?next)
; This next section checks all outbound calls against the DNC list
; DON'T FORGET TO CHANGE 'password' TO YOUR ACTUAL DNC DATABASE PASSWORD!
exten => s,n,MYSQL(Connect connid localhost dbuser dbpass dnc)  ;this should work with stock PIAF, alter credentials to suit; can check for error condition here for ${conid} = ""
exten => s,n,NoOp(Connected to DNC database with MySql connection id: ${connid})
; The following lines query DNC database and return the number of ocurences of the number to the variable 'count'
exten => s,n,MYSQL(Query resultid ${connid} SELECT count(`id`) FROM `d_n_c_entities` WHERE `number` LIKE '%${OUTNUM:-10}%')
exten => s,n,MYSQL(Fetch fetchid ${resultid} count)
exten => s,n,MYSQL(Clear ${resultid}); can check for error condition here if "${fetchid}" = "0"
exten => s,n,MYSQL(Disconnect ${connid})
exten => s,n,NoOp(Found ${count} occurrences in do-not-call list)
exten => s,n,GotoIf($[${count} = 0]?next)
exten => s,n(begin),Noop(Playing announcement DNC List)
; Play the system recording. MODIFY THIS NEXT LINE IF YOU USE YOUR OWN RECORDING
exten => s,n,Playback(custom/Viktor-DoNotCall,noanswer)
exten => s,n,Noop(number blacklisted, ending call); add whatever you need to alert the caller that the number is blocked
exten => s,n,Hangup() ; or redirect to some other destination
exten => s,n(next),Noop(Not blacklisted, call continues ...)

```
