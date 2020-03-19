-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 08:22 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting_hussains`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `accountName` text NOT NULL,
  `accountCategory` varchar(50) NOT NULL,
  `accountCategorySub` varchar(50) NOT NULL,
  `accountSide` varchar(25) NOT NULL,
  `accountBalance` decimal(10,2) NOT NULL,
  `accountDebit` decimal(10,2) NOT NULL,
  `accountCredit` decimal(10,2) NOT NULL,
  `accountOrder` int(11) NOT NULL,
  `accountStatus` int(1) NOT NULL DEFAULT '1',
  `accountStatement` varchar(50) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `accountCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountID`, `userID`, `accountName`, `accountCategory`, `accountCategorySub`, `accountSide`, `accountBalance`, `accountDebit`, `accountCredit`, `accountOrder`, `accountStatus`, `accountStatement`, `created_by`, `accountCreationDate`) VALUES
(100, 1000009, 'Property, plant and equipment', 'Assets', 'Non Current Assets', 'Debit', '0.00', '2975000.00', '100000.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 11:17:49'),
(101, 1000009, 'Capital work-in-progress', 'Assets', 'Non Current Assets', 'Debit', '0.00', '0.00', '0.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:17:25'),
(102, 1000009, 'Inventory', 'Assets', 'Current Assets', 'Debit', '0.00', '35750.00', '0.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:18:38'),
(103, 1000009, 'Advance, deposits and prepayments ', 'Assets', 'Current Assets', 'Debit', '0.00', '300000.00', '130005.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:19:12'),
(105, 1000009, 'Cash at Bank -Habib Bank', 'Assets', 'Current Assets', 'Debit', '0.00', '4600000.00', '5767500.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:20:47'),
(106, 1000009, 'Cash at Bank -City Bank', 'Assets', 'Current Assets', 'Debit', '0.00', '100000.00', '100000.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:21:09'),
(107, 1000009, 'Cost of Sales', 'Expenses', 'Expenses', 'Debit', '0.00', '0.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-16 11:10:05'),
(109, 1000009, 'Sales and marketing expenses ', 'Expenses', 'Expenses', 'Debit', '0.00', '475000.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-16 11:12:57'),
(110, 1000009, 'Financial Expenses ', 'Expenses', 'Expenses', 'Debit', '0.00', '1750.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-16 11:15:15'),
(111, 1000009, 'Income Tax expenses', 'Expenses', 'Expenses', 'Debit', '0.00', '0.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-16 11:15:56'),
(112, 1000009, 'VAT', 'Expenses', 'Expenses', 'Debit', '0.00', '0.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 07:54:56'),
(113, 1000009, 'CD/SD', 'Expenses', 'Expenses', 'Debit', '0.00', '0.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 07:55:24'),
(114, 1000009, 'TDS/WHT', 'Expenses', 'Expenses', 'Debit', '0.00', '0.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 07:55:45'),
(115, 1000009, 'Depreciation ', 'Expenses', 'Expenses', 'Debit', '0.00', '535000.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 10:45:13'),
(116, 1000009, 'Office Rent', 'Expenses', 'Expenses', 'Debit', '0.00', '1030005.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 10:50:02'),
(117, 1000009, 'Salary', 'Expenses', 'Expenses', 'Debit', '0.00', '475000.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 10:54:32'),
(118, 1000009, 'Printing and Stationery', 'Expenses', 'Expenses', 'Debit', '0.00', '13000.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 10:55:28'),
(119, 1000009, 'Networking', 'Expenses', 'Expenses', 'Debit', '0.00', '207000.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 10:56:25'),
(120, 1000009, 'Administrative Expenses ', 'Expenses', 'Expenses', 'Debit', '0.00', '450000.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 11:01:38'),
(121, 1000009, 'Utilities', 'Expenses', 'Expenses', 'Debit', '0.00', '35000.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-18 11:03:17'),
(200, 1000009, 'Share Capital', 'Owners Equity', 'Shareholders\' Equity', 'Credit', '0.00', '0.00', '100000.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:21:58'),
(201, 1000009, 'Share money deposit', 'Owners Equity', 'Shareholders\' Equity', 'Credit', '0.00', '0.00', '2500000.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:22:37'),
(202, 1000009, 'Retained earnings', 'Owners Equity', 'Shareholders\' Equity', 'Credit', '0.00', '0.00', '0.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:25:35'),
(203, 1000009, 'Bank Loan', 'Liabilities', 'Non Current Liabilities', 'Credit', '0.00', '0.00', '0.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:26:09'),
(204, 1000009, 'Long term liabilities', 'Liabilities', 'Non Current Liabilities', 'Credit', '0.00', '0.00', '0.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:26:55'),
(205, 1000009, 'Trade and other payables', 'Liabilities', 'Current Liabilities', 'Credit', '0.00', '0.00', '0.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:28:05'),
(206, 1000009, 'Liabilities for expenses ', 'Liabilities', 'Current Liabilities', 'Credit', '0.00', '0.00', '0.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-16 09:28:53'),
(207, 1000009, 'Revenue', 'Revenues', 'Revenues', 'Credit', '0.00', '0.00', '2000000.00', 0, 1, 'Income Statement', 1000009, '2020-03-16 11:06:58'),
(208, 1000009, 'Other income', 'Revenues', 'Income', 'Credit', '0.00', '0.00', '0.00', 0, 1, 'Income Statement', 1000009, '2020-03-16 11:14:24'),
(209, 1000009, 'Accumulated Depreciation', 'Liabilities', 'Non Current Liabilities', 'Credit', '0.00', '0.00', '535000.00', 0, 1, 'Balance Sheet', 1000009, '2020-03-18 10:39:08'),
(101, 1000006, 'Property, plant and equipment', 'Assets', 'Current Assets', 'Debit', '0.00', '0.00', '0.00', 0, 1, 'Balance Sheet', 1000006, '2020-03-19 18:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_categories`
--

