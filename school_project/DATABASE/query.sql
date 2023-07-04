-- Create a new database called 'noticeboard'
-- Connect to the 'master' database to run this snippet
USE master
GO
-- Create the new database if it does not exist already
IF NOT EXISTS (
    SELECT name
        FROM sys.databases
        WHERE name = N'noticeboard'
)
CREATE DATABASE noticeboard
GO

>> ADMIN TABLE >>

-- Create a new table called 'admins' in schema 'SchemaName'
-- Drop the table if it already exists
IF OBJECT_ID('SchemaName.admins', 'U') IS NOT NULL
DROP TABLE SchemaName.admins
GO
-- Create the table in the specified schema
CREATE TABLE SchemaName.admins
(
    Id INT NOT NULL PRIMARY KEY, -- primary key column
    user_id [INT](20) NOT NULL,
    first_name [NVARCHAR](130) NOT NULL,
    last_name [NVARCHAR](130) NOT NULL,
    email [NVARCHAR](130) NOT NULL,
    last_name [NVARCHAR](130) NOT NULL,
    last_name [NVARCHAR](130) NOT NULL,
    -- specify more columns here

);
GO