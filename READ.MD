Database Name :: website

3 Tables :
1.member : 
	uid,  primary key auto increment
	email, varchar
	uname, varchar
	password , varchar

For admin usage :: 
	Username : admin@gmail.com
	Password : admin	


2.Movie :
	mid, primary key auto increment
	name, varchar
	director, varchar
	writer, varchar
	production, varchar
	language, varchar
	release_date, date
	runtime, varchar
	genres, varchar
	cast, varchar
	image, varchar

3.review : 
	mid, number composite references from movie
	uid, number composite references from member
	rate, number
	comment, varchar