CREATE TABLE `accounts_categories` (
  `categoryID` bigint(20) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `categoryDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_categories_sub`
--

CREATE TABLE `accounts_categories_sub` (
  `subCategoryID` bigint(20) NOT NULL,
  `categoryID` bigint(20) NOT NULL,
  `subCategoryName` varchar(50) NOT NULL,
  `subCategoryDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `entryID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `entryDescription` text NOT NULL,
  `entryType` varchar(20) NOT NULL,
  `entryDebitAccount` text NOT NULL,
  `entryDebitBalance` text NOT NULL,
  `entryCreditAccount` text NOT NULL,
  `entryCreditBalance` text NOT NULL,
  `entryStatus` int(1) NOT NULL DEFAULT '0',
  `entryStatusComment` text,
  `created_by` int(11) DEFAULT NULL,
  `entryCreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`entryID`, `userID`, `entryDescription`, `entryType`, `entryDebitAccount`, `entryDebitBalance`, `entryCreditAccount`, `entryCreditBalance`, `entryStatus`, `entryStatusComment`, `created_by`, `entryCreateDate`) VALUES
(10000069, 1000009, 'Fixed asset purchase ', 'Initial', '[\"100\"]', '[\"2875000\"]', '[\"105\"]', '[\"2875000\"]', 1, NULL, 1000009, '2020-03-16 11:19:29'),
(10000070, 1000009, 'Fixed asset purchase ', 'Initial', '[\"100\"]', '[\"100000\"]', '[\"106\"]', '[\"100000\"]', 1, NULL, 1000009, '2020-03-16 11:50:34'),
(10000072, 1000009, 'Fixed asset purchase', 'Adjusting', '[\"106\"]', '[\"100000\"]', '[\"100\"]', '[\"100000\"]', 1, NULL, 1000009, '2020-03-18 10:07:49'),
(10000074, 1000009, 'Depreciation', 'Initial', '[\"115\"]', '[\"535000\"]', '[\"209\"]', '[\"535000\"]', 1, NULL, 1000009, '2020-03-18 10:45:53'),
(10000075, 1000009, 'Inventory ', 'Initial', '[\"102\"]', '[\"35750\"]', '[\"105\"]', '[\"35750\"]', 1, NULL, 1000009, '2020-03-18 10:46:52'),
(10000076, 1000009, 'Advance Deposit Pre Payment', 'Initial', '[\"103\"]', '[\"300000\"]', '[\"105\"]', '[\"300000\"]', 1, NULL, 1000009, '2020-03-18 10:47:59'),
(10000077, 1000009, 'Office Rent', 'Adjusting', '[\"116\"]', '[\"130005\"]', '[\"103\"]', '[\"130005\"]', 1, NULL, 1000009, '2020-03-18 10:50:59'),
(10000078, 1000009, 'Share Capital', 'Initial', '[\"105\"]', '[\"100000\"]', '[\"200\"]', '[\"100000\"]', 1, NULL, 1000009, '2020-03-18 10:51:50'),
(10000079, 1000009, 'Share money deposit', 'Initial', '[\"105\"]', '[\"2500000\"]', '[\"201\"]', '[\"2500000\"]', 1, NULL, 1000009, '2020-03-18 10:52:40'),
(10000080, 1000009, 'Sales ', 'Initial', '[\"105\"]', '[\"2000000\"]', '[\"207\"]', '[\"2000000\"]', 1, NULL, 1000009, '2020-03-18 10:53:33'),
(10000081, 1000009, 'Salary', 'Initial', '[\"117\"]', '[\"475000\"]', '[\"105\"]', '[\"475000\"]', 1, NULL, 1000009, '2020-03-18 10:57:19'),
(10000082, 1000009, 'Printing and Stationery ', 'Initial', '[\"118\"]', '[\"13000\"]', '[\"105\"]', '[\"13000\"]', 1, NULL, 1000009, '2020-03-18 10:58:59'),
(10000083, 1000009, 'Business Development Expenses ', 'Initial', '[\"119\"]', '[\"207000\"]', '[\"105\"]', '[\"207000\"]', 1, NULL, 1000009, '2020-03-18 10:59:57'),
(10000084, 1000009, 'Administrative Expenses ', 'Initial', '[\"120\"]', '[\"450000\"]', '[\"105\"]', '[\"450000\"]', 1, NULL, 1000009, '2020-03-18 11:02:11'),
(10000085, 1000009, 'Office Rent', 'Initial', '[\"116\"]', '[\"900000\"]', '[\"105\"]', '[\"900000\"]', 1, NULL, 1000009, '2020-03-18 11:02:54'),
(10000086, 1000009, 'Utility', 'Initial', '[\"121\"]', '[\"35000\"]', '[\"105\"]', '[\"35000\"]', 1, NULL, 1000009, '2020-03-18 11:03:49'),
(10000087, 1000009, 'Sales Expenses ', 'Initial', '[\"109\"]', '[\"475000\"]', '[\"105\"]', '[\"475000\"]', 1, NULL, 1000009, '2020-03-18 11:04:46'),
(10000088, 1000009, 'Bank Charge ', 'Closing', '[\"110\"]', '[\"1750\"]', '[\"105\"]', '[\"1750\"]', 1, NULL, 1000009, '2020-03-18 11:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `logType` varchar(25) NOT NULL,
  `logBefore` text NOT NULL,
  `logAfter` text NOT NULL,
  `logDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `userID`, `logType`, `logBefore`, `logAfter`, `logDate`) VALUES
(10000001, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userID\":\"1000003\"}', '2019-10-08 20:58:43'),
(10000002, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 21:03:02'),
(10000003, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountants\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 21:16:02'),
(10000004, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountants\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 21:16:05'),
(10000005, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userID\":\"1000003\"}', '2019-10-08 21:16:14'),
(10000006, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userID\":\"1000003\"}', '2019-10-08 21:16:16'),
(10000007, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"10\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Managers\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"10\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:01'),
(10000008, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Managers\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"10\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"10\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:04'),
(10000009, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"10\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:35'),
(10000010, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"20\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:38'),
(10000011, 1000003, 'admin', '{\"userID\":\"1000002\",\"userEmail\":\"manager@test.com\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 14:15:02\",\"userCreationDate\":\"2019-09-19 14:15:02\",\"userRole\":\"20\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"10\",\"userActive\":\"1\",\"userID\":\"1000002\"}', '2019-10-08 21:56:41'),
(10000012, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountants\",\"userLastName\":\"Persons\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"10\",\"userActive\":\"0\",\"userID\":\"1000001\"}', '2019-10-08 22:00:57'),
(10000013, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountants\",\"userLastName\":\"Persons\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"10\",\"userActive\":\"0\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountants@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 22:01:09'),
(10000014, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountants@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000001\"}', '2019-10-08 22:01:13'),
(10000015, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userPassword\":\"9839bdd0ed4842dab367036fa233d871\",\"userID\":\"1000001\"}', '2019-10-08 22:01:22'),
(10000016, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"9839bdd0ed4842dab367036fa233d871\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userPassword\":\"c2391dedefcd683e3c5e5c50f5ef9615\",\"userID\":\"1000001\"}', '2019-10-08 22:01:33'),
(10000046, 1000003, 'admin', '{\"userID\":\"1000001\",\"userEmail\":\"accountant@test.com\",\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userPassword\":\"c2391dedefcd683e3c5e5c50f5ef9615\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":null,\"userPasswordDate\":\"2019-09-19 13:18:18\",\"userCreationDate\":\"2019-09-19 13:18:18\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null}', '{\"userFirstName\":\"Accountant\",\"userLastName\":\"Person\",\"userEmail\":\"accountant@test.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userPassword\":\"519524d3e2c7de2020f4cca2ae373b5b\",\"userID\":\"1000001\"}', '2019-10-13 22:09:23'),
(10000047, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userPassword\":\"6a0c60f307c789f24b3b65a88e04dbf4\",\"userID\":\"1000003\"}', '2019-10-25 20:18:37'),
(10000048, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userPassword\":\"985de320ae9dc7cb28692edd5b3afa72\",\"userID\":\"1000003\"}', '2019-10-25 20:19:03'),
(10000049, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admin\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userID\":\"1000003\"}', '2019-10-25 20:20:11'),
(10000052, 1000002, 'users', '{\"userID\":\"1000002\",\"userName\":\"MPerson0919\",\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userRole\":\"10\"}', '{\"userFirstName\":\"Manager\",\"userLastName\":\"Person\",\"userEmail\":\"manager@test.com\",\"userPassword\":\"5980ba484aeddde546d5e79eb893dc58\",\"userID\":\"1000002\"}', '2019-10-25 22:30:31'),
(10000053, 1000003, 'users', '{\"userID\":\"1000003\",\"userName\":\"APerson0919\",\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userRole\":\"20\"}', '{\"userFirstName\":\"Admins\",\"userLastName\":\"Person\",\"userEmail\":\"administrator@test.com\",\"userPassword\":\"985de320ae9dc7cb28692edd5b3afa72\",\"userID\":\"1000003\"}', '2019-10-25 22:31:21'),
(10000054, 1000002, 'entries', '10000013', 'Created', '2019-10-31 00:30:56'),
(10000055, 1000002, 'entries', '10000014', 'Created', '2019-10-31 00:31:54'),
(10000056, 1000002, 'entries', '10000015', 'Created', '2019-10-31 00:32:19'),
(10000057, 1000002, 'entries', '10000016', 'Created', '2019-10-31 00:32:39'),
(10000058, 1000002, 'entries', '10000017', 'Created', '2019-10-31 00:32:59'),
(10000059, 1000002, 'entries', '10000018', 'Created', '2019-10-31 00:33:25'),
(10000060, 1000002, 'entries', '10000019', 'Created', '2019-10-31 00:33:58'),
(10000061, 1000002, 'entries', '10000020', 'Created', '2019-10-31 00:34:20'),
(10000062, 1000002, 'entries', '10000021', 'Created', '2019-10-31 00:34:46'),
(10000063, 1000002, 'entries', '10000022', 'Created', '2019-10-31 00:35:13'),
(10000064, 1000002, 'entries', '10000023', 'Created', '2019-10-31 00:35:13'),
(10000065, 1000002, 'entries', '10000023', 'Rejected: Duplicate Entry', '2019-10-31 00:35:22'),
(10000066, 1000002, 'entries', '10000024', 'Created', '2019-10-31 00:35:43'),
(10000067, 1000002, 'entries', '10000025', 'Created', '2019-10-31 00:36:02'),
(10000068, 1000002, 'entries', '10000026', 'Created', '2019-10-31 00:36:26'),
(10000069, 1000002, 'entries', '10000027', 'Created', '2019-10-31 00:37:00'),
(10000070, 1000002, 'entries', '10000028', 'Created', '2019-10-31 00:37:17'),
(10000071, 1000002, 'entries', '10000029', 'Created', '2019-10-31 00:37:39'),
(10000072, 1000002, 'entries', '10000030', 'Created', '2019-10-31 00:38:06'),
(10000073, 1000002, 'entries', '10000031', 'Created', '2019-10-31 00:38:28'),
(10000074, 1000002, 'entries', '10000032', 'Created', '2019-10-31 00:38:51'),
(10000075, 1000002, 'entries', '10000033', 'Created', '2019-10-31 00:39:09'),
(10000076, 1000002, 'entries', '10000034', 'Created', '2019-10-31 00:39:37'),
(10000077, 1000002, 'entries', '10000035', 'Created', '2019-10-31 00:40:01'),
(10000078, 1000002, 'entries', '10000036', 'Created', '2019-10-31 00:40:27'),
(10000079, 1000002, 'entries', '10000037', 'Created', '2019-10-31 00:40:50'),
(10000080, 1000002, 'entries', '10000038', 'Created', '2019-10-31 00:41:14'),
(10000081, 1000002, 'entries', '10000039', 'Created', '2019-10-31 00:41:36'),
(10000082, 1000002, 'entries', '10000013', 'Approved', '2019-10-31 00:41:38'),
(10000083, 1000002, 'entries', '10000014', 'Approved', '2019-10-31 00:41:40'),
(10000084, 1000002, 'entries', '10000015', 'Approved', '2019-10-31 00:41:42'),
(10000085, 1000002, 'entries', '10000016', 'Approved', '2019-10-31 00:41:44'),
(10000086, 1000002, 'entries', '10000017', 'Approved', '2019-10-31 00:41:45'),
(10000087, 1000002, 'entries', '10000018', 'Approved', '2019-10-31 00:41:47'),
(10000088, 1000002, 'entries', '10000019', 'Approved', '2019-10-31 00:41:49'),
(10000089, 1000002, 'entries', '10000020', 'Approved', '2019-10-31 00:41:51'),
(10000090, 1000002, 'entries', '10000021', 'Approved', '2019-10-31 00:41:52'),
(10000091, 1000002, 'entries', '10000022', 'Approved', '2019-10-31 00:41:54'),
(10000092, 1000002, 'entries', '10000024', 'Approved', '2019-10-31 00:41:55'),
(10000093, 1000002, 'entries', '10000026', 'Approved', '2019-10-31 00:41:57'),
(10000094, 1000002, 'entries', '10000025', 'Approved', '2019-10-31 00:41:59'),
(10000095, 1000002, 'entries', '10000027', 'Approved', '2019-10-31 00:42:00'),
(10000096, 1000002, 'entries', '10000028', 'Approved', '2019-10-31 00:42:02'),
(10000097, 1000002, 'entries', '10000029', 'Approved', '2019-10-31 00:42:04'),
(10000098, 1000002, 'entries', '10000030', 'Approved', '2019-10-31 00:42:05'),
(10000099, 1000002, 'entries', '10000031', 'Approved', '2019-10-31 00:42:06'),
(10000100, 1000002, 'entries', '10000032', 'Approved', '2019-10-31 00:42:07'),
(10000101, 1000002, 'entries', '10000033', 'Approved', '2019-10-31 00:42:08'),
(10000102, 1000002, 'entries', '10000034', 'Approved', '2019-10-31 00:42:09'),
(10000103, 1000002, 'entries', '10000035', 'Approved', '2019-10-31 00:42:09'),
(10000104, 1000002, 'entries', '10000036', 'Approved', '2019-10-31 00:42:10'),
(10000105, 1000002, 'entries', '10000037', 'Approved', '2019-10-31 00:42:11'),
(10000106, 1000002, 'entries', '10000038', 'Approved', '2019-10-31 00:42:12'),
(10000107, 1000002, 'entries', '10000039', 'Approved', '2019-10-31 00:42:13'),
(10000108, 1000002, 'entries', '10000040', 'Created', '2019-10-31 00:44:32'),
(10000109, 1000002, 'entries', '10000040', 'Approved', '2019-10-31 00:44:34'),
(10000110, 1000002, 'entries', '10000041', 'Created', '2019-11-18 21:59:17'),
(10000111, 1000002, 'entries', '10000041', 'Approved', '2019-11-18 22:41:06'),
(10000112, 1000002, 'entries', '10000042', 'Created', '2019-11-18 22:41:44'),
(10000113, 1000002, 'entries', '10000042', 'Approved', '2019-11-18 22:41:49'),
(10000114, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:21:39'),
(10000115, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:22:14'),
(10000116, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:22:54'),
(10000117, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:23:30'),
(10000118, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:23:49'),
(10000119, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:24:10'),
(10000120, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:24:18'),
(10000121, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:24:33'),
(10000122, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:24:37'),
(10000123, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:25:04'),
(10000124, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:25:19'),
(10000125, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:25:30'),
(10000126, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:25:58'),
(10000127, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:26:16'),
(10000128, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userID\":\"1000004\"}', '2019-11-21 00:26:41'),
(10000129, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:33:38'),
(10000130, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:34:38'),
(10000131, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:35:17'),
(10000132, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:35:34'),
(10000133, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:36:02'),
(10000134, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:36:31'),
(10000135, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:36:54'),
(10000136, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:38:01'),
(10000137, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"b3e207713101ac4ceeca8e2bf9d89f11\",\"userID\":\"1000004\"}', '2019-11-21 00:38:41'),
(10000138, 1000004, 'users', '{\"userID\":\"1000004\",\"userName\":\"TAccount1119\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\"}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userPassword\":\"6769753a16b9a55bcc7ae79004c97b5a\",\"userID\":\"1000004\"}', '2019-11-21 00:39:20'),
(10000139, 1000003, 'admin', '{\"userID\":\"1000004\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userPasswordAttempts\":\"3\",\"userPrevPassword\":\"[\\\"bcfa73027e3be8d83201da2533b7ff0b\\\"]\",\"userPasswordDate\":\"2019-11-20 16:28:08\",\"userCreationDate\":\"2019-11-20 16:28:08\",\"userRole\":\"0\",\"userActive\":\"0\",\"userActiveDate\":null,\"userForgot\":null}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000004\",\"userPasswordAttempts\":0}', '2019-11-21 01:08:02'),
(10000140, 1000003, 'admin', '{\"userID\":\"1000004\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userPassword\":\"bcfa73027e3be8d83201da2533b7ff0b\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":\"[\\\"bcfa73027e3be8d83201da2533b7ff0b\\\",null]\",\"userPasswordDate\":\"2019-11-20 16:28:08\",\"userCreationDate\":\"2019-11-20 16:28:08\",\"userRole\":\"0\",\"userActive\":\"1\",\"userActiveDate\":null,\"userForgot\":null}', '{\"userFirstName\":\"Test\",\"userLastName\":\"Account\",\"userEmail\":\"jordanallen1332@gmail.com\",\"userRole\":\"0\",\"userActive\":\"0\",\"userID\":\"1000004\"}', '2019-11-21 01:08:32'),
(10000141, 1000001, 'entries', '10000043', 'Created', '2019-12-02 17:34:45'),
(10000142, 1000002, 'entries', '10000043', 'Rejected: This is a test for making entries.', '2019-12-02 17:35:57'),
(10000143, 477, 'entries', '10000044', 'Created', '2020-02-23 08:29:48'),
(10000144, 477, 'entries', '10000044', 'Approved', '2020-02-23 08:30:10'),
(10000145, 477, 'entries', '10000045', 'Created', '2020-03-04 13:12:05'),
(10000146, 477, 'entries', '10000046', 'Created', '2020-03-04 13:13:45'),
(10000147, 477, 'entries', '10000047', 'Created', '2020-03-04 13:33:10'),
(10000148, 477, 'entries', '10000046', 'Approved', '2020-03-04 13:33:16'),
(10000149, 477, 'entries', '10000047', 'Approved', '2020-03-04 13:33:21'),
(10000150, 1000005, 'entries', '10000048', 'Created', '2020-03-05 06:45:48'),
(10000151, 477, 'entries', '10000048', 'Approved', '2020-03-05 07:12:57'),
(10000152, 477, 'entries', '10000045', 'Approved', '2020-03-05 07:15:28'),
(10000153, 1000005, 'entries', '10000049', 'Created', '2020-03-05 07:17:33'),
(10000154, 477, 'entries', '10000049', 'Approved', '2020-03-05 07:18:07'),
(10000155, 477, 'entries', '10000050', 'Created', '2020-03-05 07:21:37'),
(10000156, 477, 'entries', '10000050', 'Approved', '2020-03-05 07:21:45'),
(10000157, 1000005, 'entries', '10000051', 'Created', '2020-03-05 07:24:30'),
(10000158, 477, 'entries', '10000051', 'Approved', '2020-03-05 07:25:04'),
(10000159, 1000006, 'entries', '10000052', 'Created', '2020-03-10 06:36:00'),
(10000160, 477, 'entries', '10000052', 'Approved', '2020-03-10 06:44:54'),
(10000161, 1000006, 'entries', '10000053', 'Created', '2020-03-10 07:16:04'),
(10000162, 477, 'entries', '10000053', 'Approved', '2020-03-10 07:24:17'),
(10000163, 477, 'admin', '{\"userID\":\"1000007\",\"userEmail\":\"abd@gmail.com\",\"userFirstName\":\"ABD\",\"userLastName\":\"A\",\"userPassword\":\"cae558648534d51deb527140c720a29a\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":\"[\\\"cae558648534d51deb527140c720a29a\\\"]\",\"userPasswordDate\":\"2020-03-10 14:30:24\",\"userCreationDate\":\"2020-03-10 14:30:24\",\"userRole\":\"0\",\"created_by\":null,\"userActive\":\"0\",\"userActiveDate\":null,\"userForgot\":null}', '{\"userFirstName\":\"ABD\",\"userLastName\":\"A\",\"userEmail\":\"abd@gmail.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000007\",\"userPasswordAttempts\":0}', '2020-03-10 08:31:05'),
(10000164, 1000006, 'entries', '10000054', 'Created', '2020-03-10 09:04:30'),
(10000165, 477, 'entries', '10000054', 'Approved', '2020-03-10 09:08:10'),
(10000166, 1000006, 'entries', '10000055', 'Created', '2020-03-10 09:10:22'),
(10000167, 1000006, 'entries', '10000055', 'Approved', '2020-03-10 09:17:28'),
(10000168, 477, 'admin', '{\"userID\":\"1000008\",\"userEmail\":\"sa.sayeed@hussainsbd.com\",\"userFirstName\":\"Sheikh\",\"userLastName\":\"Abu Sayeed\",\"userPassword\":\"857a8b6a3df522b465cccd65bfdc4186\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":\"[\\\"857a8b6a3df522b465cccd65bfdc4186\\\"]\",\"userPasswordDate\":\"2020-03-12 12:49:53\",\"userCreationDate\":\"2020-03-12 12:49:53\",\"userRole\":\"0\",\"created_by\":null,\"userActive\":\"0\",\"userActiveDate\":null,\"userForgot\":null}', '{\"userFirstName\":\"Sheikh\",\"userLastName\":\"Abu Sayeed\",\"userEmail\":\"sa.sayeed@hussainsbd.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000008\",\"userPasswordAttempts\":0}', '2020-03-12 06:50:57'),
(10000169, 1000008, 'entries', '10000056', 'Created', '2020-03-12 06:56:22'),
(10000170, 1000008, 'entries', '10000056', 'Approved', '2020-03-12 06:56:58'),
(10000171, 1000006, 'entries', '10000057', 'Created', '2020-03-15 07:28:06'),
(10000172, 1000006, 'entries', '10000057', 'Approved', '2020-03-15 07:28:53'),
(10000173, 1000006, 'entries', '10000058', 'Created', '2020-03-15 07:32:11'),
(10000174, 1000006, 'entries', '10000058', 'Approved', '2020-03-15 07:32:30'),
(10000175, 1000006, 'entries', '10000059', 'Created', '2020-03-15 07:42:21'),
(10000176, 1000006, 'entries', '10000060', 'Created', '2020-03-15 08:17:35'),
(10000177, 1000006, 'entries', '10000060', 'Approved', '2020-03-15 08:18:34'),
(10000178, 1000006, 'entries', '10000059', 'Approved', '2020-03-15 08:18:35'),
(10000179, 1000008, 'entries', '10000061', 'Created', '2020-03-15 08:26:37'),
(10000180, 1000008, 'entries', '10000061', 'Approved', '2020-03-15 08:26:40'),
(10000181, 1000008, 'entries', '10000062', 'Created', '2020-03-15 08:27:30'),
(10000182, 1000008, 'entries', '10000062', 'Approved', '2020-03-15 08:27:32'),
(10000183, 1000008, 'entries', '10000063', 'Created', '2020-03-15 08:28:50'),
(10000184, 1000008, 'entries', '10000063', 'Approved', '2020-03-15 08:28:53'),
(10000185, 1000008, 'entries', '10000064', 'Created', '2020-03-15 08:33:14'),
(10000186, 1000008, 'entries', '10000064', 'Approved', '2020-03-15 08:33:18'),
(10000187, 1000008, 'entries', '10000065', 'Created', '2020-03-15 08:35:17'),
(10000188, 1000008, 'entries', '10000065', 'Approved', '2020-03-15 08:35:20'),
(10000189, 1000008, 'entries', '10000066', 'Created', '2020-03-15 08:46:23'),
(10000190, 1000008, 'entries', '10000066', 'Approved', '2020-03-15 08:46:27'),
(10000191, 1000008, 'entries', '10000067', 'Created', '2020-03-15 08:47:33'),
(10000192, 1000008, 'entries', '10000067', 'Approved', '2020-03-15 08:47:35'),
(10000193, 1000006, 'entries', '10000068', 'Created', '2020-03-16 06:29:15'),
(10000194, 1000006, 'entries', '10000068', 'Approved', '2020-03-16 06:29:18'),
(10000195, 477, 'admin', '{\"userID\":\"1000009\",\"userEmail\":\"hbcl@hussainsbd.com\",\"userFirstName\":\"HBCL\",\"userLastName\":\"-\",\"userPassword\":\"70ff30b6ffbc01d87f9939b3f3f57b16\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":\"[\\\"70ff30b6ffbc01d87f9939b3f3f57b16\\\"]\",\"userPasswordDate\":\"2020-03-16 14:50:35\",\"userCreationDate\":\"2020-03-16 14:50:35\",\"userRole\":\"0\",\"created_by\":null,\"userActive\":\"0\",\"userActiveDate\":null,\"userForgot\":null}', '{\"userFirstName\":\"HBCL\",\"userLastName\":\"-\",\"userEmail\":\"hbcl@hussainsbd.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000009\",\"userPasswordAttempts\":0}', '2020-03-16 08:51:05'),
(10000196, 477, 'accounts', '{\"accountID\":\"100\",\"userID\":\"1000009\",\"accountName\":\"Property, plant and equipment\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Non Current Assets\",\"accountSide\":\"Debit\",\"accountBalance\":\"0.00\",\"accountDebit\":\"0.00\",\"accountCredit\":\"0.00\",\"accountOrder\":\"0\",\"accountStatus\":\"1\",\"accountStatement\":\"Balance Sheet\",\"created_by\":\"1000009\",\"accountCreationDate\":\"2020-03-16 15:16:36\"}', '{\"accountName\":\"Property, plant and equipment\",\"accountCategorySub\":\"Current Assets\",\"accountSide\":\"L\",\"accountStatement\":\"IS\",\"accountID\":\"100\"}', '2020-03-16 10:02:12'),
(10000197, 477, 'accounts', '{\"accountID\":\"100\",\"userID\":\"1000009\",\"accountName\":\"Property, plant and equipment\",\"accountCategory\":\"Assets\",\"accountCategorySub\":\"Current Assets\",\"accountSide\":\"L\",\"accountBalance\":\"0.00\",\"accountDebit\":\"0.00\",\"accountCredit\":\"0.00\",\"accountOrder\":\"0\",\"accountStatus\":\"1\",\"accountStatement\":\"IS\",\"created_by\":\"1000009\",\"accountCreationDate\":\"2020-03-16 15:16:36\"}', '{\"accountName\":\"Property, plant and equipment\",\"accountCategorySub\":\"Current Assets\",\"accountStatement\":\"BS\",\"accountID\":\"100\"}', '2020-03-16 10:03:45'),
(10000198, 1000009, 'entries', '10000069', 'Created', '2020-03-16 11:19:29'),
(10000199, 1000009, 'entries', '10000069', 'Approved', '2020-03-16 11:19:33'),
(10000200, 1000009, 'entries', '10000070', 'Created', '2020-03-16 11:50:34'),
(10000201, 1000009, 'entries', '10000070', 'Approved', '2020-03-16 11:50:37'),
(10000202, 477, 'admin', '{\"userID\":\"1000009\",\"userEmail\":\"hbcl@hussainsbd.com\",\"userFirstName\":\"HBCL\",\"userLastName\":\"-\",\"userPassword\":\"c42929eb16c0dc3a8c5d78cf4b90f8bd\",\"userPasswordAttempts\":\"5\",\"userPrevPassword\":\"[\\\"70ff30b6ffbc01d87f9939b3f3f57b16\\\",null]\",\"userPasswordDate\":\"2020-03-16 14:50:35\",\"userCreationDate\":\"2020-03-16 14:50:35\",\"userRole\":\"0\",\"created_by\":null,\"userActive\":\"0\",\"userActiveDate\":null,\"userForgot\":\"da96ca5541c3caa2b822ec7315f867d3\"}', '{\"userFirstName\":\"HBCL\",\"userLastName\":\"-\",\"userEmail\":\"hbcl@hussainsbd.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000009\",\"userPasswordAttempts\":0}', '2020-03-18 06:08:24'),
(10000203, 1000009, 'entries', '10000071', 'Created', '2020-03-18 07:11:44'),
(10000204, 1000009, 'entries', '10000071', 'Approved', '2020-03-18 07:11:50'),
(10000205, 477, 'admin', '{\"userID\":\"1000010\",\"userEmail\":\"puma@gmail.com\",\"userFirstName\":\"Puma\",\"userLastName\":\"ABC\",\"userPassword\":\"65743241172c9d73b0cfc5bf43938bd9\",\"userPasswordAttempts\":\"0\",\"userPrevPassword\":\"[\\\"65743241172c9d73b0cfc5bf43938bd9\\\"]\",\"userPasswordDate\":\"2020-03-18 13:42:30\",\"userCreationDate\":\"2020-03-18 13:42:30\",\"userRole\":\"0\",\"created_by\":null,\"userActive\":\"0\",\"userActiveDate\":null,\"userForgot\":null}', '{\"userFirstName\":\"Puma\",\"userLastName\":\"ABC\",\"userEmail\":\"puma@gmail.com\",\"userRole\":\"0\",\"userActive\":\"1\",\"userID\":\"1000010\",\"userPasswordAttempts\":0}', '2020-03-18 07:43:39'),
(10000206, 1000009, 'entries', '10000072', 'Created', '2020-03-18 10:07:49'),
(10000207, 1000009, 'entries', '10000072', 'Approved', '2020-03-18 10:07:55'),
(10000208, 1000009, 'entries', '10000073', 'Created', '2020-03-18 10:40:21'),
(10000209, 1000009, 'entries', '10000073', 'Approved', '2020-03-18 10:40:26'),
(10000210, 1000009, 'entries', '10000074', 'Created', '2020-03-18 10:45:53'),
(10000211, 1000009, 'entries', '10000074', 'Approved', '2020-03-18 10:45:57'),
(10000212, 1000009, 'entries', '10000075', 'Created', '2020-03-18 10:46:52'),
(10000213, 1000009, 'entries', '10000075', 'Approved', '2020-03-18 10:46:56'),
(10000214, 1000009, 'entries', '10000076', 'Created', '2020-03-18 10:48:00'),
(10000215, 1000009, 'entries', '10000076', 'Approved', '2020-03-18 10:48:03'),
(10000216, 1000009, 'entries', '10000077', 'Created', '2020-03-18 10:50:59'),
(10000217, 1000009, 'entries', '10000077', 'Approved', '2020-03-18 10:51:02'),
(10000218, 1000009, 'entries', '10000078', 'Created', '2020-03-18 10:51:50'),
(10000219, 1000009, 'entries', '10000078', 'Approved', '2020-03-18 10:51:52'),
(10000220, 1000009, 'entries', '10000079', 'Created', '2020-03-18 10:52:40'),
(10000221, 1000009, 'entries', '10000079', 'Approved', '2020-03-18 10:52:42'),
(10000222, 1000009, 'entries', '10000080', 'Created', '2020-03-18 10:53:33'),
(10000223, 1000009, 'entries', '10000080', 'Approved', '2020-03-18 10:53:36'),
(10000224, 1000009, 'entries', '10000081', 'Created', '2020-03-18 10:57:19'),
(10000225, 1000009, 'entries', '10000081', 'Approved', '2020-03-18 10:57:24'),
(10000226, 1000009, 'entries', '10000082', 'Created', '2020-03-18 10:59:00'),
(10000227, 1000009, 'entries', '10000082', 'Approved', '2020-03-18 10:59:07'),
(10000228, 1000009, 'entries', '10000083', 'Created', '2020-03-18 10:59:57'),
(10000229, 1000009, 'entries', '10000084', 'Created', '2020-03-18 11:02:11'),
(10000230, 1000009, 'entries', '10000085', 'Created', '2020-03-18 11:02:54'),
(10000231, 1000009, 'entries', '10000086', 'Created', '2020-03-18 11:03:49'),
(10000232, 1000009, 'entries', '10000087', 'Created', '2020-03-18 11:04:46'),
(10000233, 1000009, 'entries', '10000087', 'Approved', '2020-03-18 11:05:05'),
(10000234, 1000009, 'entries', '10000088', 'Created', '2020-03-18 11:05:56'),
(10000235, 1000009, 'entries', '10000088', 'Approved', '2020-03-18 11:06:04'),
(10000236, 1000009, 'entries', '10000086', 'Approved', '2020-03-18 11:06:08'),
(10000237, 1000009, 'entries', '10000085', 'Approved', '2020-03-18 11:06:12'),
(10000238, 1000009, 'entries', '10000084', 'Approved', '2020-03-18 11:06:17'),
(10000239, 1000009, 'entries', '10000083', 'Approved', '2020-03-18 11:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `logs_categories`
--

CREATE TABLE `logs_categories` (
  `categoryID` bigint(20) NOT NULL,
  `categoryName` varchar(25) NOT NULL,
  `categoryDescription` text NOT NULL,
  `categoryCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs_events`
--

CREATE TABLE `logs_events` (
  `logID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `logCategoryID` int(11) NOT NULL,
  `logBeforeInfo` text NOT NULL,
  `logAfterInfo` text NOT NULL,
  `logCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs_users`
--

CREATE TABLE `logs_users` (
  `logID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `logInfo` text NOT NULL,
  `logCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs_users`
--

INSERT INTO `logs_users` (`logID`, `userID`, `logInfo`, `logCreationDate`) VALUES
(1, 1000001, 'User logged in.', '2019-09-19 21:48:31'),
(2, 1000001, 'User logged out.', '2019-09-19 21:50:15'),
(3, 1000003, 'User logged in.', '2019-09-19 21:50:26'),
(4, 1000003, 'User logged out.', '2019-09-19 21:50:27'),
(5, 1000002, 'User logged in.', '2019-09-19 21:50:32'),
(6, 1000002, 'User logged out.', '2019-09-19 21:50:33'),
(7, 1000001, 'User logged in.', '2019-09-19 21:50:49'),
(8, 1000001, 'User logged out.', '2019-09-19 21:51:29'),
(9, 1000003, 'User logged in.', '2019-09-19 21:51:33'),
(10, 1000003, 'User logged out.', '2019-09-19 21:57:30'),
(11, 1000001, 'User logged in.', '2019-09-19 21:57:36'),
(12, 1000001, 'User logged out.', '2019-09-19 21:58:37'),
(13, 1000003, 'User logged in.', '2019-09-19 21:58:42'),
(14, 1000003, 'User logged out.', '2019-09-19 23:17:52'),
(15, 1000001, 'User logged in.', '2019-09-19 23:18:11'),
(16, 1000001, 'User logged out.', '2019-09-19 23:18:51'),
(17, 1000003, 'User logged in.', '2019-09-19 23:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` bigint(20) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userFirstName` varchar(25) NOT NULL,
  `userLastName` varchar(25) NOT NULL,
  `userPassword` varchar(32) NOT NULL,
  `userPasswordAttempts` int(1) NOT NULL DEFAULT '0',
  `userPrevPassword` text,
  `userPasswordDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userCreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userRole` int(2) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `userActive` int(1) NOT NULL DEFAULT '0',
  `userActiveDate` text,
  `userForgot` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userEmail`, `userFirstName`, `userLastName`, `userPassword`, `userPasswordAttempts`, `userPrevPassword`, `userPasswordDate`, `userCreationDate`, `userRole`, `created_by`, `userActive`, `userActiveDate`, `userForgot`) VALUES
(477, 'saad@hussainsbd.com', 'Saad', 's', '202cb962ac59075b964b07152d234b70', 9, NULL, '2020-02-17 09:01:51', '2020-02-17 09:01:51', 10, NULL, 1, NULL, NULL),
(1000006, 'tofazzul@hussainsbd.com', 'Tofazzul ', 'Hussain', '202cb962ac59075b964b07152d234b70', 0, '[\"1a996d6f57e2b348b6531264274edd2f\"]', '2020-03-10 06:14:53', '2020-03-10 06:14:53', 0, NULL, 1, NULL, NULL),
(1000007, 'abd@gmail.com', 'ABD', 'A', 'cae558648534d51deb527140c720a29a', 2, '[\"cae558648534d51deb527140c720a29a\",null]', '2020-03-10 08:30:24', '2020-03-10 08:30:24', 0, NULL, 1, NULL, NULL),
(1000008, 'sa.sayeed@hussainsbd.com', 'Sheikh', 'Abu Sayeed', '202cb962ac59075b964b07152d234b70', 0, '[\"857a8b6a3df522b465cccd65bfdc4186\",null]', '2020-03-12 06:49:53', '2020-03-12 06:49:53', 0, NULL, 1, NULL, NULL),
(1000009, 'hbcl@hussainsbd.com', 'HBCL', '-', '202cb962ac59075b964b07152d234b70', 1, '[\"70ff30b6ffbc01d87f9939b3f3f57b16\",null,null]', '2020-03-16 08:50:35', '2020-03-16 08:50:35', 0, NULL, 1, NULL, 'da96ca5541c3caa2b822ec7315f867d3'),
(1000010, 'puma@gmail.com', 'Puma', 'ABC', '65743241172c9d73b0cfc5bf43938bd9', 0, '[\"65743241172c9d73b0cfc5bf43938bd9\",null]', '2020-03-18 07:42:30', '2020-03-18 07:42:30', 0, NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_categories`
--
ALTER TABLE `accounts_categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `accounts_categories_sub`
--
ALTER TABLE `accounts_categories_sub`
  ADD PRIMARY KEY (`subCategoryID`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_categories`
--
ALTER TABLE `accounts_categories`
  MODIFY `categoryID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts_categories_sub`
--
ALTER TABLE `accounts_categories_sub`
  MODIFY `subCategoryID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `entryID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000089;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000240;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000011;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
