# SecureWebsiteUsing_php_HTML_MySQL
#localhost credentials defaults to root and password
#make sure that cookies are supported by the browser for better functioning of the session

#repository contains the pdf for Future Work with its class and ER diagram

In this assignment we are going to implement:
1. The register page where the user can enter his/her information and sign up for the 
CapMoments services. 
2. The login page where the user can login to his/her account.
3. The personal dashboard where the user can update their information/purchase more 
storage space or downgrade to the default storage space.
The minimum information that each user should provide to sign up are:
• Name
• Email address
• Phone number
• Username 
• Password
You can also ask the user to provide some other optional information such as date of birth, 
home address and so on based on the business process of your company and the system you 
previously designed.
Note that the same user cannot signup twice.
In order to login to the system the user have to provide correct credentials.
When the user logins to the system he/she will go to the personal dashboard. In the dashboard
the user sees his/her information as well as the amount of assigned storage. The user should be 
able to update some of the information if he/she would like to such as password email address, 
phone number and home address.
Finally, the provided storage space is just a prototype at this stage. The default storage is 3GB 
and the user can upgrade to 5GB in their dashboard. The user should be able to downgrade to 
the default value which is 3GB as well. (Hint: you just need to update the storage value in the 
database based on user’s selection).
