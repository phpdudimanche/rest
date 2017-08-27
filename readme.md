#  This a pattern for all REST PHP API

This is just an example, a good practice, i hope.  
I made a server APP from scratch, in order to make a POC.  
The use is detailed in this [api](api.md)

## Repertory structure ##

- **API/** dir or endpoint entry
	- .htaccess (for apache) : catch and redirect traffic, and links to bootstrap
	- composer.json : dependency library with PSR support for inclusion by namespace
	- **public/** dir
		- bootsrap.php : include lib, call API
	- **src/** dir
		- **Controller/** dir
			- Class file
		- **Model/** dir
			- Class file
		- No **src/View/** dir : this a webservice, so content without design.
	- **test/** dir with different framework test : phpunit, codeception, behat, atoum
	- **client/** dir with three client mod : curl, http, and guzzle (guzzle with vendor lib)
- **vendor/** dir, external composer lib and packages

## Source Code usage ##

Same file name and class name in Controller/ and Model/ directory  
In method name, we can recognize progress : Get... HTTP verb in Controller and Retrieve.. CRUD in Model.  
So, in a tab :

<table>
<th>Controller method prefix</th><th>Model method prefix</th>
<tr><td>Post</td><td>Create</td></tr>
<tr><td>Get</td><td>Retrieve</td></tr>
<tr><td>Put</td><td>Update</td></tr>
<tr><td>Delete</td><td>Delete</td></tr>
<th>Controller method prefix</th><th>Model method prefix</th>
</table>

## Test Usage ##

Params for your url base can be changed in /test/codeception/tests/api.suite.yml.  
Bad habit (see atoum bug), param for url is used as global in /test/params.php.

### Client ###
Just visit thes pages : client/[curl|guzzle|http]-client.php.  

### Phpunit ###
To run phpunit test (from root with phpunit.xml /test/) :  
C:\wamp64\bin\php\php5.6.25\php.exe C:\www\rest\vendor\phpunit\phpunit\phpunit

### Codeception ###
To run codeception test (from /test/codeception) :  
C:\wamp64\bin\php\php5.6.25\php.exe C:\www\rest\vendor\codeception\codeception\codecept run api --no-ansi

### Behat ###
To run behat test (from root with features dir /test/behat/) :  
C:\wamp64\bin\php\php5.6.25\php.exe C:\www\rest\vendor\behat\behat\bin\behat

### Atoum ###
To run atoum, from where you want (target test with -d) :  
C:\wamp64\bin\php\php5.6.25\php.exe C:\www\rest\vendor\atoum\atoum\bin\atoum -d C:\www\rest\test\atoum  
*Bug with globals* : tests run twice (and "atoum/phpunit-extension" for "@backupGlobals disabled" are not supported in my php-version)



