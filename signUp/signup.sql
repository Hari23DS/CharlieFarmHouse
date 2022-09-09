SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `loginData`(
`uname` VARCHAR(15) PRIMARY KEY,
`pass` VARCHAR(20),
`email` VARCHAR(25) UNIQUE) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    

CREATE TABLE `breedMaintenance` (
`breedId` VARCHAR(50),
`activityDate` DATE,
`activityDone` VARCHAR(500) DEFAULT 'No Data Provided',
`remarks` VARCHAR(1000) DEFAULT 'No Data Provided'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `income` (
`breedId` VARCHAR(50),
`breedType` VARCHAR(50),
`salesDate` date ,
`Quantity` VARCHAR(50),
`salesAmount` INT,
`remarks` VARCHAR(1000) DEFAULT 'No Data Provided'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `materialExpense` (
`productName` VARCHAR(50),
`productUsedFor` VARCHAR(50),
`pDate` date ,
`amount` INT,
`remarks` VARCHAR(1000) DEFAULT 'No Data Provided'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `breedExpense` (
`breedId`  VARCHAR(50) PRIMARY KEY,
`breedType` VARCHAR(50),
`breedName` VARCHAR(50),
`breedCategory` VARCHAR(50),
`gender`  VARCHAR(50),
`dobrpdate`  date ,
`amount`  INT DEFAULT 0,
`remarks` VARCHAR(1000) DEFAULT 'No Data Provided'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `fodderExpense` (
`fodderName` VARCHAR(50),
`incomeDate` date ,
`quantity` VARCHAR(50),
`amount` INT,
`remarks` VARCHAR(1000) DEFAULT 'No Data Provided'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `labourExpense` (
`breedId` VARCHAR(50),
`natureOfWork` VARCHAR(100) DEFAULT 'Unknown',
`dateLabour` date ,
`puechaseAmount` INT DEFAULT 0,
`remarks` VARCHAR(1000) DEFAULT 'Unknown'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `treatementExpense` (
`breedType` VARCHAR(100) DEFAULT 'Unknown',
`dateTreatment` date ,
`treatmentGiven` VARCHAR(100) DEFAULT 'Unknown',
`quantity` VARCHAR(100) DEFAULT 'Unknown',
`puechaseAmount` INT DEFAULT 0,
`remarks` VARCHAR(1000) DEFAULT 'Unknown'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;