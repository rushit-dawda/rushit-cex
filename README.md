CMS Admin & Frontend Part:
1) Downlaod the code & db (rushit-cex.sql) from git hub https://github.com/rushit-dawda/rushit-cex
2) Change the branch to prod/v1
3) Once the code is pasted in the xampp / wamp change the db details
	Go to -> app/etc/local.xml
	Change the details of host/username/password/db 
		<host><![CDATA[localhost]]></host>
		<username><![CDATA[root]]></username>
		<password><![CDATA[root]]></password>
		<dbname><![CDATA[rushit-cex]]></dbname>
4) Once the above steps are setup check the url (http://127.0.0.1/rushit-c/) ( rushit-c = the folder name where the code is copied) 
5) You can place a COD order from front using the above URL. 
6) Admin path will be http://localhost/rushit-c/admin (username: admin / password: admin@123)
7) In the admin you can add the product / category. Currently I have added the 3 categories mentioned in the mail with 2 products in each. Under the manage product section you can add the new product in case you want. 

RESTful API service:
1) The service are written in folder RESTful. 
2) Kindly change the details in RESTful/config.php
3) URL to check the service http://127.0.0.1/rushit-c/api/v1/token/113328592302739/order/all
4) Token - 113328592302739 is static for now. Please do not change it. 
5) Status with Code

All orders valid params: 
URL: http://127.0.0.1/rushit-c/api/v1/token/113328592302739/order/all
status: 200
data: JSON array of orders. 

All orders invalid params: 
URL: http://127.0.0.1/rushit-c/api/v1/token/113328592302739/order/alls
status: 201
msg: Invalid Params. 

URL with order ID: 
URL: http://127.0.0.1/rushit-c/api/v1/token/113328592302739/order/1
status: 200
data: JSON array of that order. 

URL with invalid order ID: 
URL: http://127.0.0.1/rushit-c/api/v1/token/113328592302739/order/1200
status: 201
msg: Invalid OrderID. 
