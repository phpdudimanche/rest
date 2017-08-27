# Issues

Admin issues, bugs...  
For proof of example : return verb, http-content, data send...

## Create one data

#### Request
UrI : /issues/ 
Verb : POST  
Content-Type : Application/json;charset=UTF-8 
Example :  ( \" in json for windows console )

    curl -i -X POST -H "Accept: application/json" -H "Content-Type: application/json" -d "{\"title\":\"what is it : this thing\",\"description\":\"bug ?\"}" "http://192.168.33.10/api/issues/"

### Response
Content-Type : Application/json;charset=UTF-8   
Success : {"verb":"POST","act":"CreateOneId","type IN":"Application/json","type OUT":"Application/json","id":54673,"title":"what is it : this thing\","description":"bug ?"}  
Fails : {"msg":"error"}  


## Retrieve one data

#### Request
UrI : /issues/{id-issue - 1 to 5 digit}  
Verb : GET  
Content-Type : never mind  
Example :  

    Curl -i http://192.168.33.10/api/issues/54673

### Response
Content-Type : Application/json;charset=UTF-8   
Success : {"verb":"GET","act":"RetrieveOneId","id":54673,"title":"id title","description":"id description"}  
Fails : {"msg":"error"}  

## Update one data

#### Request
UrI : /issues/{id-issue - 1 to 5 digit}  
Verb : PUT  
Content-Type : Application/json;charset=UTF-8   
Constraint : all data except id (not patch)   
Example : ( \" in json for windows console )
 
    curl -X PUT -H "Content-Type: application/json" -d "{\"title\":\"there is really an issue\",\"description\":\"that doesn't work\",\"identification\":\"bug code\",\"resolution\":\"refactoring\",\"status\":\"fixed\"}"   
	"http://192.168.33.10/api/issues/54673"

### Response
Content-Type : Application/json;charset=UTF-8   
Success : {"verb":"PUT","act":"UpdateOneId","type IN":"Application/json","type OUT":"Application/json""id":54673,""title":"there is really an issue","description":"that doesn't work"}  
Fails : {"msg":"error"}  

## Delete one data

#### Request
UrI : /issues/{id-issue - 1 to 5 digit}  
Verb : DELETE  
Content-Type : never mind  
Example : 
 
	Curl -i -X DELETE http://192.168.33.10/api/issues/54673

### Response
Content-Type : Application/json;charset=UTF-8   
Success : {"verb":"POST","act":"CreateOneId","type IN":"Application/json","type OUT":"Application/json","id":54673}  
Fails : {"msg":"error"}  