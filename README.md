# Loadshedding Management System - README

## Overview
This project sets up a basic loadshedding management system, involving PHP, MySQL, and C#. The system creates and manages a database for loadshedding information, including stage levels, affected areas, and schedules.

## Technologies Used
- PHP
- MySQL
- C#

## Database Setup

### Database Connection
```php
$servername = "localhost";
$username = "root";
$password = "@Dvtech123!";
$dbname = "DBLoadshedding";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
```
This section establishes a connection to the MySQL server using PHP’s `mysqli` class.

### Database Creation
```php
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE)
{
  echo "Database created successfully";
}
else
{
  echo "Error creating database: " . $conn->error;
}
```
A new database named `myDB` is created if it doesn’t exist.

### Table Creation
```php
$sql = "CREATE TABLE Loadshedding
(
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Stage VARCHAR(30) NOT NULL,
    Area VARCHAR(30) NOT NULL,
    Day VARCHAR(30) NOT NULL
)";
    
if ($conn->query($sql) === TRUE)
{
    echo "Table Loadshedding created successfully";
}
else
{
    echo "Error creating table: " . $conn->error;
}
```
A table called `Loadshedding` is created with fields for `ID`, `Stage`, `Area`, and `Day`.

## C# Class for Loadshedding Data Management

### Class Properties
```csharp
private object[] arrAreaName;
private object[] arrStage1;
private object[] arrStage2;
private object[] arrStage3;
private object[] arrStage4;
private object[] arrDay;
private int iCount = 0;
private int iSize;
public string areaSelected = "";
public string stage = "";
```
These properties manage the loadshedding data in arrays.

### Constructor
```csharp
public Area(int iSize)
{
    this.iSize=iSize;
    arrStage1 = new object[iSize];
    arrStage2 = new object[iSize];
    arrStage3 = new object[iSize];
    arrStage4 = new object[iSize];
    arrDay = new object[iSize];
    arrAreaName = new object[iSize];
}
```
Initializes arrays based on the size provided.

### Data Insertion
```csharp
public void Push(object stage1, object stage2, object stage3, object stage4, object day, object name)
{
    arrStage1[iCount] = stage1;
    arrStage2[iCount] = stage2;
    arrStage3[iCount] = stage3;
    arrStage4[iCount] = stage4;
    arrDay[iCount] = day;
    arrAreaName[iCount] = name;
    iCount++;
}
```
Pushes new data into the arrays.

### Get Unique Areas and Days
```csharp
public object[] getUniqueAreas()
{
    object[] distinctArrays = arrAreaName.Distinct().ToArray();
    return distinctArrays;
}

public object[] getUniqueDays()
{
    object[] distinctArrays = arrDay.Distinct().ToArray();
    return distinctArrays;
}
```
Fetches unique areas and days.

### Get Loadshedding Data
```csharp
public string getData()
{
    string strOutput = "";
    if (areaSelected.Length > 0 && stage.Length > 0)
    {
        for (int i = 0; i < iCount; i++)
        {
            if (arrAreaName[i].Equals(areaSelected))
            {
                strOutput += "Day: " + arrDay[i] + " Loadsheding at: ";
                if (stage.Equals("1"))
                {
                    strOutput += arrStage1[i];
                }
                else if (stage.Equals("2"))
                {
                    strOutput += arrStage2[i];
                }
                else if (stage.Equals("3"))
                {
                    strOutput += arrStage3[i];
                }
                else if (stage.Equals("4"))
                {
                    strOutput += arrStage4[i];
                }
                strOutput += "\n";
            }
        }
    }
    return strOutput;
}
```
Fetches and formats loadshedding data.

### Insert Data into Database
```php
$sql = "INSERT INTO DBLoadshedding (ID, Stage, Area, Day)
VALUES (0, strOutput, areaSelected, arrDay)";
```
Inserts collected data into the MySQL database.

