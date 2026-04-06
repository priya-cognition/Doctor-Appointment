<?php

$conn = mysqli_connect("localhost", "root", "Your_Mysql_password", "hospital");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "create table patient( patientID varchar(20) not null, pname varchar(50) not null, age float(5),gender varchar(10), address varchar(70), phone varchar(15), pimage varchar(50),primary key(patientID))");

mysqli_query($conn, "create table doctor( doctorID varchar(20) not null, dname varchar(50) not null, address varchar(70), phoneno varchar(15), gender varchar(10), password varchar(15),dimage varchar(50),primary key (doctorID))");

mysqli_query($conn, "create table report( reportID varchar(20) not null, patientID varchar(20)not null,date date, time time, reportf varchar (100), primary key (reportID),foreign key(patientID)references patient(patientID))");

mysqli_query($conn, "create table appointment( patientID varchar(20) not null, doctorID varchar(20)not null, app_no varchar(20) not null, date date, time time, primary key(doctorID, app_no), foreign key(patientID) references patient(patientID), foreign key(doctorID) references doctor(doctorID))");

mysqli_query($conn, "create table history(patientID varchar(20) not null, doctorID varchar(20) not null, details varchar(150), date date, time time,foreign key(patientID) references patient(patientID), foreign key(doctorID) references doctor(doctorID))");

mysqli_query($conn, "create table docDays(doctorID varchar(20), days varchar(100),time time,primary key (doctorID,days),foreign key(doctorID) references doctor(doctorID))"); 

?>
