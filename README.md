## About this Microservice    

This MS is for storing files all over the iBial Systems. This consists of 5 endpoints to cater:

- Files (PDF,word,excel, powerpoint)
- Images 
- Videos
- Audio
- Any other files the devs might want to host like JS scripts or CSS

## .ENV file

It should be the same as others except for the following values:

DB_CONNECTION=mysql  
#DB_HOST=127.0.0.1  
DB_HOST=ec2-54-218-169-0.us-west-2.compute.amazonaws.com  
DB_PORT=3306  
DB_DATABASE=ibial_storage
DB_USERNAME=msuser  
DB_PASSWORD=mspassword  

AWS_ACCESS_KEY_ID=AKIAIW2OM5J467ZPIK4Q
AWS_SECRET_ACCESS_KEY=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
AWS_DEFAULT_REGION=us-west-2
AWS_BUCKET=ibialfiles


## API Documentation

Uploading:  

Method: POST  
Link: https://s3storage.ibial.com/api/{end-point}  

Replace {end-point} with:
File:  
- store-file  
    - max: 5MB  
    - type: doc,docx,pdf,txt,ppt,pptx,xls,xlsx  
Image:  
- store-image    
    - max: 10MB  
    - type: jpeg,jpg,bmp,png,gif,svg  
Video:  
- store-video  
    - max: 50MB  
    - type: mp4,mov,ogg,qt  
Audio:  
- store-audio  
    - max: 30MB  
    - type: mp3,wav,mpg,mpeg  
Other:  
- store-other  
    - max: 15MB  
    - type: none  


Body(Multipart-Form):  

user_id : {userid}  
file : {file}  
