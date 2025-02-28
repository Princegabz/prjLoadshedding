<?php

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

// sql to create table
$sql = "CREATE TABLE Loadshedding 
(
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Stage VARCHAR(30) NOT NULL,
    Area VARCHAR(30) NOT NULL,
    Day VARCHAR(30) NOT NULL,
)";
    
    if ($conn->query($sql) === TRUE) 
    {
        echo "Table Loadshedding created successfully";
    } 
    else 
    {
        echo "Error creating table: " . $conn->error;
    }0

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) 
{
  echo "Database created successfully";
} 
else 
{
  echo "Error creating database: " . $conn->error;
}


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
public object[] getUniqueAreas()
{//https://www.csharp-code.com/2013/09/c-example-array-distinct.html
    object[] distinctArrays = arrAreaName.Distinct().ToArray();
    return distinctArrays;
}
public object[] getUniqueDays()
{//https://www.csharp-code.com/2013/09/c-example-array-distinct.html
    object[] distinctArrays = arrDay.Distinct().ToArray();
    return distinctArrays;
}
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
$sql = "INSERT INTO DBLoadshedding (ID, Stage, Area, Day)
VALUES (0, strOutput, areaSelected,arrDay)";

?>